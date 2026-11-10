<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Daftar Fakultas</title>
</head>
<body>
    @include('template.navbar')
    
    <div class="container mt-5 justify-content-center d-flex align-items-center">
        <div class="row">
            @foreach ($fakultas as $f)
                <div class="col-6 p-5">
                    <div class="card shadow">
                        <img src="{{ asset($f->foto) }}" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5>{{ $f->name }}</h5>
                            <a href="{{ route('detailProd', $f  ->id) }}" class="btn btn-danger">Prodi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</html>