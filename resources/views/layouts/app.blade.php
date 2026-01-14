<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SID Sidomulyo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        /* CSS Tema Hijau Nature */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; background-color: #f3f8f5; overflow-x: hidden; }
        
        #wrapper { display: flex; width: 100%; }
        
        /* Sidebar Hijau */
        #sidebar-wrapper {
            min-width: 260px; max-width: 260px; min-height: 100vh;
            background: linear-gradient(180deg, #1e5631 0%, #4c9f70 100%);
            color: white; transition: margin .25s ease-out;
        }
        
        .sidebar-heading { padding: 1.5rem; font-size: 1.5rem; font-weight: bold; background: rgba(0,0,0,0.1); }
        .list-group-item { border: none; background: transparent; color: rgba(255,255,255,0.8); padding: 15px 25px; }
        .list-group-item:hover { background: rgba(255,255,255,0.2); color: #fff; cursor: pointer; }
        .list-group-item.active { background: #fff; color: #1e5631; font-weight: bold; border-radius: 50px 0 0 50px; margin-left: 15px; }
        
        /* Konten Utama */
        #page-content-wrapper { width: 100%; }
        .navbar { background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div id="sidebar-wrapper">
            <div class="sidebar-heading"><i class="bi bi-building"></i> SIDOMULYO</div>
            
            <div class="list-group list-group-flush mt-3">
                <a href="{{ route('dashboard') }}" class="list-group-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-fill me-2"></i> Dashboard
                </a>
                
                <a href="{{ route('warga.index') }}" class="list-group-item {{ Request::is('warga*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill me-2"></i> Data Warga
                </a>
                
                <a href="{{ route('kas.index') }}" class="list-group-item {{ Request::is('kas') || Request::is('kas/index') ? 'active' : '' }}">
                    <i class="bi bi-wallet2 me-2"></i> Kas Desa
                </a>

                <a href="{{ route('kas.create') }}" class="list-group-item {{ Request::is('kas/create') ? 'active' : '' }}">
                    <i class="bi bi-cash-coin me-2"></i> Input Bayar
                </a>

                <a href="{{ route('laporan.index') }}" class="list-group-item {{ Request::is('laporan*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-bar-graph me-2"></i> Laporan
                </a>
                
                <div class="mt-4 border-top border-light opacity-25 mx-3"></div>
                
                <a class="list-group-item text-warning mt-2" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   <i class="bi bi-box-arrow-left me-2"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light px-4 py-3 border-bottom">
                <button class="btn btn-light text-success border" id="menu-toggle"><i class="bi bi-list"></i></button>
                <div class="ms-auto fw-bold text-success">
                    Halo, {{ Auth::user()->name ?? 'Admin Desa' }} 👋
                </div>
            </nav>

            <div class="container-fluid p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("menu-toggle").onclick = function() {
            document.getElementById("wrapper").classList.toggle("toggled");
            var sb = document.getElementById("sidebar-wrapper");
            // Logika sederhana untuk toggle margin
            if (sb.style.marginLeft === "-260px") {
                sb.style.marginLeft = "0";
            } else {
                sb.style.marginLeft = "-260px";
            }
        };
    </script>
</body>
</html>