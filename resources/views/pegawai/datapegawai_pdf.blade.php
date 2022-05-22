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
            background-color: #C08570;
            color: white;
        }

    </style>
</head>

<body>

    <h1 class="text-center mb-4">Data Pegawai</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No Telepon</th>
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
                <td>{{ $row->nama }}</td>
                <td>{{ $row->jeniskelamin }}</td>
                <td>0{{ $row->notelpon }}</td>
                {{--  <td>{{ $row->tanggal_lahir}}</td>  --}}
                {{--  <td>{{ $row->religions->nama }}</td>  --}}
                <td>{{ $row->created_at->diffforhumans() }}</td>

            </tr>
        @endforeach
    </table>

</body>

</html>
