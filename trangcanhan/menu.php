<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body>
  <?php
  if (isset($_GET["pid"])){
    $id=$_GET["pid"];
    switch ($id){
      case 1: 
        include("avartar.php");
        break;
      case 3: 
          include("xoabia.php");
          break;
      case 2: 
          include("xoatieusu.php");
          break;
      case 4: 
          include("suabia.php");
          break;
      }
      
  }
  ?>
    
  </body>
</html>