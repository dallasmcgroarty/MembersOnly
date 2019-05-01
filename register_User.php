<?php
    require('header.html');
?>
<body class="container" style="background-color: lightblue;">
  <header>    
    <h1 class="text-center" style="font-family: 'Bangers', cursive; margin-top: 10px">Register</h1>
  </header>
  <div class="d-flex justify-content-center container">
  <div class="d-flex justify-content-center align-self-center form-body" style="background-color: white; width: 40%; border-radius: 5px; margin-top: 20px;">
    <form action="register_User.php" method="post" style="width:80%;">
        <div class="form-group" style="padding-top: 40px; width: 100%">
        <?php
            require('validate_reg.php');
        ?>
            <input class="form-control" name="firstName" id="firstName" placeholder="First Name" autofocus>
        </div>
        <div class="form-group" style="">
            <input class="form-control" name="lastName" id="lastName" placeholder="Last Name" autofocus >
        </div>
        <div class="form-group" style="">
            <input class="form-control" name="email" id="email" placeholder="Email" autofocus >
        </div>
        <div class="form-group" style="">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autofocus >
        </div>
        <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">REGISTER</button>
        <a class="d-flex justify-content-start" href=login.php style="margin-bottom: 10px">Return to sign in</a>
    </form>
  </div>
</div>
<?php
    require('footer.html');
?>