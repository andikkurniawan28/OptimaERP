@extends('template.master')

@section('kontak-aktif')
    {{ 'active' }}
@endsection

@section('title')
    {{ ucwords(str_replace('_', ' ', 'organisasi')) }}
@endsection

@section('content')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Tambah @yield('title')</h2>
                        <h5 class="text-white op-7 mb-2">Manajemen @yield('title')</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="{{ route('organisasi.index') }}" class="btn btn-secondary btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah @yield('title')</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('organisasi.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="jenis_organisasi">{{ ucwords(str_replace('_', ' ', 'jenis_organisasi')) }}</label>
                                    <select name="jenis_organisasi_id" id="jenis_organisasi" class="form-control @error('jenis_organisasi_id') is-invalid @enderror">
                                        <option value="">Pilih {{ ucwords(str_replace('_', ' ', 'jenis_organisasi')) }}</option>
                                        @foreach($jenis_organisasis as $jenis_organisasi)
                                            <option value="{{ $jenis_organisasi->id }}" {{ old('jenis_organisasi_id') == $jenis_organisasi->id ? 'selected' : '' }}>
                                                {{ $jenis_organisasi->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jenis_organisasi_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="bidang_usaha">{{ ucwords(str_replace('_', ' ', 'bidang_usaha')) }}</label>
                                    <select name="bidang_usaha_id" id="bidang_usaha" class="form-control @error('bidang_usaha_id') is-invalid @enderror">
                                        <option value="">Pilih {{ ucwords(str_replace('_', ' ', 'bidang_usaha')) }}</option>
                                        @foreach($bidang_usahas as $bidang_usaha)
                                            <option value="{{ $bidang_usaha->id }}" {{ old('bidang_usaha_id') == $bidang_usaha->id ? 'selected' : '' }}>
                                                {{ $bidang_usaha->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('bidang_usaha_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="wilayah">{{ ucwords(str_replace('_', ' ', 'wilayah')) }}</label>
                                    <select name="wilayah_id" id="wilayah" class="form-control @error('wilayah_id') is-invalid @enderror">
                                        <option value="">Pilih {{ ucwords(str_replace('_', ' ', 'wilayah')) }}</option>
                                        @foreach($wilayahs as $wilayah)
                                            <option value="{{ $wilayah->id }}" {{ old('wilayah_id') == $wilayah->id ? 'selected' : '' }}>
                                                {{ $wilayah->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('wilayah_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kode">{{ ucwords(str_replace('_', ' ', 'kode')) }}</label>
                                    <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode') }}" required>
                                    @error('kode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama">{{ ucwords(str_replace('_', ' ', 'nama')) }}</label>
                                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nomor_handphone">{{ ucwords(str_replace('_', ' ', 'nomor_handphone')) }}</label>
                                    <input type="text" name="nomor_handphone" id="nomor_handphone" class="form-control @error('nomor_handphone') is-invalid @enderror" value="{{ old('nomor_handphone') }}" required>
                                    @error('nomor_handphone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ ucwords(str_replace('_', ' ', 'email')) }}</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat">{{ ucwords(str_replace('_', ' ', 'alamat')) }}</label>
                                    <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="npwp">{{ strtoupper(str_replace('_', ' ', 'npwp')) }}</label>
                                    <input type="text" name="npwp" id="npwp" class="form-control @error('npwp') is-invalid @enderror" value="{{ old('npwp') }}">
                                    @error('npwp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="btn-group d-flex">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#jenis_organisasi').select2({
            theme: 'bootstrap',
            placeholder: "Pilih {{ ucwords(str_replace('_', ' ', 'jenis_organisasi')) }}",
            allowClear: true
        });
        $('#bidang_usaha').select2({
            theme: 'bootstrap',
            placeholder: "Pilih {{ ucwords(str_replace('_', ' ', 'bidang_usaha')) }}",
            allowClear: true
        });
        $('#wilayah').select2({
            theme: 'bootstrap',
            placeholder: "Pilih {{ ucwords(str_replace('_', ' ', 'wilayah')) }}",
            allowClear: true
        });
    });
</script>
@endsection
