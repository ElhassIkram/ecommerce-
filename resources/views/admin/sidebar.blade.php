<div>
    <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
                    class="logo-name">ShopyNow</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li >
                <a href="/dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li >
                <a href="/users" class="nav-link"><i data-feather="users"></i><span> Users</span></a>
            </li>
            <li >
                <a href="/produits" class="nav-link"><i data-feather="shopping-bag"></i><span> Produits</span></a>
            </li>
            <li class="menu-header">Detail Produits</li>
            
            <li >
                <a href="/marques" class="nav-link"><i data-feather="tag"></i><span> Marques</span></a>
            </li>
            
            <li >
                <a href="/familles" class="nav-link"><i data-feather="bookmark"></i><span> Familles </span></a>
            </li>

            <li >
                <a href="/sousfamilles" class="nav-link"><i data-feather="award"></i><span> Sous Familles</span></a>
            </li>
            <li >
                <a href="/unites" class="nav-link"><i data-feather="box"></i><span> Unites</span></a>
            </li>
            <li >
                <a href="/etats" class="nav-link"><i data-feather="box"></i><span> Etats</span></a>
            </li>

        </ul>
    </aside>
  
</div>
@yield('content')
</div>