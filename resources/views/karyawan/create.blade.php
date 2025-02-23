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
                    <h2 class="text-white pb-2 fw-bold">Tambah @yield('title')</h2>
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
                        <h4 class="card-title">Tambah @yield('title')</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('karyawan.store') }}" method="POST">
                            @csrf

                            @php
                                $fields = [
                                    'kode', 'nama_lengkap', 'nama_panggilan',
                                    'jabatan_id', 'nomor_handphone', 'email', 'alamat',
                                    'npwp', 'status_karyawan_id', 'agama_id',
                                    'status_perkawinan_id', 'pendidikan_terakhir_id',
                                    'sekolah_id', 'jurusan_id', 'nik', 'nkk',
                                    'bpjs_ketenagakerjaan', 'bpjs_kesehatan', 'tempat_lahir', 'tanggal_lahir'
                                ];
                                $dropdowns = ['jabatan_id', 'status_karyawan_id', 'agama_id',
                                              'status_perkawinan_id', 'pendidikan_terakhir_id', 'sekolah_id', 'jurusan_id'];
                            @endphp

                            @foreach ($fields as $field)
                                <div class="form-group">
                                    <label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label>

                                    @if(in_array($field, $dropdowns))
                                        <select name="{{ $field }}" id="{{ $field }}" class="form-control select2 @error($field) is-invalid @enderror">
                                            <option value="">Pilih {{ ucwords(str_replace('_', ' ', $field)) }}</option>
                                            @foreach(${$field.'s'} as $item)
                                                <option value="{{ $item->id }}" {{ old($field) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @elseif($field == 'tanggal_lahir')
                                        <input type="date" name="{{ $field }}" id="{{ $field }}" class="form-control @error($field) is-invalid @enderror" value="{{ old($field) }}">
                                    @else
                                        <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control @error($field) is-invalid @enderror" value="{{ old($field) }}">
                                    @endif

                                    @error($field) <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary">Simpan</button>
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
        $('.select2').select2({
            theme: 'bootstrap',
            placeholder: "Pilih opsi",
            allowClear: true
        });
    });
</script>
@endsection
