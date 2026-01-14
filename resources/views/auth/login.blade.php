<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SID Sidomulyo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #198754 0%, #0f5132 100%); 
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .card-login {
            border: none;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            overflow: hidden;
            width: 100%;
            max-width: 460px;
        }
        .card-header {
            background-color: white;
            border-bottom: none;
            padding-top: 40px;
            padding-bottom: 10px;
            text-align: center;
        }
        .logo-icon {
            font-size: 55px;
            color: #198754;
            margin-bottom: 10px;
        }
        .btn-success-custom {
            background-color: #198754;
            border: none;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-success-custom:hover {
            background-color: #146c43;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(20, 108, 67, 0.3);
        }
        .form-control {
            padding: 12px;
            border-radius: 8px;
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
        }
        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
            background-color: white;
        }
        .input-group-text {
            background-color: white;
            border: 1px solid #e9ecef;
            border-right: none;
            color: #198754;
        }
        .form-control {
            border-left: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center"> 
                
                <div class="card card-login">
                    
                    <div class="card-header">
                        <div class="logo-icon">
                            <i class="bi bi-buildings-fill"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-0">SID SIDOMULYO</h4>
                        <p class="text-muted small">Sistem Informasi Desa</p>
                    </div>

                    <div class="card-body p-4 p-md-5"> @if(session('error'))
                            <div class="alert alert-danger text-center small py-2">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label small text-muted">Alamat Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="admin@gmail.com" required autofocus>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label small text-muted">Kata Sandi</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Masukan password..." required>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success btn-success-custom text-white">
                                    MASUK SEKARANG <i class="bi bi-arrow-right-circle ms-2"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                    
                    <div class="card-footer bg-light text-center py-3 border-0">
                        <small class="text-muted">&copy; {{ date('Y') }} Desa Sidomulyo 1 Balimbingan</small>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>