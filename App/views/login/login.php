<div class="login" style="margin-top: 15%;">
  <div class="row justify-content-center">
    <form method="POST">
      <center><h1 style="padding:5px;">Login</h1></center>
       <div class="form-group row">
         <div style="width:300px;">
           <input type="text" class="form-control" id="username" name="user_name" placeholder="Username">
         </div>
       </div>
       <div class="form-group row">
        <div style="width:300px;">
           <input type="password" class="form-control" id="password" name="user_pass" placeholder="Password">
         </div>
       </div>
       <div class="form-group row">
         <div style="width:300px;">
           <button type="submit" class="btn btn-outline-success" name="action" value="login">Log in</button>
           <button type="submit" class="btn btn-outline-danger">Forgotten Password</button>
         </div>
       </div>
       <div class="form-group row">
        <div style="width:300px;">
          Not registered <a href="/register">Create Account</a>
         </div>
       </div>
    </form>
  </div>
</div>
