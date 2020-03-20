<nav class="nav">
  <a class="nav-link" href="{{route('oinks.index')}}">
  Index</a>
  @auth
  <a class="nav-link" href="{{route('oinks.create')}}">Create Oink</a>
  <a class="nav-link" href="{{route('profile.index')}}">Profile</a>
  <a class="nav-link" href="{{route('home')}}">Logout</a>
  @endauth
  @guest
  <a class="nav-link" href="{{route('login')}}">Login</a>
  @endguest
</nav>
