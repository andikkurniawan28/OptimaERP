@extends('template.master')

@section('personalia-aktif')
    {{ 'active' }}
@endsection

@section('title')
    {{ ucwords(str_replace('_', ' ', 'seksi')) }}
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
                        <a href="{{ route('seksi.index') }}" class="btn btn-secondary btn-round">Kembali</a>
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
                            <form action="{{ route('seksi.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="departemen">{{ ucwords(str_replace('_', ' ', 'departemen')) }}</label>
                                    <select name="departemen_id" id="departemen" class="form-control @error('departemen_id') is-invalid @enderror">
                                        <option value="">Pilih {{ ucwords(str_replace('_', ' ', 'departemen')) }}</option>
                                        @foreach($departemens as $departemen)
                                            <option value="{{ $departemen->id }}" {{ old('departemen_id') == $departemen->id ? 'selected' : '' }}>
                                                {{ $departemen->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('departemen_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">{{ ucwords(str_replace('_', ' ', 'nama')) }}</label>
                                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required autofocus>
                                    @error('nama')
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
        $('#departemen').select2({
            theme: 'bootstrap',
            placeholder: "Pilih departemen",
            allowClear: true
        });
    });
</script>
@endsection
