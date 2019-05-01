<?php
    require('header.html');
?>
<body class="container" style="background-color: lightblue;">
  <header>    
    <h1 class="text-center" style="font-family: 'Bangers', cursive; margin-top: 10px">Sign In</h1>
  </header>
  <div class="d-flex justify-content-center container" style="flex-direction: column;">
  <div class="d-flex justify-content-center align-self-center form-body" style="background-color: white; width: 40%; border-radius: 5px; margin-top: 20px;">
    <form action="sign_in.php" method="post" style="width:80%;">
        <div class="form-group" style="padding-top: 40px; width: 100%">
        <?php
            require('verify_sign_in.php');
        ?>
            <input class="form-control" name="email" id="email" placeholder="Email" autofocus>
        </div>
        <div class="form-group" style="">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autofocus >
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100%">SIGN IN</button>
        <a class="float-left" href=register.php style="margin-top: 10px; margin-bottom: 10px; text-decoration: none">Register</a>
    </form>
  </div>
  <a class="d-flex align-self-end float-right" href=# role="button" style="; margin-top: 10px; margin-bottom: 10px; width: 70%; text-decoration: none; font-size: 15px;">Continue without logging in</a>
</div>
<?php
    require('footer.html');
?>