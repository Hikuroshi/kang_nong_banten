<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | {{ $title }}</title>
    <link rel="icon" href="/img/kangnongbanten.png">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    
</head>
<body style="font-family: Nunito, sans-serif">
    <nav class="navbar navbar-expand-lg bg-light mb-4 border">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
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
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/dashboard/pesertas">Dashboard</a>
                    </li>
                    <li class="nav-item px-2">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="btn btn-outline-danger rounded-pill px-3">Logout</button>
                        </form>
                    </li>
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
                    <div class="pe-lg-5 pe-md-0 text-start">
                        <h4>Kang Nong Banten</h4>
                        <p>Kang dan Nong Banten adalah sebutan untuk Duta Wisata, Pemuda Dan Pembangunan Provinsi Banten. Dilaksanakan pertama kali pada tahun 2000</p>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4>Media Sosial</h4>
                    <ul class=" list-unstyled">
                        <li><a href="" class="nav-link"><i class="bi bi-instagram"></i> @kangnongbanten</a></li>
                        <li><a href="" class="nav-link"><i class="bi bi-envelope"></i> paguyubanknb@gmail.com</a></li>
                        <li><a href="" class="nav-link"><i class="bi bi-globe2"></i> www.kangnongbanten.com</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <h4>Tag</h4>
                    <ul class=" list-unstyled">
                        <li>#excitingbanten</li>
                        <li>#pageuhngaguyub</li>
                        <li>#provinsibanten</li>
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
    <!-- jQuery -->
    <script src="/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/js/bootstrap.bundle.min.dt.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap4.min.js"></script>
    <script src="/js/dataTables.responsive.min.js"></script>
    <script src="/js/responsive.bootstrap4.min.js"></script>
    <script src="/js/dataTables.buttons.min.js"></script>
    <script src="/js/buttons.bootstrap4.min.js"></script>
    <script src="/js/jszip.min.js"></script>
    <script src="/js/pdfmake.min.js"></script>
    <script src="/js/vfs_fonts.js"></script>
    <script src="/js/buttons.html5.min.js"></script>
    <script src="/js/buttons.print.min.js"></script>
    <script src="/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/js/adminlte.min.js"></script>
    
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>
</html>