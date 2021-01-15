<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('dasbor') }}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Survei</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ request()->is('/') ? 'active' : '' }} nav-item"><a href="{{ route('dasbor') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dasbor">Dasbor</span></a></li>
            
            <li class="navigation-header"><span>Grafik</span></li>
            <li class="{{ request()->is('jenis-kelamin') ? 'active' : '' }} nav-item"><a href="{{ route('jenis-kelamin') }}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Jenis Kelamin">Jenis Kelamin</span></a></li>
            <li class="{{ request()->is('pekerjaan') ? 'active' : '' }} nav-item"><a href="{{ route('pekerjaan') }}"><i class="feather icon-briefcase"></i><span class="menu-title" data-i18n="Pekerjaan">Pekerjaan</span></a></li>
            <li class="{{ request()->is('pendidikan-terakhir') ? 'active' : '' }} nav-item"><a href="{{ route('pendidikan-terakhir') }}"><i class="feather icon-book"></i><span class="menu-title" data-i18n="Pendidikan Terakhir">Pendidikan Terakhir</span></a></li>
            <li class="{{ request()->is('tahun-lahir') ? 'active' : '' }} nav-item"><a href="{{ route('tahun-lahir') }}"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Tahun Lahir">Tahun Lahir</span></a></li>
            
            <li class=" navigation-header"><span>Sebaran</span></li>
            <li class="{{ request()->is('wilayah') ? 'active' : '' }} nav-item"><a href="{{ route('wilayah') }}"><i class="feather icon-map-pin"></i><span class="menu-title" data-i18n="Wilayah">Wilayah</span></a></li>
        </ul>
    </div>
</div>