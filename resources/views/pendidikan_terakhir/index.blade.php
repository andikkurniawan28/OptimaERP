@extends('template.master')

@section('personalia-aktif')
    {{ 'active' }}
@endsection

@section('title')
    {{ ucwords(str_replace('_', ' ', 'pendidikan_terakhir')) }}
@endsection

@section('content')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Daftar @yield('title')</h2>
                        <h5 class="text-white op-7 mb-2">Manajemen @yield('title')</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="{{ route('pendidikan_terakhir.create') }}" class="btn btn-secondary btn-round">Tambah @yield('title')</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar @yield('title')</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ strtoupper(str_replace('_', ' ', 'id')) }}</th>
                                            <th>{{ ucwords(str_replace('_', ' ', 'nama')) }}</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pendidikan_terakhirs as $pendidikan_terakhir)
                                            <tr>
                                                <td>{{ $pendidikan_terakhir->id }}</td>
                                                <td>{{ $pendidikan_terakhir->nama }}</td>
                                                <td>
                                                    <a href="{{ route('pendidikan_terakhir.edit', $pendidikan_terakhir->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('pendidikan_terakhir.destroy', $pendidikan_terakhir->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });
    });
</script>
@endsection
