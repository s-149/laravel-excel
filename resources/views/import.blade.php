<?php $i = 1; ?>
<!-- resources/views/import.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Barangs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="mt-15">
        <div class="container">
            <div class="row">
                <div class="col">
                    <br><br>
                    <h1>List Barang</h1>
                    <div class="header">
                        @if (session('success'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('failures'))
                            <div>
                                <h3>Import Failures</h3>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Row</th>
                                            <th>Attribute</th>
                                            <th>Errors</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (session()->get('failures') as $failure)
                                            <tr>
                                                <td>{{ $failure->row() }}</td>
                                                <td>{{ $failure->attribute() }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($failure->errors() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ $failure->values()[$failure->attribute()] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            IMPORT
                        </button>&nbsp;&nbsp;&nbsp;
                        <!-- Button trigger modal -->
                        <a href="/export-barangs" class="btn btn-success">
                            EXPORT
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href="/deleteAll" class="btn btn-danger">
                            DELLETE ALL
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Merk</th>
                                    <th>Kode</th>
                                    <th>CreatedAt</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $barang)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $barang->nama }}</td>
                                        <td>{{ $barang->harga }}</td>
                                        <td>{{ $barang->stok }}</td>
                                        <td>{{ $barang->merk }}</td>
                                        <td>{{ $barang->kode }}</td>
                                        <td>{{ $barang->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <form action="{{ route('import.barangs') }}" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Page Import</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div>
                            <label for="file">Choose file</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
