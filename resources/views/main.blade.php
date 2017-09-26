<!DOCTYPE html>
<html lang="en">


    @include('partials._head')

    <body>
<!-- Default Bootstrap Navbar -->
        @include('partials._nav')
        @yield('header')

        <div class="container" id="app">
        @include('partials._messages')
        @yield('content')
        </div>
<!-- end of .container -->
<script>
    // rename myToken as you like
    window.Laravel =  <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
        @include('partials._javascript')
        @yield('scripts')
    </body>

</html>