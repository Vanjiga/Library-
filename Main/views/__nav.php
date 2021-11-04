<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="/showcase" class="nav-link px-2 link-dark">Browse</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
      </ul>

      <form method="get" action="/showcase" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" name='search' class="form-control form-control-dark" placeholder="Search..." value="" aria-label="Search">
        </form>

      <div class="col-md-3 text-end">
        <?php if(isset($_SESSION['username'])) { ?>
          <a href="/library" type="button" class="btn btn-outline-danger me-2">Dashboard</a>
        <?php } ?>
        <?php if(isset($_SESSION['username'])) { ?>
          <a href="/logout" type="button" class="btn btn-outline-warning me-2">Signout</a>
        <?php } else {?>
        <a href="/login" type="button" class="btn btn-outline-primary me-2">Login</a>
        <a href="/register" type="button" class="btn btn-primary">Sign-up</a>
        <?php } ?>
      </div>
    </header>
  </div>