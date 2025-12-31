<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #e9ecef; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card-login { width: 100%; max-width: 400px; border: none; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border-radius: 15px; }
        .card-header { background: #0d6efd; color: white; text-align: center; border-radius: 15px 15px 0 0 !important; padding: 20px; }
    </style>
</head>
<body>

<div class="card card-login">
    <div class="card-header">
        <h4 class="mb-0">🔒 Login Admin</h4>
    </div>
    <div class="card-body p-4">
        
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="admin@toyota.com" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="*******" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2">MASUK SISTEM</button>
        </form>
        
        <div class="text-center mt-3">
            <a href="{{ url('/') }}" class="text-decoration-none text-muted">← Kembali ke Halaman Depan</a>
        </div>
    </div>
</div>

</body>
</html>