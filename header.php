<nav class="navbar fixed-top" style="background-color: black">
  <div class="container-fluid">
    <a class="navbar-brand" style="color: white; font-size: 40px">Spotipai</a>
    <form class="d-flex">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-link btn-lg me-md-2" style="text-decoration: none;color: white;" href="signup.php">Sign Up</a>
        <button class="btn btn-success btn-lg" style="border-radius: 50px; padding-right: 30px; padding-left: 30px; text-align: center; background-color: white; color: black" type="button" data-toggle="modal" data-target="#LoginModalCenter">Log In</button>
      </div>
    </form>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="LoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <table align="center">
            <tr>
              <td>Username</td>
              <td><input type="text"></td>
            </tr>
            <tr>
              <td>Password</td>
              <td><input type="password"></td>
            </tr>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-outline-success">Login</button>
      </div>
    </div>
  </div>
</div>