@extends('template.master')

@section('kontak-aktif')
    {{ 'active' }}
@endsection

@section('title')
    {{ ucwords(str_replace('_', ' ', 'pihak_ketiga')) }}
@endsection

@section('content')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Detail @yield('title')</h2>
                        <h5 class="text-white op-7 mb-2">Informasi lengkap tentang <strong>{{ $kontak->nama_lengkap }}</strong></h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="{{ route('pihak_ketiga.index') }}" class="btn btn-secondary btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail @yield('title')</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>{{ ucwords(str_replace('_', ' ', 'organisasi')) }}</th>
                                    <td>{{ $kontak->organisasi->nama ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ ucwords(str_replace('_', ' ', 'nama_lengkap')) }}</th>
                                    <td>{{ $kontak->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <th>{{ ucwords(str_replace('_', ' ', 'nama_panggilan')) }}</th>
                                    <td>{{ $kontak->nama_panggilan }}</td>
                                </tr>
                                <tr>
                                    <th>{{ ucwords(str_replace('_', ' ', 'kode')) }}</th>
                                    <td>{{ $kontak->kode }}</td>
                                </tr>
                                <tr>
                                    <th>{{ ucwords(str_replace('_', ' ', 'nomor_handphone')) }}</th>
                                    <td>{{ $kontak->nomor_handphone }}</td>
                                </tr>
                                <tr>
                                    <th>{{ ucwords(str_replace('_', ' ', 'email')) }}</th>
                                    <td>{{ $kontak->email }}</td>
                                </tr>
                                <tr>
                                    <th>{{ ucwords(str_replace('_', ' ', 'alamat')) }}</th>
                                    <td>{{ $kontak->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>{{ strtoupper(str_replace('_', ' ', 'npwp')) }}</th>
                                    <td>{{ $kontak->npwp ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ ucwords(str_replace('_', ' ', 'dibuat_pada')) }}</th>
                                    <td>{{ $kontak->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ ucwords(str_replace('_', ' ', 'terakhir_diperbarui')) }}</th>
                                    <td>{{ $kontak->updated_at->format('d-m-Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('pihak_ketiga.edit', $kontak->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
