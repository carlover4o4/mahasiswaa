<nav class="nav bg-danger justify-content-center">
    @if (Auth::user()->role == 'admin')
        <a href="{{ route('dataM') }}" class="nav-link text-white">Data Mahasiswa</a>
        <a href="{{ route('dataP') }}" class="nav-link text-white">Daftar Pendaftaran</a>
    @elseif (Auth::user()->role == 'mahasiswa')
        <a href="{{ route('formDaftar') }}" class="nav-link text-white">Form Pendaftaran</a>
        <a href="{{ route('daftarFakultas') }}" class="nav-link text-white">Daftar Fakultas</a>
    @endif

    <form action="{{ route('logout') }}" method="POST" class="ms-auto d-inline">
        @csrf

        <button type="submit" class="btn nav-link text-white">Logout</button>
    </form>
</nav>
