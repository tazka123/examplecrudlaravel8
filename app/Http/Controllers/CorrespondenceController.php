<?php

namespace App\Http\Controllers;

use File;
use PDF;

use Illuminate\Http\Request;
use App\Models\Correspondence;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Exports\CorrespondenceExport;
use App\Imports\CorrespondenceImport;

class CorrespondenceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Correspondence::where('nomor', 'LIKE', '%' . $request->search . '%')->paginate(5);
            // dd($data);
        } else {
            $data = Correspondence::paginate(5);
        }
        return view('surat.datasurat', compact('data'));
    }

    public function tambahsurat()
    {
        return view('surat.tambahsurat');
    }

    public function insertsurat(Request $request)
    {
        // dd($request->all());
        $data = Correspondence::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotosurat/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('surat')->with('success', ' Data Berhasil ditambahkan');
    }

    public function tampilsurat($id)
    {
        $data = Correspondence::find($id);
        // dd($data);
        return view('surat.tampilsurat', compact('data'));
    }

    public function updatesurat(Request $request, $id)
    {
        $data = Correspondence::find($id);
        if ($request->hasFile('foto')) {
            File::delete('fotosurat/' . $data->foto);
            $data->delete();
            $request->file('foto')->move('fotosurat/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        } else {
            $data->update($request->all());
        }
        return redirect()
            ->route('surat')
            ->with('success', 'data berhasil diupdate');
    }

    public function deletesurat($id)
    {
        $data = Correspondence::find($id);
        File::delete('fotosurat/' . $data->foto);
        $data->delete();
        return redirect()
            ->route('surat')
            ->with('success', 'data berhasil dihapus');
    }

    public function export1pdf()
    {
        $data = Correspondence::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('surat.datasurat_pdf');
        return $pdf->download('data.pdf');
    }

    public function export1excel()
    {
        return Excel::download(new CorrespondenceExport, 'datasurat.xlsx');
    }

    public function import1excel(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('CorrespondenceData', $namafile);
        Excel::import1(
            new CorrespondenceImport(),
            \public_path('/CorrespondenceData/' . $namafile)
        );
        return \redirect()->back();
    }
}
