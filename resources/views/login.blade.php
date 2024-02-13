<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet"
          href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/core.min.css">
    <title>Login</title>
<body>

<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-3">Sign in</h3>

                        @if(session('error'))
                            <div id="error-message" class="form-group mb-4" style="color: #fc3d3d; background-color: #F2F2F2; padding: 10px;">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-4">
                                <input type="text" id="username" name="username" class="form-control form-control-lg"
                                       placeholder="Login"/>
                            </div>

                            <div class="form-group mb-4">
                                <input type="password" id="password" name="password" class="form-control form-control-lg"
                                       placeholder="Password"/>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    setTimeout(function() {
        var errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 4000);
</script>
</body>
</html>
