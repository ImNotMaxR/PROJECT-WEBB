<!DOCTYPE html>    
<html lang="en">    
    
<head>    
    <meta charset="utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1" />    
    <title>Login</title>    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />    
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />    
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />    
</head>    
    
<body id="kt_body" class="auth-bg">    
    <div class="d-flex flex-column flex-root">    
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">    
            <!--begin::Body-->    
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">    
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">    
                    <div class="w-lg-500px p-10">    
                        <!-- Laravel Form -->    
                        <form method="POST" action="{{ route('login') }}" class="form w-100" novalidate>    
                            @csrf    
                            <div class="text-center mb-11">    
                                <h1 class="text-dark fw-bolder mb-3">Masuk</h1>    
                                <div class="text-gray-500 fw-semibold fs-6">CiroBooks.com</div>    
                            </div>    
                            <div class="fv-row mb-8">    
                                <input id="email" type="email" name="email" placeholder="Email"    
                                    class="form-control bg-transparent" value="{{ old('email') }}" required    
                                    autofocus />    
                                @error('email')    
                                    <div class="text-danger mt-2">{{ "Email lu salah bodong" }}</div>    
                                @enderror    
                            </div>    
    
                            <div class="fv-row mb-3">    
                                <input id="password" type="password" name="password" placeholder="Password"    
                                    class="form-control bg-transparent" required />    
                                @error('password')    
                                    <div class="text-danger mt-2">{{ "Password lu Salah Bogeng" }}</div>    
                                @enderror    
                            </div>    
    
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">    
                                <div>    
                                    <label for="remember_me" class="form-check-label">    
                                        <input id="remember_me" type="checkbox" name="remember"    
                                            class="form-check-input" />    
                                        Ingatkan aku    
                                    </label>    
                                </div>    
                                @if (Route::has('password.request'))    
                                    <a href="{{ route('password.request') }}" class="link-primary">Lupa Password?</a>    
                                @endif    
                            </div>    
    
                            <div class="d-grid mb-10">    
                                <button type="submit" class="btn btn-primary">    
                                    <span class="indicator-label">Masuk</span>    
                                </button>    
                            </div>    
    
                            <div class="text-gray-500 text-center fw-semibold fs-6">Belum Punya Akun?    
                                <a href="{{ route('register') }}" class="link-primary">Buat Akun</a>    
                            </div>    
                        </form>    
                    </div>    
                </div>    
            </div>    
        </div>    
    </div>    
    
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>    
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>    
</body>    
    
</html>    
