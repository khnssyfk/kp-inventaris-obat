<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Farmasi Melife</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/pages/auth.css">
</head>
<body>
    <div id="auth">     
        <div class="row h-100">
            <div class="col-lg-5">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="/login"><img src="images\logo\logo-melife.png" alt="Logo"></a>
                    </div>
                    @if(session()->has('loginError')) 
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(session()->has('PasswordBerhasil')) 
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('PasswordBerhasil') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-4">Log in dengan Email dan Password kamu!</p>
                
                    <form action="/login" method="post">
                        @csrf
                        <div class="form-floating mb-2">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                            <label for="email">Email</label>
                            @error('email')
                            <div class="invalid-feedback">
                              Email yang digunakan tidak valid
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                          </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Log in</button>
                    </form>

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

