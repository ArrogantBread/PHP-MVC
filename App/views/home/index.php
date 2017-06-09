<?php use App\controllers\Auth as Auth; ?>
<div class="container" style="text-align: center;padding-top: 15%;">
  <div class="row justify-content-md-center">
    <div class="col col-lg-2">
      <?php if (auth::check()) {
        echo '<a href="/logout"><img class="homeImg" src="public/images/login.png" alt="logout"></a>';
      } else {
        echo '<a href="/login"><img class="homeImg" src="public/images/login.png" alt="login"></a>';
      };
      ?>
    </div>
    <div class="col col-lg-2">
      <a href='/gallery'><img class="homeImg" src="public/images/gallery.png" alt="login"></a>
    </div>
    <div class="col col-lg-2">
      <a href='/home/log'><img class="homeImg" src="public/images/edit.png" alt="login"></a>
    </div>
  </div>
  <div class="row justify-content-md-center">
    <div class="col col-lg-2">
      <?php if (auth::check()) {
        echo "<p class='homeText'>Logout</p>";
      } else {
        echo "<p class='homeText'>Login</p>";
      };
      ?>
    </div>
    <div class="col col-lg-2">
      Gallery
    </div>
    <div class="col col-lg-2">
      View Logs
    </div>
  </div>
</div>
