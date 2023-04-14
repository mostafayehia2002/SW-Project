<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Form</title>
    <link rel="stylesheet" href="./Login/CSS Style/all.min.css">
    <link rel="stylesheet" href="./Login/CSS Style/login.css">
  </head>
  <body>
    <div class="container">
      <div class="form-box">
        <h1 class="tittle">Logo</h1>
        <form action="">

          <div class="input-group">

            <div class="input-filed" id="nameFiled">
              <i class="fa-solid fa-user"></i>
              <input type="text" placeholder="Username">
            </div>

            <div class="input-filed">
              <i class="fa-solid fa-lock"></i>
              <input type="password" placeholder="Password" >
            </div>

            <div class="forget-pass">
              <a href="#">Forget Password?</a>
            </div>

            <div class="input-radio">
              <div class="admin">
                <input type="radio" id="admin" name="user">
                <label for="admin">Admin</label>
              </div>
              <div class="docter">
                <input type="radio" id="docter" name="user">
                <label for="docter">Docter</label>
              </div>
              <div class="user">
                <input type="radio" id="user" name="user">
                <label for="user">Student</label>
              </div>
            </div>

          </div>

          <div class="btn-filed">
            <button type="button">Login</button>
          </div>

        </form>
      </div> 
    </div>
  </body>
</html>