<!DOCTYPE html>
<!--**********************************************************************************-->
<!-- Skyllabler - http://www.skyllaber.com                                            -->
<!-- Copyright (c) 2014-2015                                                          -->
<!-- by Skyllabler Soft                                                               -->
<!--**********************************************************************************-->
<html lang="en">
<head>
    @include('admin.layouts.head')
</head>
<body id="Body" class="skin-green sidebar-mini">
    <!-- wrapper -->
    <div class="wrapper">
        <!-- Header -->
        @include('admin.layouts.header')
        <!-- ./Header -->

        <!-- SidebarMain -->
        @include('admin.layouts.sidebarmain')
        <!-- ./SidebarMain -->

        <!-- Content Wrapper-->
        <div class="content-wrapper">
            <!-- Page Content  -->
            @yield('content')
            <!-- ./Page Content -->
        </div>
        <!-- ./Content Wrapper -->

        <!-- Footer -->
        @include('admin.layouts.footer')
        <!-- ./Footer -->

        <!-- SideBar Control -->
        @include('admin.layouts.sidebarcontrol')
        <!-- ./SideBar Control -->
    </div>
    <!-- ./wrapper -->

    <!-- Footer Scripts -->
    @include('admin.layouts.footerscripts')
    <!-- ./Footer Scripts --> 
</body>
</html>