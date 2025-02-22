<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            {{-- <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="/atlantis/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hizrian
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
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
                                <a href="{{ route('departemen.index') }}">
                                    <span class="sub-item">{{ ucwords(str_replace('_', ' ', 'departemen')) }}</span>
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
