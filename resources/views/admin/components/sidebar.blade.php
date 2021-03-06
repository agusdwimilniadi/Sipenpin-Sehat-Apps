<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/back-dash">
        <div class="sidebar-brand-icon rotate-n-15">
            <i><img src="{{asset('image/logo/logo.svg')}}" style="width: 70%;" alt="Logo"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sipenpin Sehat</div>
    </a>

    <hr class="sidebar-divider my-0">
    <li class="nav-item @if ($onSide == 'dashboard') active @endif">
        <a class="nav-link" href="{{url('/back-dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
   

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Admin Panel
    </div>
    @role('Superadmin')
    <li class="nav-item @if ($onSide == 'pekerjaan' || $onSide == 'statusHubungan' || $onSide == 'dusun') active @endif">
        <a class="nav-link @if ($onSide == 'pekerjaan' || $onSide == 'statusHubungan' || $onSide == 'dusun') collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
            <i class="fas fa-fw fa-box"></i>
            <span>Master</span>
        </a>
        <div id="collapseMaster" class="collapse @if ($onSide == 'pekerjaan' || $onSide == 'statusHubungan' || $onSide == 'dusun') show @endif" aria-labelledby="headingPortfolio" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Master : </h6>
                <a class="collapse-item @if ($onSide == 'pekerjaan') active @endif" href="{{url('/back-master/pekerjaan')}}">Pekerjaan</a>
                <a class="collapse-item @if ($onSide == 'statusHubungan') active @endif" href="{{url('/back-master/status-hubungan')}}">Status Hubungan</a>
                <a class="collapse-item @if ($onSide == 'dusun') active @endif" href="{{url('/back-master/dusun')}}">Dusun</a>
                <a class="collapse-item @if ($onSide == 'bidan') active @endif" href="{{url('/back-master/bidan')}}">Bidan</a>
                <a class="collapse-item @if ($onSide == 'perawat') active @endif" href="{{url('/back-master/perawat')}}">Perawat</a>
                <a class="collapse-item @if ($onSide == 'kader') active @endif" href="{{url('/back-master/kader')}}">Kader</a>
                <a class="collapse-item @if ($onSide == 'nomor_kader') active @endif" href="{{url('/back-master/nomor_kader')}}">No. Darurat Kader</a>
                <a class="collapse-item @if ($onSide == 'nomor_kades') active @endif" href="{{url('/back-master/nomor_kades')}}">No. Darurat Kades</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if ($onSide == 'berita') active @endif">
        <a class="nav-link" href="{{url('/back-berita')}}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Berita</span>
        </a>
    </li>
    <li class="nav-item @if ($onSide == 'perpustakaan') active @endif">
        <a class="nav-link" href="{{url('/back-perpustakaan')}}">
            <i class="fas fa-fw fa-book-medical"></i>
            <span>Perpustakaan Sehat</span>
        </a>
    </li>
    <li class="nav-item @if ($onSide == 'livechat') active @endif">
        <a class="nav-link" href="{{url('/livechat')}}">
            <i class="fas fa-comment-alt fa-comment-alt"></i>
            <span>Live Chat</span></a>
    </li>
    @endrole

    @role('Admin Kader')
    <li class="nav-item @if ($onSide == 'pekerjaan' || $onSide == 'statusHubungan' || $onSide == 'dusun') active @endif">
        <a class="nav-link @if ($onSide == 'pekerjaan' || $onSide == 'statusHubungan' || $onSide == 'dusun') collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
            <i class="fas fa-fw fa-box"></i>
            <span>Master</span>
        </a>
        <div id="collapseMaster" class="collapse @if ($onSide == 'pekerjaan' || $onSide == 'statusHubungan' || $onSide == 'dusun'|| $onSide == 'bidan'|| $onSide == 'perawat'|| $onSide == 'kader'|| $onSide == 'listNomorKader'|| $onSide == 'listNomorKades') show @endif" aria-labelledby="headingPortfolio" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Master : </h6>
                <a class="collapse-item @if ($onSide == 'pekerjaan') active @endif" href="{{url('/back-master/pekerjaan')}}">Pekerjaan</a>
                <a class="collapse-item @if ($onSide == 'statusHubungan') active @endif" href="{{url('/back-master/status-hubungan')}}">Status Hubungan</a>
                <a class="collapse-item @if ($onSide == 'dusun') active @endif" href="{{url('/back-master/dusun')}}">Dusun</a>
                <a class="collapse-item @if ($onSide == 'bidan') active @endif" href="{{url('/back-master/bidan')}}">Bidan</a>
                <a class="collapse-item @if ($onSide == 'perawat') active @endif" href="{{url('/back-master/perawat')}}">Perawat</a>
                <a class="collapse-item @if ($onSide == 'kader') active @endif" href="{{url('/back-master/kader')}}">Kader</a>
                <a class="collapse-item @if ($onSide == 'listNomorKader') active @endif" href="{{url('/back-master/nomor_kader')}}">No. Darurat Kader</a>
                <a class="collapse-item @if ($onSide == 'listNomorKades') active @endif" href="{{url('/back-master/nomor_kades')}}">No. Darurat Kades</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if ($onSide == 'berita') active @endif">
        <a class="nav-link" href="{{url('/back-berita')}}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Berita</span>
        </a>
    </li>
    <li class="nav-item @if ($onSide == 'perpustakaan') active @endif">
        <a class="nav-link" href="{{url('/back-perpustakaan')}}">
            <i class="fas fa-fw fa-book-medical"></i>
            <span>Perpustakaan Sehat</span>
        </a>
    </li>
    @endrole

    @role('Superadmin')
    <li class="nav-item @if ($onSide == 'slider') active @endif">
        <a class="nav-link" href="{{url('/back-statistik')}}">
            <i class="fas fa-fw fa-chart-pie"></i>
            <span>Statistik</span>
        </a>
    </li>

    <li class="nav-item @if ($onSide == 'userDetail') active @endif">
        <a class="nav-link" href="{{url('/back-user-detail')}}">
            <i class="fas fa-fw fa-user-check"></i>
            <span>Pendataan - User Detail</span>
        </a>
    </li>
    @endrole
    @role('Admin Kesehatan')
    <li class="nav-item @if ($onSide == 'pekerjaan' || $onSide == 'statusHubungan' || $onSide == 'dusun') active @endif">
        <a class="nav-link @if ($onSide == 'pekerjaan' || $onSide == 'statusHubungan' || $onSide == 'dusun') collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
            <i class="fas fa-fw fa-box"></i>
            <span>Master</span>
        </a>
        <div id="collapseMaster" class="collapse @if ($onSide == 'pekerjaan' || $onSide == 'statusHubungan' || $onSide == 'dusun'|| $onSide == 'bidan'|| $onSide == 'perawat'|| $onSide == 'kader'|| $onSide == 'listNomorKader'|| $onSide == 'listNomorKades') show @endif" aria-labelledby="headingPortfolio" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Master : </h6>
                <a class="collapse-item @if ($onSide == 'bidan') active @endif" href="{{url('/back-master/bidan')}}">Bidan</a>
                <a class="collapse-item @if ($onSide == 'perawat') active @endif" href="{{url('/back-master/perawat')}}">Perawat</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if ($onSide == 'livechat') active @endif">
        <a class="nav-link" href="{{url('/livechat')}}">
            <i class="fas fa-comment-alt fa-comment-alt"></i>
            <span>Live Chat</span></a>
    </li>
    <li class="nav-item @if ($onSide == 'slider') active @endif">
        <a class="nav-link" href="{{url('/back-statistik')}}">
            <i class="fas fa-fw fa-chart-pie"></i>
            <span>Statistik</span>
        </a>
    </li>

    <li class="nav-item @if ($onSide == 'userDetail') active @endif">
        <a class="nav-link" href="{{url('/back-user-detail')}}">
            <i class="fas fa-fw fa-user-check"></i>
            <span>Pendataan - User Detail</span>
        </a>
    </li>
    @endrole
    @role('Superadmin')
    <li class="nav-item @if ($onSide == 'user') active @endif">
        <a class="nav-link" href="{{url('/back-user')}}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Akun - User</span>
        </a>
    </li>
    @endrole

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>