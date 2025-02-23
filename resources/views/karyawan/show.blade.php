@extends('template.master')

@section('personalia-aktif')
    {{ 'active' }}
@endsection

@section('title')
    {{ ucwords(str_replace('_', ' ', 'karyawan')) }}
@endsection

@section('content')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Detail @yield('title')</h2>
                        <h5 class="text-white op-7 mb-2">Informasi lengkap tentang <strong>{{ $karyawan->nama_lengkap }}</strong></h5>
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
                            <h4 class="card-title">Detail @yield('title')</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                @php
                                    $fields = [
                                        'nama_lengkap' => $karyawan->nama_lengkap,
                                        'nama_panggilan' => $karyawan->nama_panggilan,
                                        'nomor_handphone' => $karyawan->nomor_handphone,
                                        'email' => $karyawan->email,
                                        'alamat' => $karyawan->alamat,
                                        'npwp' => $karyawan->npwp ?? '-',
                                        'jabatan' => $karyawan->jabatan->nama ?? '-',
                                        'status_karyawan' => $karyawan->status_karyawan->nama ?? '-',
                                        'agama' => $karyawan->agama->nama ?? '-',
                                        'status_perkawinan' => $karyawan->status_perkawinan->nama ?? '-',
                                        'pendidikan_terakhir' => $karyawan->pendidikan_terakhir->nama ?? '-',
                                        'sekolah' => $karyawan->sekolah->nama ?? '-',
                                        'jurusan' => $karyawan->jurusan->nama ?? '-',
                                        'nik' => $karyawan->nik ?? '-',
                                        'nkk' => $karyawan->nkk ?? '-',
                                        'bpjs_ketenagakerjaan' => $karyawan->bpjs_ketenagakerjaan ?? '-',
                                        'bpjs_kesehatan' => $karyawan->bpjs_kesehatan ?? '-',
                                        'tempat_lahir' => $karyawan->tempat_lahir ?? '-',
                                        'tanggal_lahir' => $karyawan->tanggal_lahir,
                                        'dibuat_pada' => $karyawan->created_at,
                                        'terakhir_diperbarui' => $karyawan->updated_at
                                    ];
                                @endphp

                                @foreach ($fields as $key => $value)
                                    <tr>
                                        <th>{{ ucwords(str_replace('_', ' ', $key)) }}</th>
                                        <td>{{ $value }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
