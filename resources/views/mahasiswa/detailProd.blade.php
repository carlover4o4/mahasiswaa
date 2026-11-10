<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Daftar Prodi</title>
</head>

<body>
    @include('template.navbar')

    <div class="container mt-5">
        <h2 class="text-center mb-4">{{ $fakultas->name }}</h2>

        <div class="row">
            @foreach ($prodi as $p)
                <div class="col-md-4 mb-4">
                    <div class="card shadow h-100">
                        <img src="{{ asset($p->foto) }}" alt="" class="card-img-top"
                            style="height: 200px; object-fit: cover;">

                        <div class="card-body text-center d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold">{{ $p->name }}</h5>
                                <p class="card-text text-muted">Biaya: Rp. {{ number_format($p->harga, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4 mb-5">
            <a href="{{ route('daftarFakultas') }}" class="btn btn-danger">Kembali ke Daftar Fakultas</a>
        </div>
    </div>
</body>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</html>
