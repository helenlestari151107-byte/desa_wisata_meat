<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin — Desa Wisata Meat</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Plus Jakarta Sans',sans-serif;background:linear-gradient(135deg,#1B5E2F 0%,#006D77 100%);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px}
        .reg-wrap{width:100%;max-width:460px}
        .reg-brand{text-align:center;margin-bottom:28px}
        .reg-brand .icon{width:64px;height:64px;background:#C8963E;border-radius:16px;display:flex;align-items:center;justify-content:center;font-size:28px;font-weight:900;color:#1A2744;margin:0 auto 14px;border:3px solid rgba(255,255,255,0.3)}
        .reg-brand h1{color:white;font-size:22px;font-weight:800;margin-bottom:4px}
        .reg-brand p{color:rgba(255,255,255,0.65);font-size:13px}
        .reg-card{background:white;border-radius:20px;padding:36px;box-shadow:0 20px 60px rgba(0,0,0,0.2)}
        .reg-card h2{font-size:16px;font-weight:700;color:#1A2744;margin-bottom:22px;padding-bottom:14px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;gap:8px}
        .reg-card h2 i{color:#1B5E2F}
        .form-group{margin-bottom:16px}
        .form-label{display:block;font-size:13px;font-weight:600;color:#1A2744;margin-bottom:7px}
        .input-icon{position:relative}
        .input-icon>i:first-child{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:14px}
        .form-control{width:100%;padding:12px 16px 12px 40px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:14px;font-family:inherit;outline:none;transition:border-color 0.2s;background:#f8fafc}
        .form-control:focus{border-color:#1B5E2F;background:white}
        .form-control.is-invalid{border-color:#dc2626}
        .form-control.with-toggle{padding-right:40px}
        .invalid-msg{font-size:12px;color:#dc2626;margin-top:5px}
        .toggle-pw{position:absolute;right:14px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#94a3b8;font-size:14px;padding:0}
        .toggle-pw:hover{color:#1B5E2F}
        .pw-strength{margin-top:6px}
        .pw-bars{display:flex;gap:4px;margin-bottom:4px}
        .pw-bar{flex:1;height:4px;border-radius:2px;background:#e2e8f0;transition:background 0.3s}
        .pw-bar.weak{background:#dc2626}
        .pw-bar.medium{background:#f59e0b}
        .pw-bar.strong{background:#16a34a}
        .pw-hint{font-size:11px;color:#64748b}
        .btn-register{width:100%;padding:13px;background:linear-gradient(135deg,#1B5E2F,#2E7D4F);color:white;border:none;border-radius:10px;font-size:14px;font-weight:700;font-family:inherit;cursor:pointer;transition:all 0.3s;margin-top:6px;display:flex;align-items:center;justify-content:center;gap:8px}
        .btn-register:hover{transform:translateY(-1px);box-shadow:0 6px 20px rgba(27,94,47,0.35)}
        .alert-danger{background:#fee2e2;color:#b91c1c;padding:12px 16px;border-radius:10px;font-size:13px;margin-bottom:16px;border-left:4px solid #dc2626}
        .divider{display:flex;align-items:center;gap:10px;margin:18px 0}
        .divider hr{flex:1;border:none;border-top:1px solid #e2e8f0}
        .divider span{font-size:12px;color:#94a3b8;white-space:nowrap}
        .login-link{text-align:center;font-size:13px;color:#64748b}
        .login-link a{color:#1B5E2F;font-weight:700;text-decoration:none}
        .login-link a:hover{text-decoration:underline}
        .back-link{display:block;text-align:center;margin-top:20px;color:rgba(255,255,255,0.7);font-size:13px;text-decoration:none;transition:color 0.2s}
        .back-link:hover{color:white}
    </style>
</head>
<body>
    <div class="reg-wrap">
        <div class="reg-brand">
            <div class="icon">M</div>
            <h1>Daftar Admin Baru</h1>
            <p>Desa Wisata Meat — Sistem Informasi Desa</p>
        </div>
        <div class="reg-card">
            <h2><i class="fas fa-user-plus"></i> Buat Akun Admin</h2>
            @if($errors->any())
            <div class="alert-danger"><i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" required autofocus placeholder="Nama lengkap admin">
                    </div>
                    @error('name')<div class="invalid-msg">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required placeholder="email@desameat.id">
                    </div>
                    @error('email')<div class="invalid-msg">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="pw1"
                               class="form-control with-toggle @error('password') is-invalid @enderror"
                               required placeholder="Min. 8 karakter"
                               oninput="checkStrength(this.value)">
                        <button type="button" class="toggle-pw" onclick="togglePw('pw1','eye1')">
                            <i id="eye1" class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="pw-strength">
                        <div class="pw-bars">
                            <div class="pw-bar" id="b1"></div>
                            <div class="pw-bar" id="b2"></div>
                            <div class="pw-bar" id="b3"></div>
                            <div class="pw-bar" id="b4"></div>
                        </div>
                        <div class="pw-hint" id="pwHint">Masukkan password</div>
                    </div>
                    @error('password')<div class="invalid-msg">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Konfirmasi Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password_confirmation" id="pw2"
                               class="form-control with-toggle"
                               required placeholder="Ulangi password"
                               oninput="checkMatch()">
                        <button type="button" class="toggle-pw" onclick="togglePw('pw2','eye2')">
                            <i id="eye2" class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div id="matchMsg" style="font-size:12px;margin-top:5px;display:none"></div>
                </div>
                <button type="submit" class="btn-register">
                    <i class="fas fa-user-check"></i> Buat Akun Admin
                </button>
            </form>
            <div class="divider"><hr><span>sudah punya akun?</span><hr></div>
            <div class="login-link">
                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Masuk ke Panel Admin</a>
            </div>
        </div>
        <a href="{{ route('home') }}" class="back-link"><i class="fas fa-arrow-left"></i> Kembali ke Website</a>
    </div>
    <script>
        function togglePw(id,eyeId){var i=document.getElementById(id),e=document.getElementById(eyeId);if(i.type==='password'){i.type='text';e.className='fas fa-eye-slash';}else{i.type='password';e.className='fas fa-eye';}}
        function checkStrength(v){var bars=[document.getElementById('b1'),document.getElementById('b2'),document.getElementById('b3'),document.getElementById('b4')],hint=document.getElementById('pwHint'),s=0;if(v.length>=8)s++;if(/[A-Z]/.test(v))s++;if(/[0-9]/.test(v))s++;if(/[^A-Za-z0-9]/.test(v))s++;var cls=s<=1?'weak':s<=2?'medium':'strong',labels=['','Lemah','Cukup','Kuat','Sangat Kuat'],colors=['','#dc2626','#f59e0b','#16a34a','#16a34a'];bars.forEach(function(b,i){b.className='pw-bar '+(i<s?cls:'');});hint.textContent=v.length===0?'Masukkan password':labels[s]||'Lemah';hint.style.color=colors[s]||'#64748b';}
        function checkMatch(){var p=document.getElementById('pw1').value,c=document.getElementById('pw2').value,m=document.getElementById('matchMsg');if(c.length===0){m.style.display='none';return;}m.style.display='block';if(p===c){m.textContent='✓ Password cocok';m.style.color='#16a34a';}else{m.textContent='✗ Password tidak cocok';m.style.color='#dc2626';}}
    </script>
</body>
</html>
