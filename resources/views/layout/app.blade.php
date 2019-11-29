@include('layout.header')

@include('layout.nav')

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8">
      @yield('content')
    </div>
    @include('layout.sidebar')
  </div>
</main>

@include('layout.footer')