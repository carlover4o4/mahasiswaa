<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>login</title>
</head>
<body>
    <div class="container mt-5 justify-content-center d-flex align-items-center">
        <form action="{{ route('postregister') }}" method="POST" class="form-group">
            @csrf

            <h1 class="d-flex justify-content-center text-danger">HALAMAN Register</h1>

            <label for="">Nama</label>
            <input name="name" type="text" class="form-control">

            <label for="">Email</label>
            <input name="email" type="email" class="form-control">

            <label for="">Password</label>
            <input name="password" type="password" class="form-control">

            <button class="btn btn-danger">Register</button>
            <a href="{{ route('login') }}">Login</a>
        </form>
    </div>
</body>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</html>