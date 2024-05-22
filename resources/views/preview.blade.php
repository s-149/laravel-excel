<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratinjau Data Barang</title>
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
                    <form action="{{ route('barang.confirmImport') }}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Merk</th>
                                        <th>Kode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $row['nama'] }}</td>
                                            <td>{{ $row['harga'] }}</td>
                                            <td>{{ $row['stok'] }}</td>
                                            <td>{{ $row['merk'] }}</td>
                                            <td>{{ $row['kode'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-success">Confirmation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
