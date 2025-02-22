<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

    <!-- Core CSS -->
    <link rel="stylesheet" href={{ asset('vendor/css/core.css') }} class="template-customizer-core-css" />
    <link rel="stylesheet" href={{ asset('vendor/css/theme-default.css') }} class="template-customizer-theme-css" />

    <!-- Page -->
    <link rel="stylesheet" href={{ asset('vendor/css/pages/page-auth.css') }} />
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src={{ asset('vendor/js/helpers.js') }}></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src={{ asset('js/config.js') }}></script>

</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center m-1">
                            <h1 class="permanent-marker-regular shadow p-2 rounded">RAGAM</h1>
                        </div>
                        <!-- /Logo -->
                        <h3 class="text-center">Login</h3>
                        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                    placeholder="Enter your email" value="{{ old('email') }}" autofocus />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                                        name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div>
                        
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        
                            <!-- Toastr Notifications -->
                            @if (session('error'))
                                <script>
                                    toastr.error('{{ session('error') }}');
                                </script>
                            @endif

                            @if (session('success'))
                                <script>
                                    toastr.success('{{ session('success') }}');
                                </script>
                            @endif

                            @if (session('info'))
                                <script>
                                    toastr.info('{{ session('info') }}');
                                </script>
                            @endif
                        </form>
                        
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src={{ asset('vendor/libs/jquery/jquery.js') }}></script>
    <script src={{ asset('vendor/js/bootstrap.js') }}></script>

    <script src={{ asset('vendor/js/menu.js') }}></script>
    <!-- endbuild -->

    <!-- Main JS -->
    <script src={{ asset('js/main.js') }}></script>

    <!-- Page JS -->
</body>

</html>
