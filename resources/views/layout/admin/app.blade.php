@include('layout.admin.header')

@include('layout.admin.nav')
    <main role="main" class="container">
          @yield('content')
    </main>
@include('layout.admin.footer')
