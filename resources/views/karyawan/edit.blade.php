@extends('template.master')

@section('personalia-aktif', 'active')

@section('title')
    {{ ucwords(str_replace('_', ' ', 'karyawan')) }}
@endsection

@section('content')
<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Edit @yield('title')</h2>
                    <h5 class="text-white op-7 mb-2">Manajemen @yield('title')</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary btn-round">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit @yield('title')</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('karyawan.update', $kontak->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Organisasi -->
                            <div class="form-group">
                                <label for="organisasi">{{ ucwords(str_replace('_', ' ', 'organisasi')) }}</label>
                                <select name="organisasi_id" id="organisasi" class="form-control @error('organisasi_id') is-invalid @enderror">
                                    <option value="">Pilih {{ ucwords(str_replace('_', ' ', 'organisasi')) }}</option>
                                    @foreach($organisasis as $organisasi)
                                        <option value="{{ $organisasi->id }}" {{ $kontak->organisasi_id == $organisasi->id ? 'selected' : '' }}>
                                            {{ $organisasi->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('organisasi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="form-group">
                                <label for="nama_lengkap">{{ ucwords(str_replace('_', ' ', 'nama_lengkap')) }}</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap', $kontak->nama_lengkap) }}" required>
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nama Panggilan -->
                            <div class="form-group">
                                <label for="nama_panggilan">{{ ucwords(str_replace('_', ' ', 'nama_panggilan')) }}</label>
                                <input type="text" name="nama_panggilan" id="nama_panggilan" class="form-control @error('nama_panggilan') is-invalid @enderror" value="{{ old('nama_panggilan', $kontak->nama_panggilan) }}" required>
                                @error('nama_panggilan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nomor Handphone -->
                            <div class="form-group">
                                <label for="nomor_handphone">{{ ucwords(str_replace('_', ' ', 'nomor_handphone')) }}</label>
                                <input type="text" name="nomor_handphone" id="nomor_handphone" class="form-control @error('nomor_handphone') is-invalid @enderror" value="{{ old('nomor_handphone', $kontak->nomor_handphone) }}" required>
                                @error('nomor_handphone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">{{ ucwords(str_replace('_', ' ', 'email')) }}</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $kontak->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="form-group">
                                <label for="alamat">{{ ucwords(str_replace('_', ' ', 'alamat')) }}</label>
                                <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $kontak->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- NPWP -->
                            <div class="form-group">
                                <label for="npwp">{{ strtoupper(str_replace('_', ' ', 'npwp')) }}</label>
                                <input type="text" name="npwp" id="npwp" class="form-control @error('npwp') is-invalid @enderror" value="{{ old('npwp', $kontak->npwp) }}">
                                @error('npwp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
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
        $('#organisasi').select2({
            theme: 'bootstrap',
            placeholder: "Pilih organisasi",
            allowClear: true
        });
    });
</script>
@endsection
