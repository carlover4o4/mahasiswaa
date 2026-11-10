<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/dataTables.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://cdn.datatables.net/3.1.5/js/dataTables.min.js"></script>
    <title>Daftar Pendaftaran</title>
</head>

<body>
    @include('template.navbar')

    <div class="container mt-5">
        <div class="card shadow border-0">
            <div class="card-body">
                <!-- Header Card (Judul & Tombol Filter) -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0">Daftar Pendaftaran</h4>
                </div>

                <!-- Tabel dengan DataTables -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="tablepemantapan">
                        <thead class="table-light">
                            <tr>
                                <th>Pendaftar</th>
                                <th>Fakultas</th>
                                <th>Prodi</th>
                                <th>Status (dibayar/belum)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftaran as $p)
                                <tr>
                                    <td>{{ $p->namalengkap }}</td>
                                    <td>{{ $p->prodi->fakultas->name ?? '-' }}</td>
                                    <td>{{ $p->prodi->name ?? '-' }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $p->status == 'lunas' ? 'bg-success' : 'bg-warning text-dark' }}">
                                            {{ ucfirst($p->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('hapus', $p->id) }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script>
    new DataTable('#tablepemantapan');
</script>

</html>
