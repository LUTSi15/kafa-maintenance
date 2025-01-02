<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/fontawesome.css">
    <link rel="stylesheet" href="/css/bootstrapKafa.css">
    <link rel="stylesheet" href="/css/stylesKafa.css">
    <title>KAFA System</title>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-light bg-white border-bottom">
        <div class="container-fluid">
            <h4 class="mt-2">
                Hi {{ Auth::user()->username }}, you login as {{ Auth::user()->role }}
            </h4>
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
                <span class="fw-bold h5">Profile</span>
                <li>
                    <a href="{{ route('kafa.listParents') }}"
                        class="nav-link {{ Request::routeIs('kafa.listParents') ? 'active' : '' }}"
                        style="color: inherit;">
                        <i class="fas fa-book-open"></i><span class="item"> List of Parent</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('listStudents') }}"
                        class="nav-link {{ Request::routeIs('listStudents') ? 'active' : '' }}" style="color: inherit;">
                        <i class="fas fa-book-open"></i><span class="item"> List of Student</span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled text-white py-2">
                <span class="fw-bold h5">Registration</span>
                <li>
                    <a href="{{ route('kafa.registerParent') }}"
                        class="nav-link {{ Request::routeIs('kafa.registerParent') ? 'active' : '' }}"
                        style="color: inherit;">
                        <i class="fas fa-book-open"></i><span class="item"> Create for acc Parents </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kafa.registerTeacher') }}"
                        class="nav-link {{ Request::routeIs('kafa.registerTeacher') ? 'active' : '' }}"
                        style="color: inherit;">
                        <i class="fas fa-book-open"></i><span class="item"> Create for acc Teacher </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kafa.registerStudent') }}"
                        class="nav-link {{ Request::routeIs('kafa.registerStudent') ? 'active' : '' }}"
                        style="color: inherit;">
                        <i class="fas fa-book-open"></i><span class="item"> Register Student</span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled text-white py-2">
                <span class="fw-bold h5">Activity</span>
                <li>
                    <a href="{{ route('kafa.manageActivity') }}"
                        class="nav-link {{ Request::routeIs('kafa.manageActivity') ? 'active' : '' }}"
                        style="color: inherit;">
                        <i class="fas fa-book-open"></i><span class="item"> Activity</span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled text-white py-2">
                <span class="fw-bold h5">Report</span>
                <li>
                    <a href="{{ route('kafa.listReportActivity') }}"
                        class="nav-link {{ Request::routeIs('kafa.listReportActivity') ? 'active' : '' }}"
                        style="color: inherit;">
                        <i class="fas fa-book-open"></i><span class="item"> Report Activity</span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled text-white py-2">
                <span class="fw-bold h5">Profile</span>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link p-0" style="color: inherit;">
                            <i class="fas fa-sign-out-alt"></i><span class="item">LogOut</span>
                        </button>
                    </form>
                </li>
            </ul>

        </div>

    </nav>
    <!-- End Sidebar -->


    <section class="backgroundSpace">

        <!-- Breadcrumb -->
        <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" class="bg-white pt-1">
            <ol class="breadcrumb">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!$loop->last)
                        <!-- Breadcrumb link -->
                        <li class="breadcrumb-item">
                            <a href="{{ $breadcrumb['url'] }}"
                                class="text-dark link-underline-dark link-underline-opacity-0 link-underline-opacity-75-hover">
                                {{ $breadcrumb['name'] }}
                            </a>
                        </li>
                    @else
                        <!-- Current page -->
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $breadcrumb['name'] }}
                        </li>
                    @endif
                @endforeach
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
