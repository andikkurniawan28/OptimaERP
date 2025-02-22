@extends('template.master')

@section('personalia-aktif')
    {{ 'active' }}
@endsection

@section('title')
    {{ ucwords(str_replace('_', ' ', 'jabatan')) }}
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
                        <a href="{{ route('jabatan.index') }}" class="btn btn-secondary btn-round">Kembali</a>
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
                            <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="seksi">{{ ucwords(str_replace('_', ' ', 'seksi')) }}</label>
                                    <select name="seksi_id" id="seksi" class="form-control @error('seksi_id') is-invalid @enderror">
                                        <option value="">Pilih {{ ucwords(str_replace('_', ' ', 'seksi')) }}</option>
                                        @foreach($seksis as $seksi)
                                            <option value="{{ $seksi->id }}" {{ old('seksi_id', $jabatan->seksi_id) == $seksi->id ? 'selected' : '' }}>
                                                {{ $seksi->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('seksi_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">{{ ucwords(str_replace('_', ' ', 'nama')) }}</label>
                                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $jabatan->nama) }}" required autofocus>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="btn-group d-flex">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
        $('#seksi').select2({
            theme: 'bootstrap',
            placeholder: "Pilih seksi",
            allowClear: true
        });
    });
</script>
@endsection
