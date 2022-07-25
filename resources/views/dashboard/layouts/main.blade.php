<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | {{ $title }}</title>
    <link rel="icon" href="/img/kangnongbanten.png">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
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