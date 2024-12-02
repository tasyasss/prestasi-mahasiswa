  <?php
  include '../app/views/template/header.php';
  ?>


  <div class="card w-50 mx-auto">
    <div class="card-body">
      <h5 class="card-title text-center mb-5">Login</h5>
      <form id="loginForm" method="POST">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>

      <!-- Tempat untuk menampilkan pesan error atau sukses -->
      <div id="loginMessage"></div>

      <!-- Tambahkan jQuery -->
    </div>
  </div>

  <?php
  include '../app/views/template/footer.php';
  ?>