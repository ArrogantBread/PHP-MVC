
<div class="register" style="margin-top: 15%;">
  <div class="row justify-content-center">
    <form method="POST" id="registerForm">
      <center><h1 style="padding:5px;">Register</h1></center>
      <div class="form-group row">
        <div style="width:300px;">
          <input type="text" class="form-control" id="email" name="user_email" placeholder="E-Mail" required>
        </div>
      </div>
       <div class="form-group row">
         <div style="width:300px;">
           <input type="text" class="form-control" id="username" name="user_name" placeholder="Username" required>
         </div>
       </div>
       <div class="form-group row" id="passwordDiv">
        <div style="width:300px;">
           <input type="password" class="form-control" id="password" name="user_pass" placeholder="Password" required>
         </div>
       </div>
       <div class="form-group row">
        <div style="width:300px;">
           <input type="password" class="form-control" id="passwordConf" name="user_passConf" placeholder="Confirm Password" required>
           <div id ="passErr" class="form-control-feedback">
             <?php if(isset($_SESSION['error'])) {echo $_SESSION['error']; unset($_SESSION['error']);}; ?>
           </div>
         </div>
       </div>
       <div class="form-group row">
         <div style="width:300px;">
           <button type="submit" class="btn btn-outline-success" name="action" value="register">Register</button>
         </div>
       </div>
       <div class="form-group row">
        <div style="width:300px;">
          Already have an account? <a href="/login">Log In</a>
         </div>
       </div>
    </form>
  </div>
</div>
