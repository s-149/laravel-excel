<!-- resources/views/upload.blade.php -->
<form action="/import-users" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>
<html>
    <head>
        <title>Laravel Excel</title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>hello</td>
                    <td>hello@hello.com</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
