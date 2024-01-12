<!doctype html>
<html lang="en">
@include('layouts.partials.header')

<body>
    <div class="main-wrapper">
    
        <div class="main-content">
            @yield('content')
      
       </div>

<!-- footer -->


    </div>

    @yield('js')
    @stack('js')
</body>

</html>