<?php
  session_start();
  include '../libraries/chocolates.php';

  $product_id=$_GET['product_id'];
  $product_name=$_GET['product_name'];

  //echo $product_id."<br>".$product_name;
?>
<!--HTML boiler plate-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop-shop category</title>
  
    <!--bootstrap link-->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <!--font awesome-->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <!--bootstrap js-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
  <!-- STYLE FOR ROWS AND COLUMNS-->
  <style media="screen">
            .figure {display: table;margin-right: auto;margin-left: auto;}
            .figure-caption {display: table-caption;caption-side: bottom;text-align: center;}
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="../index.php" class="navbar-brand">ShopShop</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="../index.php" class="nav-item nav-link">Home</a>
            <a href="../about.php" class="nav-item nav-link">About</a>
            <a href="#" class="nav-item nav-link active">Products</a>
        </div>
         <div class="navbar-nav ml-auto">
            <!--<a href="register/register.php" class="nav-item nav-link">Register</a>
            <a href="login/login.php" class="nav-item nav-link">Login</a>&nbsp;&nbsp;-->
            <?php if(isset($_SESSION['user_name'])) {
                    echo '<a href="../profile.php" class="nav-item nav-link active"><i class="fa fa-user-o">  '.$_SESSION['user_name'].'</i></a>';
                    echo '<a href="../login/logout.php" class="nav-item nav-link">Logout</a>';
                }
                else{
                    echo '<a href="../register/register.php" class="nav-item nav-link">Register</a>
                            <a href="../login/login.php" class="nav-item nav-link">Login</a>&nbsp;&nbsp;';
                }
            ?>
        </div>
        <!--<form class="form-inline">
            <input type="text" class="form-control mr-sm-2" placeholder="Search" aria-label="search">
            <button type="submit" class="btn btn-light my-sm-0">Search</button>
        </form>-->
    </div>
</nav>
  
  
  <!--Search bar-->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <form>
      <div class="text-center">
            <input type="text" class="form-control mr-sm-2" placeholder="Search"><br>
            <button type="submit" class="btn btn-outline-dark my-sm-0">Search</button>
      </div>
    </form>
  </div>
</div>
  
  
  <?php
  
    $con = getCon();
    $res= $con->query("select * from products where product_id='$product_id' and product_name='$product_name'");
  
    $product = array();
    while($ele = $res->fetch_assoc())
      $product[]=$ele;
      
  
    $prod_description=array();
    $prod_seller=array();
   
  
    foreach($product as $p)
    {
       $prod_description=$p['description'];
        $prod_seller=$p['seller'];
    }
   print_r($prod_description);
    print_r($prod_seller);
    echo "<br>";
   print_r($product);
    
  
  ?>
<div class="jumbotron">
  <div class="text-center">
    <?=$product_id."<br>".$product_name."<br>".$product['description']."<br>".$product['seller'];?>
  </div>
  </div
 
  
  
  
  
  
  
  
  
  
  
  
  
  
  </body>
</html>
