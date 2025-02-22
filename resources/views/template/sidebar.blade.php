<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item @yield('home-aktif')">
                    <a href="{{ route('home') }}" >
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                {{-- <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li> --}}
                <li class="nav-item @yield('kontak-aktif')">
                    <a data-toggle="collapse" href="#kontak">
                        <i class="fas fa-address-book"></i>
                        <p>{{ ucwords(str_replace('_', ' ', 'kontak')) }}</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="kontak">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('jenis_kontak.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'jenis_kontak')) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('jenis_pihak_ketiga.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'jenis_pihak_ketiga')) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('jenis_organisasi.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'jenis_organisasi')) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('bidang_usaha.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'bidang_usaha')) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('bank.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'bank')) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wilayah.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'wilayah')) }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item @yield('personalia-aktif')">
                    <a data-toggle="collapse" href="#personalia">
                        <i class="fas fa-user-tie"></i>
                        <p>{{ ucwords(str_replace('_', ' ', 'personalia')) }}</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="personalia">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('departemen.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'departemen')) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('status_karyawan.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'status_karyawan')) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('status_perkawinan.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'status_perkawinan')) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('agama.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'agama')) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pendidikan_terakhir.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'pendidikan_terakhir')) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('jurusan.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'jurusan')) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('keahlian.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'keahlian')) }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- <li class="mx-4 mt-2">
                    <a href="http://themekita.com/atlantis-bootstrap-dashboard.html"
                        class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fa fa-heart"></i>
                        </span>Buy Pro</a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
