<!DOCTYPE html>
<html lang="en">
<head>
    @include('dashboard.includes._head')
</head>
<body>
    <div class="container-scroller">
        <!-- include:includes/_navbar -->
        @include('dashboard.includes._navigation')
        <!-- include -->
        <div class="container-fluid page-body-wrapper">
            <!-- include:includes/_sidebar -->
            @include('dashboard.includes._sidebar')
            <!-- include -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @include('dashboard.includes._breadcrumbs')
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- include:includes/_footer -->
                @include('dashboard.includes._footer') 
                <!-- include -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- include:includes/_script -->
    @include('dashboard.includes._script')
    <!-- include -->
</body>
</html>