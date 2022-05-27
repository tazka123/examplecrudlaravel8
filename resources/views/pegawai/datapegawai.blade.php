<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>CRUD Laravel 8!</title>
</head>

<body>
    <h1 class="text-center mb-4">Data Pegawai</h1>

    <div class="container">
        <a href="/tambahpegawai" class="btn btn-success">Tambah</a>

        <div class="row g-3 align-items-center mt-2 mb-2">
            <div class="col-auto">
                <form action="/pegawai" method="GET">
                    <input type="search" name="search" id="inputPassword6" class="form-control"
                        aria-describedby="passwordHelpInline">
            </div>
            </form>
            <div class="col-auto">
                <a href="/exportpdf" class="btn btn-info">Export PDF</a>
            </div>
            <div class="col-auto">
                <a href="/exportexcel" class="btn btn-warning">Export Excel</a>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import Data
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="/importexcel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Nomor Telpon</th>
                        <th scope="col">Foto</th>
                        <th scope="col">dibuat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                        <tr>
                            <th scope="row">{{ $index + $data->firstItem() }}</th>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->jeniskelamin }}</td>
                            <td>0{{ $row->notelpon }}</td>
                            <td>
                                <img src="{{ asset('fotopegawai/' . $row->foto) }}" alt="" style="width:50px">
                            </td>
                            {{-- <td>{{ $row->created_at->format('D M Y') }}</td> --}}
                            <td>{{ $row->created_at->diffforhumans() }}</td>
                            <td>
                                <a href="/tampildatapegawai/{{ $row->id }}" class="btn btn-info">Edit</a>
                                {{-- <a href="/deletedatapegawai/{{ $row->id }}" type="button"
                                    class="btn btn-danger">Delete</a> --}}
                                <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"
                                    data-nama="{{ $row->nama }}">
                                    Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>
<script>
    $('.delete').click(function() {
        var pegawaiid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        swal({
                title: "kamu yakin?",
                text: "kamu akan menghapus data pegawai dengan nama " + nama + " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletedatapegawai/" + pegawaiid + ""
                    swal("Data berhasil dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("data tidak jadi dihapus!");
                }
            });
    })
</script>

<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>

</html>
