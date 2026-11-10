<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Edit Mahasiswa</title>
</head>

<body>
    @include('template.navbar')
    <div class="container d-flex mt-5 justify-content-center align-items-center">
        <form action="{{ route('postedit', $pendaftaran->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Mahasiswa :</label>
                <input type="text" name="namalengkap" class="form-control" value="{{ $pendaftaran->namalengkap }}">
            </div>

            <div class="mb-3">
                <label>Prodi :</label>
                <select name="prodi_id" class="form-control">
                    @foreach ($prodi as $p)
                        <option value="{{ $p->id }}" {{ $pendaftaran->prodi_id == $p->id ? 'selected' : '' }}>
                            {{ $p->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Status :</label>
                <select name="status" class="form-control">
                    <option value="lunas" {{ $pendaftaran->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
                    <option value="belumlunas" {{ $pendaftaran->status == 'belumlunas' ? 'selected' : '' }}>Belum Lunas
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Simpan</button>
            <a href="{{ route('dataM') }}" class="btn btn-danger">Batalkan</a>
        </form>
    </div>
</body>

</html>
