<!DOCTYPE html>
<html lang="en">

@include('partials.head')
@include('partials.css')
@yield('style')

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('partials.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('partials.navbar')
                @include('common.alert')
                @yield('content')
            </div>

            @include('partials.footer')
        </div>
    </div>
    @include('partials.modal')


    @include('partials.js')
    @yield('script')
</body>
</html>
