<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Desa Wisata Meat</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #1B5E2F 0%, #006D77 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px
        }

        .login-wrap {
            width: 100%;
            max-width: 420px
        }

        .login-brand {
            text-align: center;
            margin-bottom: 32px
        }

        .login-brand .icon {
            width: 64px;
            height: 64px;
            background: #C8963E;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: 900;
            color: #1A2744;
            margin: 0 auto 14px;
            border: 3px solid rgba(255, 255, 255, 0.3)
        }

        .login-brand h1 {
            color: white;
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 4px
        }

        .login-brand p {
            color: rgba(255, 255, 255, 0.65);
            font-size: 13px
        }

        .login-card {
            background: white;
            border-radius: 20px;
            padding: 36px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2)
        }

        .form-group {
            margin-bottom: 18px
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #1A2744;
            margin-bottom: 7px
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            font-family: inherit;
            outline: none;
            transition: border-color 0.2s;
            background: #f8fafc
        }

        .form-control:focus {
            border-color: #1B5E2F;
            background: white
        }

        .input-icon {
            position: relative
        }

        .input-icon i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 14px
        }

        .input-icon .form-control {
            padding-left: 40px
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #1B5E2F, #2E7D4F);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 6px
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(27, 94, 47, 0.35)
        }

        .check-row {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #4B5C6B;
            margin-bottom: 6px
        }

        .check-row input {
            accent-color: #1B5E2F
        }

        .alert-danger {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 16px;
            border-left: 4px solid #dc2626
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            text-decoration: none;
            transition: color 0.2s
        }

        .back-link:hover {
            color: white
        }
    </style>
</head>

<body>
    <div class="login-wrap">
        <div class="login-brand">
            <div class="icon">M</div>
            <h1>Admin Panel</h1>
            <p>Desa Wisata Meat — Sistem Informasi Desa</p>
        </div>
        <div class="login-card">
            @if($errors->any())
            <div class="alert-danger"><i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="admin@desameat.id">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" class="form-control" required placeholder="••••••••">
                    </div>
                </div>
                <div class="check-row">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Ingat saya</label>
                </div>
                <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt"></i> &nbsp; Masuk ke Panel Admin</button>
            </form>
        </div>
        <a href="{{ route('home') }}" class="back-link"><i class="fas fa-arrow-left"></i> Kembali ke Website</a>
    </div>
</body>

</html>