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
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/trix.css">

    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
    </style>
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
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/pesertas">Peserta</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/posts">Dokumentasi</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/about">Tentang</a>
                    </li>
                    <li class="nav-item dropdown px-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dashboard
                        </a>
                        <ul class="dropdown-menu mb-3">
                            <li><a class="dropdown-item" href="/dashboard/pesertas">Dashboard Peserta</a></li>
                            <li><a class="dropdown-item" href="/dashboard/posts">Dashboard Postingan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item px-2">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="btn btn-outline-danger rounded-pill px-3 shadow-sm">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    @yield('container')

    <footer class="bg-gold border-top text-white mt-5">
        <div class="container pt-4">
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
                        <li><a href="https://www.instagram.com/kangnongbanten" target="_blank" rel="noopener noreferrer" class="nav-link"><i class="bi bi-instagram"></i> @kangnongbanten</a></li>
                        <li><a href="mailto: paguyubanknb@gmail.com" target="_blank" rel="noopener noreferrer" class="nav-link"><i class="bi bi-envelope"></i> paguyubanknb@gmail.com</a></li>
                        <li><a href="www.kangnongbanten.com" target="_blank" rel="noopener noreferrer" class="nav-link"><i class="bi bi-globe2"></i> www.kangnongbanten.com</a></li>
                        <li><a href="https://www.youtube.com/channel/UCawqNEwUjaPuRUQabYiztgA" target="_blank" rel="noopener noreferrer" class="nav-link"><i class="bi bi-youtube"></i> Kang Nong Banten</a></li>
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
        
        <div class="bg-gold-2">
            <div class="container text-center p-3">
                © 2022 Copyright:
                <a class="text-white text-decoration-none" href="#">Kang Nong Banten</a>
            </div>    
        </div>
    </footer>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.dt.js"></script>
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
    <script src="/js/adminlte.min.js"></script>
    <script type="text/javascript" src="/js/trix.js"></script>
    
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

        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })

        
        function previewImage() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            
            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
</body>
</html>