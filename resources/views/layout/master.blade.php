<!doctype html>
<html lang="en">
@include('layout.head')
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    @include('layout.sidebar')
    <div class="body-wrapper">
        @include('layout.header')
        <div class="body-wrapper-inner">
            @include('pages.errors.alert')
            @yield('content')
            @include('layout.footer')
        </div>
    </div>
</div>
@include('layout.script')
</body>
</html>
