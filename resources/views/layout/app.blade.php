@include('layout.header')

@include('layout.nav')

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8">
      @include('layout.flash_messages')
      @yield('content')
    </div>
    @include('layout.sidebar')
  </div>
</main>

@include('layout.footer')
