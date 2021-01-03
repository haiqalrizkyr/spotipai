<nav class="navbar fixed-top" style="background-color: black">
  <div class="container-fluid">
    <a class="navbar-brand" style="color: white; font-size: 40px">Spotipai</a>
    <form class="d-flex">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <?php if (isset($_SESSION['user'])) : ?>
        <div style="margin-right: 50px" class="dropdown">
          <button class="btn btn-lg me-md-2 dropdown-toggle" style="text-decoration: none; color: white;" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['user']['nama'] ?>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a></li>
          </ul>
        </div>

        <?php else : ?>
        <a class="btn btn-link btn-lg me-md-2" style="text-decoration: none;color: white;" href="signup.php">Sign Up</a>

        <button class="btn btn-success btn-lg" style="border-radius: 50px; padding-right: 30px; padding-left: 30px; text-align: center; background-color: white; color: black" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Log In</button>

        <?php endif ?>
      </div>
    </form>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="login.php" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-4 control-label">Username</label>
          <input class="form-control col-sm-4" type="text" name="username" placeholder="Username" required>
         </div>
         <br>
         <div class="form-group">
          <label class="col-sm-4 control-label">Password</label>
          <input class="form-control col-sm-4" type="password" name="sandi" placeholder="Password" required>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" name="login" class="btn btn-outline-success">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>