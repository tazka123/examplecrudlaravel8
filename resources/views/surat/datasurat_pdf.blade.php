<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: rgb(221, 221, 221);
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #2b19d3;
            color: white;
        }

    </style>
</head>

<body>

    <h1 class="text-center mb-4">Data Surat</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Tgl Surat</th>
            <th>Tujuan</th>
            <th>Perihal</th>
            <th>Seksi</th>
            {{--  <th>Foto</th>  --}}
            {{--  <th>Tanggal Lahir</th>  --}}
            {{--  <th>Agama</th>  --}}
            <th>Dibuat</th>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->nomor }}</td>
                <td>{{ $row->tgl_surat }}</td>
                <td>{{ $row->tujuan }}</td>
                <td>{{ $row->perihal }}</td>
                <td>{{ $row->seksi }}</td>
                {{--  <td>
                    <img src="{{ asset('fotosurat/' . $row->foto) }}" alt="" style="width:35px">
                </td>  --}}
                <td>{{ $row->created_at->diffforhumans() }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
