<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      </ul>
    </form>
    <form action="/logout" method="POST">
    @csrf
    <ul class="navbar-nav navbar-right">
        <button class="btn btn-warning" type="submit">Logout</button>
    </ul>
    </form>
  </nav>

