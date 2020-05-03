@include('layout.header')

@include('layout.nav')

<main role="main" class="container">
  <div class="row">
    <div class="col-md">
      @include('layout.flash_messages')
      @yield('content')
    </div>
      @section('sidebar')
        @include('layout.sidebar')
      @show
  </div>
</main>

@include('layout.footer')
