<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body>
    <div id="app">
        @include('partials.sidebar')
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                @include('partials.navbar')
            </header>
            <div id="main-content">
                <div class="page-heading">
                    @include('sweetalert::alert')
                    @yield('content')
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>
    @include('partials.script')
</body>

</html>