<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nikash-Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    @include('backend.layout.partials.styles')

<body class="authentication-bg">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">

            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p class="text-muted">Sign in to continue to Nikash-Online.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('admin.login.submit') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Phone number</label>
                                        <input id="phone" type="number"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="email" autofocus>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="float-end"> <a href="auth-recoverpw.html"
                                                class="text-muted">Forgot password?</a> </div>
                                        <label class="form-label" for="password">Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="remember"
                                                id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember
                                                me</label>
                                        </div>

                                    </div>

                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log
                                            In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p>©
                                            <script>
                                                document.write(new Date().getFullYear())
                                            </script> Nikash-Online <i class="mdi mdi-heart text-danger"></i> by
                                            World Wide Soft</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    @include('backend.layout.partials.script')
</body>

</html>
