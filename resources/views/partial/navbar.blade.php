<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      </ul>
    </form>
    <form action="/logout" method="POST">
    <ul class="navbar-nav navbar-right">
        <button class="btn btn-warning" tabindex="3" type="submit">Logout</button>
        @csrf
    </ul>
    </form>
  </nav>

