<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/fontawesome.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>KAFA System</title>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-light bg-white border-bottom">
        <div class="container-fluid">
            <h4 class="mt-2">KAFA Management System</h4>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Sidebar -->

    <nav id="sidebarMenu" class="d-lg-block sidebar">

        <!-- Brand -->
        <div class="container logoImage">
            <a href="index.html" class="navbar-brand">
                <img src="/images/logo.png" alt="" width="266" class="logo">
            </a>
        </div>
        <!-- End Brand -->

        <div class="menu position-sticky py-3 px-5">
            <ul class="list-unstyled text-white py-2">
                <span class="fw-bold h5">Activity</span>
                <li>
                    <a href="#" class="nav-link "><i class="fas fa-table "></i><span class="item"> Class
                            Timetable</span></a>
                </li>
                <li>
                    <a href="#" class="nav-link "><i class="fas fa-chart-line "></i><span class="item"> Student
                            Result</span></a>
                </li>
                <li>
                    <a href="#" class="nav-link active"><i class="fas fa-pencil "></i><span class="item">
                            Activity</span></a>
                </li>
                <li>
                    <a href="#" class="nav-link "><i class="fas fa-users "></i><span class="item"> Profile
                            List</span></a>
                </li>
            </ul>
            <ul class="list-unstyled text-white py-2">
                <span class="fw-bold h5">Report</span>
                <li>
                    <a href="#" class="nav-link "><i class="fas fa-book-open "></i><span class="item"> Report
                            Activity</span></a>
                </li>
            </ul>
            <ul class="list-unstyled text-white py-2">
                <span class="fw-bold h5">Approve</span>
                <li>
                    <a href="#" class="nav-link "><i class="fas fa-user-plus "></i><span class="item"> Approve
                            Student</span></a>
                </li>
                <li>
                    <a href="#" class="nav-link "><i class="fas fa-user-plus "></i><span class="item"> Approve
                            Teacher</span></a>
                </li>
            </ul>
            <ul class="list-unstyled text-white py-2">
                <span class="fw-bold h5">Profile</span>
                <li>
                    <a href="#" class="nav-link "><i class="fas fa-user "></i><span class="item">
                            Profile</span></a>
                </li>
                <li>
                    <a href="{{route('logout')}}" class="nav-link "><i class="fas fa-sign-out-alt "></i><span class="item">
                            LogOut</span></a>
                </li>
            </ul>
        </div>

    </nav>
    <!-- End Sidebar -->


    <section class="backgroundSpace">

        <!-- Breadcrumb -->
        <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" class="bg-white pt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"
                        class="text-dark link-underline-dark link-underline-opacity-0 link-underline-opacity-75-hover">
                        Home </a></li>
                <li class="breadcrumb-item"><a href="#"
                        class="text-dark link-underline-dark link-underline-opacity-0 link-underline-opacity-75-hover">
                        About </a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#"
                        class="text-dark link-underline-dark link-underline-opacity-0 link-underline-opacity-75-hover">
                        Staff </a></li>
            </ol>
        </nav>
        <!-- End Breadcrumb -->

        <div class="container">
            <div class="row">
                <div class="col-md-12 p-5">
                    <div class="container bg-success px-0 pt-5 w-100 h-100 rounded-4">

                        @yield('content')

                    </div>
                </div>
            </div>

    </section>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/script.js"></script>
</body>

</html>
