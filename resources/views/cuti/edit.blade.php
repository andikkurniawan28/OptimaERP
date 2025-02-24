@extends('template.master')

@section('kontak-aktif', 'active')

@section('title')
    Edit {{ ucwords(str_replace('_', ' ', 'cuti')) }}
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
                    <a href="{{ route('cuti.index') }}" class="btn btn-secondary btn-round">Kembali</a>
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
                        <form action="{{ route('cuti.update', $cuti->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Karyawan -->
                            <div class="form-group">
                                <label for="karyawan">{{ ucwords(str_replace('_', ' ', 'karyawan')) }}</label>
                                <select name="kontak_id" id="karyawan" class="form-control @error('karyawan_id') is-invalid @enderror">
                                    <option value="">Pilih {{ ucwords(str_replace('_', ' ', 'karyawan')) }}</option>
                                    @foreach($karyawans as $karyawan)
                                        <option value="{{ $karyawan->id }}" {{ old('karyawan_id', $cuti->kontak_id) == $karyawan->id ? 'selected' : '' }}>
                                            {{ $karyawan->nama_panggilan }} ({{ $karyawan->nama_lengkap }}) - {{ $karyawan->jabatan->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('karyawan_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Dari -->
                            <div class="form-group">
                                <label for="dari">{{ ucwords(str_replace('_', ' ', 'dari')) }}</label>
                                <input type="date" name="dari" id="dari" class="form-control @error('dari') is-invalid @enderror" value="{{ old('dari', $cuti->dari) }}" required>
                                @error('dari')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sampai -->
                            <div class="form-group">
                                <label for="sampai">{{ ucwords(str_replace('_', ' ', 'sampai')) }}</label>
                                <input type="date" name="sampai" id="sampai" class="form-control @error('sampai') is-invalid @enderror" value="{{ old('sampai', $cuti->sampai) }}" required>
                                @error('sampai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Keterangan -->
                            <div class="form-group">
                                <label for="keterangan">{{ ucwords(str_replace('_', ' ', 'keterangan')) }}</label>
                                <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3" required>{{ old('keterangan', $cuti->keterangan) }}</textarea>
                                @error('keterangan')
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
        $('#karyawan').select2({
            theme: 'bootstrap',
            placeholder: "Pilih karyawan",
            allowClear: true
        });
    });
</script>
@endsection
