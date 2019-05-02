<?php
    if(empty($_SESSION['user']))
    {
      header('Location: login.php');
    }
    else{
      require('header.html');
    }
?>
<body class="container" style="background-color: lightblue;">
  <header>    
    <h1 class="text-center" style="font-family: 'Bangers', cursive; margin-top: 10px">Member's Home Page</h1>
  </header>
<?php
    require('footer.html');
?>