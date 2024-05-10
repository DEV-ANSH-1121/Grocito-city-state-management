<!DOCTYPE html>
<html lang="en">
    @include('admin.layout.head')
    <body class="sb-nav-fixed">
        @include('admin.layout.navbar')
        <div id="layoutSidenav">
            @include('admin.layout.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4">
                            @yield('heading')
                        </h4>
                        @yield('content')
                    </div>
                </main>
                @include('admin.layout.footer')
            </div>
        </div>
        @include('admin.layout.script')
    </body>
</html>
