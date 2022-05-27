<?php

namespace App\Http\Controllers;

use PDF;
use File;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Employee::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Employee::paginate(5);
        }
        return view('pegawai.datapegawai', compact('data'));
    }

    public function tambahpegawai()
    {
        return view('pegawai.tambahpegawai');
    }

    public function insertpegawai(Request $request)
    {
        // dd($request->all());
        $data = Employee::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()
            ->route('pegawai')
            ->with('success', 'data berhasil ditambahkan');
    }

    public function tampildatapegawai($id)
    {
        $data = Employee::find($id);
        // dd($data);
        return view('pegawai.tampildatapegawai', compact('data'));
    }

    public function updatedatapegawai(Request $request, $id)
    {
        $data = Employee::find($id);
        if ($request->hasFile('foto')) {
            File::delete('fotopegawai/' . $data->foto);
            $data->delete();
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        } else {
            $data->update($request->all());
        }    
        return redirect()
            ->route('pegawai')
            ->with('success', 'data berhasil diupdate');
    }

    public function deletedatapegawai($id)
    {
        $data = Employee::find($id);
        File::delete('fotopegawai/'. $data->foto);
        $data->delete();
        return redirect()
            ->route('pegawai')
            ->with('success', 'data berhasil dihapus');
    }

    // $data = Employee::find($request->id);
    // \Storage::delete('public/fotopegawai' . $data->foto);
    // Employee::where("id", $data->id)->delete();

    // // return back()->with("success", "Image deleted successfully.");
    // return redirect()
    //     ->route('pegawai')
    //     ->with('success', 'data berhasil dihapus');

    public function exportpdf()
    {
        $data = Employee::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('pegawai.datapegawai_pdf');
        return $pdf->download('data.pdf');
    }

    public function exportexcel()
    {
        return Excel::download(new EmployeeExport, 'datapegawai.xlsx');
    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('EmployeeData', $namafile);
        Excel::import(
            new EmployeeImport(),
            \public_path('/EmployeeData/' . $namafile)
        );
        return \redirect()->back();
    }
}
