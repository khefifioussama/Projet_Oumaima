<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/styleLogin.css">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <div class="inner-container">
      <div class="form-wrapper is-active">
        <span class="login">Login</span>
        </button>
        <form class="form form-login">
          <fieldset>
            <legend>Please, enter your email and password for login.</legend>
            <div class="input-block">
              <label for="login-email">E-mail</label>
              <input id="login-email" type="email" required>
            </div>
            <div class="input-block">
              <label for="login-password">Password</label>
              <input id="login-password" type="password" required>
            </div>
          </fieldset>
        </form>
      </div>
      <button class="pushable">
        <span class="shadow"></span>
        <span class="edge"></span>
        <span class="front">
          Submit
        </span>
      </button>
    </div>
  </div>
  <div class="meter">
    <span id="XC"></span>
    <span id="YC"></span>
    <span id="DIS"></span>
  </div>
  <script src="../js/app.js"></script>
</body>

</html>