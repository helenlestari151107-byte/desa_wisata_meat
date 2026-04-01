<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin — Desa Wisata Meat</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
:root{--green:#1B5E2F;--teal:#006D77;--amber:#C8963E;--navy:#1A2744;--slate:#4B5C6B;--sand:#F5EFE0;--smoke:#F8F9FA}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Segoe UI',sans-serif;background:#f0f4f8;color:var(--navy);display:flex;min-height:100vh}
.sidebar{width:240px;background:var(--navy);flex-shrink:0;display:flex;flex-direction:column;position:fixed;top:0;bottom:0;left:0;z-index:100;overflow-y:auto}
.sidebar-brand{padding:22px 20px;display:flex;align-items:center;gap:11px;border-bottom:1px solid rgba(255,255,255,0.08)}
.brand-logo{width:38px;height:38px;background:var(--green);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px;color:white;font-weight:900;border:2px solid var(--amber);flex-shrink:0}
.brand-text .t1{color:white;font-size:14px;font-weight:700;line-height:1.2}
.brand-text .t2{color:rgba(255,255,255,0.4);font-size:10px}
.sidebar nav{padding:12px 10px;flex:1}
.nav-section{font-size:9px;font-weight:700;color:rgba(255,255,255,0.3);letter-spacing:1.5px;text-transform:uppercase;padding:14px 10px 6px}
.sidebar nav a{display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:9px;color:rgba(255,255,255,0.65);text-decoration:none;font-size:13px;font-weight:500;margin-bottom:2px;transition:all 0.2s}
.sidebar nav a i{width:18px;font-size:13px;flex-shrink:0}
.sidebar nav a:hover,.sidebar nav a.active{background:rgba(255,255,255,0.08);color:white}
.sidebar nav a.active{background:var(--green);color:white}
.sidebar-footer{padding:16px 20px;border-top:1px solid rgba(255,255,255,0.08)}
.sidebar-footer a{display:flex;align-items:center;gap:8px;color:rgba(255,255,255,0.5);font-size:12px;text-decoration:none;transition:color 0.2s}
.sidebar-footer a:hover{color:white}
.main{margin-left:240px;flex:1;display:flex;flex-direction:column;min-height:100vh}
.topbar{background:white;padding:14px 28px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid #e2e8f0;position:sticky;top:0;z-index:90}
.topbar h1{font-size:17px;font-weight:700;color:var(--navy)}
.topbar .user-info{display:flex;align-items:center;gap:10px}
.topbar .user-info .uname{font-size:13px;font-weight:600;color:var(--navy)}
.topbar .user-av{width:34px;height:34px;background:var(--green);border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-size:13px;font-weight:700}
.content{padding:24px 28px;flex:1}
.alert{padding:12px 16px;border-radius:8px;margin-bottom:16px;font-size:13px;font-weight:500;display:flex;align-items:center;gap:8px}
.alert-success{background:#dcfce7;color:#14532d;border-left:4px solid #16a34a}
.alert-danger{background:#fee2e2;color:#991b1b;border-left:4px solid #dc2626}
.card{background:white;border-radius:12px;box-shadow:0 1px 8px rgba(0,0,0,0.06);margin-bottom:20px}
.card-head{padding:16px 20px;border-bottom:1px solid #f0f0f0;display:flex;align-items:center;justify-content:space-between}
.card-head h2{font-size:15px;font-weight:700}
.card-body{padding:20px}
.btn{display:inline-flex;align-items:center;gap:7px;padding:9px 18px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;text-decoration:none;border:none;transition:all 0.2s;font-family:inherit}
.btn-green{background:var(--green);color:white}.btn-green:hover{background:#2E7D4F}
.btn-teal{background:var(--teal);color:white}.btn-teal:hover{background:#005060}
.btn-amber{background:var(--amber);color:white}.btn-amber:hover{background:#a87830}
.btn-red{background:#dc2626;color:white}.btn-red:hover{background:#b91c1c}
.btn-ghost{background:#f1f5f9;color:var(--slate);border:1px solid #e2e8f0}.btn-ghost:hover{background:#e2e8f0}
.btn-sm{padding:6px 12px;font-size:12px}
.table{width:100%;border-collapse:collapse;font-size:13px}
.table th{background:#f8fafc;padding:11px 14px;text-align:left;font-weight:600;color:var(--slate);font-size:12px;text-transform:uppercase;letter-spacing:0.5px;border-bottom:1px solid #e2e8f0}
.table td{padding:12px 14px;border-bottom:1px solid #f0f5f0;color:var(--navy);vertical-align:middle}
.table tr:hover td{background:#fafffe}
.badge{display:inline-block;padding:3px 10px;border-radius:100px;font-size:11px;font-weight:700}
.badge-green{background:#dcfce7;color:#15803d}
.badge-red{background:#fee2e2;color:#b91c1c}
.badge-amber{background:#fef9c3;color:#92400e}
.badge-teal{background:#ccfbf1;color:#0f766e}
.form-group{margin-bottom:18px}
.form-label{display:block;font-size:13px;font-weight:600;color:var(--navy);margin-bottom:6px}
.form-control{width:100%;padding:10px 14px;border:1.5px solid #e2e8f0;border-radius:8px;font-size:13px;font-family:inherit;transition:border-color 0.2s;outline:none}
.form-control:focus{border-color:var(--green)}
textarea.form-control{min-height:120px;resize:vertical}
select.form-control{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3E%3Cpath fill='%234B5C6B' d='M5.5 7l4.5 4.5L14.5 7'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;padding-right:36px}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.img-preview{width:100%;max-height:180px;object-fit:cover;border-radius:8px;margin-top:8px;border:1px solid #e2e8f0}
.stat-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:24px}
.stat-card{background:white;border-radius:12px;padding:20px;box-shadow:0 1px 8px rgba(0,0,0,0.06);border-top:4px solid}
.stat-card.green{border-color:var(--green)}.stat-card.teal{border-color:var(--teal)}.stat-card.amber{border-color:var(--amber)}.stat-card.red{border-color:#dc2626}
.stat-card .sc-num{font-size:32px;font-weight:800;line-height:1}
.stat-card .sc-lbl{font-size:12px;color:var(--slate);margin-top:4px}
.stat-card .sc-icon{font-size:22px;margin-bottom:10px}
.stat-card.green .sc-icon,.stat-card.green .sc-num{color:var(--green)}
.stat-card.teal .sc-icon,.stat-card.teal .sc-num{color:var(--teal)}
.stat-card.amber .sc-icon,.stat-card.amber .sc-num{color:var(--amber)}
.stat-card.red .sc-icon,.stat-card.red .sc-num{color:#dc2626}
@media(max-width:768px){.sidebar{transform:translateX(-100%)}.main{margin-left:0}.form-row{grid-template-columns:1fr}.stat-grid{grid-template-columns:1fr 1fr}}
</style>
</head>
<body>
<aside class="sidebar">
  <div class="sidebar-brand">
    <div class="brand-logo">D</div>
    <div class="brand-text"><span class="t1">Desa Meat</span><span class="t2">Admin Panel</span></div>
  </div>
  <nav>
    <div class="nav-section">Utama</div>
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <div class="nav-section">Konten</div>
    <a href="{{ route('admin.profil.index') }}" class="{{ request()->routeIs('admin.profil*') ? 'active' : '' }}">
      <i class="fas fa-village"></i> Profil Desa</a>
    <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
      <i class="fas fa-newspaper"></i> Berita</a>
    <a href="{{ route('admin.pengumuman.index') }}" class="{{ request()->routeIs('admin.pengumuman*') ? 'active' : '' }}">
      <i class="fas fa-bullhorn"></i> Pengumuman</a>
    <a href="{{ route('admin.potensi.index') }}" class="{{ request()->routeIs('admin.potensi*') ? 'active' : '' }}">
      <i class="fas fa-mountain"></i> Potensi Desa</a>
    <a href="{{ route('admin.event.index') }}" class="{{ request()->routeIs('admin.event*') ? 'active' : '' }}">
      <i class="fas fa-calendar-alt"></i> Event</a>
    <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
      <i class="fas fa-images"></i> Galeri</a>
    <a href="{{ route('admin.layanan.index') }}" class="{{ request()->routeIs('admin.layanan*') ? 'active' : '' }}">
      <i class="fas fa-concierge-bell"></i> Layanan</a>
    <div class="nav-section">Kontak</div>
    <a href="{{ route('admin.kontak.index') }}" class="{{ request()->routeIs('admin.kontak*') ? 'active' : '' }}">
      <i class="fas fa-address-card"></i> Kontak Desa</a>
    <a href="{{ route('admin.nomor-penting.index') }}" class="{{ request()->routeIs('admin.nomor-penting*') ? 'active' : '' }}">
      <i class="fas fa-phone-alt"></i> Nomor Penting</a>
  </nav>
  <div class="sidebar-footer">
    <a href="{{ route('home') }}" target="_blank"><i class="fas fa-external-link-alt"></i> Lihat Website</a>
  </div>
</aside>
<div class="main">
  <div class="topbar">
    <h1>@yield('page-title','Dashboard')</h1>
    <div class="user-info">
      <span class="uname">{{ Auth::user()->name }}</span>
      <div class="user-av">{{ strtoupper(substr(Auth::user()->name,0,1)) }}</div>
      <form method="POST" action="{{ route('logout') }}" style="margin:0">
        @csrf
        <button type="submit" class="btn btn-ghost btn-sm"><i class="fas fa-sign-out-alt"></i> Keluar</button>
      </form>
    </div>
  </div>
  <div class="content">
    @if(session('success'))
      <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}</div>
    @endif
    @yield('content')
  </div>
</div>
</body>
</html>