@include('layout.admin.header')

@include('layout.admin.nav')

<main role="main" class="container">
<h2>Список сообщений</h2>
<hr>
  <div class="row">
    <div class="col-md-12">
      @yield('content')
    </div>
  </div>
</main>

@include('layout.admin.footer')