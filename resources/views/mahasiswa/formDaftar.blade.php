<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Form Pendaftaran</title>
</head>

<body>
    @include('template.navbar')

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if ($pendaftaran)
                    <div class="alert alert-info text-center shadow-sm mb-4">
                        <strong>Perhatian!</strong> Anda sudah melakukan pendaftaran sebelumnya. Data di bawah ini
                        bersifat permanen dan tidak dapat diubah.
                    </div>
                @endif

                <form action="{{ route('postformDaftar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow">
                        <div class="card-header bg-danger text-white text-center">
                            <h4 class="mb-0">Form Pendaftaran</h4>
                        </div>

                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input name="namalengkap" type="text" class="form-control"
                                    value="{{ $pendaftaran->namalengkap ?? '' }}"
                                    {{ $pendaftaran ? 'disabled' : 'required' }}>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input name="tgllahir" type="date" class="form-control"
                                    value="{{ $pendaftaran->tgllahir ?? '' }}"
                                    {{ $pendaftaran ? 'disabled' : 'required' }}>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control"
                                    {{ $pendaftaran ? 'disabled' : 'required' }}>
                                    <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                                    <option value="pria" {{ optional($pendaftaran)->jk == 'pria' ? 'selected' : '' }}>
                                        Pria</option>
                                    <option value="wanita"
                                        {{ optional($pendaftaran)->jk == 'wanita' ? 'selected' : '' }}>Wanita</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input name="alamat" type="text" class="form-control"
                                    value="{{ $pendaftaran->alamat ?? '' }}"
                                    {{ $pendaftaran ? 'disabled' : 'required' }}>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Agama</label>
                                <select name="agama" id="agama" class="form-control"
                                    {{ $pendaftaran ? 'disabled' : 'required' }}>
                                    <option value="" disabled selected hidden>Pilih Agama Anda Jika Ada</option>
                                    @foreach (['islam', 'kristenprotestan', 'katolik', 'konghuchu', 'hindu', 'budha', 'lainnya'] as $agm)
                                        <option value="{{ $agm }}"
                                            {{ optional($pendaftaran)->agama == $agm ? 'selected' : '' }}>
                                            {{ ucfirst($agm) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No Telepon</label>
                                <input name="telpon" type="number" class="form-control"
                                    value="{{ $pendaftaran->telpon ?? '' }}"
                                    {{ $pendaftaran ? 'disabled' : 'required' }}>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tahun Lulusan</label>
                                <input name="lulusan" type="number" class="form-control"
                                    value="{{ $pendaftaran->lulusan ?? '' }}"
                                    {{ $pendaftaran ? 'disabled' : 'required' }}>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pilih Fakultas</label>
                                <select id="fakultas_id" class="form-control"
                                    {{ $pendaftaran ? 'disabled' : 'required' }}>
                                    <option value="" disabled selected hidden>Pilih Fakultas Terlebih Dahulu
                                    </option>
                                    @foreach ($fakultas as $f)
                                        <option value="{{ $f->id }}"
                                            {{ optional(optional($pendaftaran)->prodi)->fakultas_id == $f->id ? 'selected' : '' }}>
                                            {{ $f->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pilihan Program Studi</label>
                                <select name="prodi_id" id="prodi_id" class="form-control"
                                    {{ $pendaftaran ? 'disabled' : 'required' }}>
                                    <option value="" disabled selected hidden>Pilih Program Studi</option>
                                    @foreach ($prodi as $p)
                                        <option value="{{ $p->id }}" data-fakultas="{{ $p->fakultas_id }}"
                                            {{ optional($pendaftaran)->prodi_id == $p->id ? 'selected' : '' }}>
                                            {{ $p->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            @if (!$pendaftaran)
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-danger">Simpan Pendaftaran</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script>
    document.getElementById('fakultas_id').addEventListener('change', function() {
        var selectedFakultas = this.value;
        var prodiSelect = document.getElementById('prodi_id');
        var prodiOptions = prodiSelect.querySelectorAll('option');

        prodiSelect.value = "";

        prodiOptions.forEach(function(option) {
            if (option.value === "") {
                option.style.display = "block";
                return;
            }

            var fakultasId = option.getAttribute('data-fakultas');
            if (fakultasId === selectedFakultas) {
                option.style.display = "block";
            } else {
                option.style.display = "none";
            }
        });
    });
</script>

</html>
