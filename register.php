<?php
    require('header.html');
?>
<body class="container" style="background-color: lightblue;">
  <header>    
    <h1 class="text-center">Register</h1>
  </header>
  <div class="d-flex justify-content-center container">
  <div class="d-flex justify-content-center align-self-center form-body" style="background-color: white; width: 40%; border-radius: 5px; margin-top: 20px;">
    <form action="" method="post" style="width:80%;">
        <div class="form-group" style="padding-top: 40px; width: 100%">
            <input class="form-control" name="first-name" id="first-name" placeholder="First Name" autofocus>
        </div>
        <div class="form-group" style="">
            <input class="form-control" name="last-name" id="last-name" placeholder="Last Name" autofocus >
        </div>
        <div class="form-group" style="">
            <input class="form-control" name="email" id="email" placeholder="Email" autofocus >
        </div>
        <div class="form-group" style="">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autofocus >
        </div>
        <button type="submit" class="btn btn-primary" style="margin-bottom: 40px;">REGISTER</button>
        <a class="btn btn-primary float-right" href=login.php role="button" style="">GO BACK</a>
    </form>
  </div>
</div>
<?php
    require('footer.html');
?>