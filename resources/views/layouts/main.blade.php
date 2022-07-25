<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kang Nong Banten | {{ $title }}</title>
    <link rel="icon" href="/img/kangnongbanten.png">
    
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
</head>
<body style="font-family: Nunito, sans-serif">
    <nav class="navbar navbar-expand-lg bg-light border">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <img src="/img/kangnongbanten.png" alt="" width="80" class="d-inline-block align-text-top img-fluid me-3">
                Kang Nong Banten
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fw-bold">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/pesertas">Peserta</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    
                    @auth
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/dashboard/pesertas">Dashboard</a>
                    </li>
                    @endauth

                    @guest
                    <li class="nav-item px-2">
                        <a class="btn btn-outline-primary rounded-pill px-3" href="/login">Login</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('container')

    <footer class="bg-light border-top">
        <div class="container pt-4">
            <div class="text-center">
                <a class="text-dark bi bi-facebook fs-5 mx-3" href="#"></a>
                <a class="text-dark bi bi-twitter fs-5 mx-3" href="#"></a>
                <a class="text-dark bi bi-instagram fs-5 mx-3" href="#"></a>
                <a class="text-dark bi bi-youtube fs-5 mx-3" href="#"></a>
                <a class="text-dark bi bi-whatsapp fs-5 mx-3" href="#"></a>
                <a class="text-dark bi bi-discord fs-5 mx-3" href="#"></a>
            </div>
            <hr>
            <div class="row g-3 my-3">
                <div class="col-lg-6 col-md-12">
                    <div class="pe-lg-5 pe-md-0 text-center text-lg-start">
                        <h4>Lorem, ipsum.</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum recusandae perferendis fugit inventore quis eaque reprehenderit! Distinctio magnam cumque non.</p>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4>Lorem, ipsum.</h4>
                    <ul class=" list-unstyled">
                        <li>Lorem.</li>
                        <li>Lorem.</li>
                        <li>Lorem.</li>
                        <li>Lorem.</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <h4>Lorem, ipsum.</h4>
                    <ul class=" list-unstyled">
                        <li>Lorem.</li>
                        <li>Lorem.</li>
                        <li>Lorem.</li>
                        <li>Lorem.</li>
                    </ul>
                    
                </div>
            </div>
        </div>
        
        <div class="border-top">
            <div class="container text-center p-3">
                © 2022 Copyright:
                <a class="text-dark text-decoration-none" href="#">Kang Nong Banten</a>
            </div>    
        </div>
    </footer>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>