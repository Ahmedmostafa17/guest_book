<?php
session_start();


require('../includes/generalFunction.php');

if(checkLogin())
{
    include('../includes/header.php');
require('../includes/config.php');

require('../includes/products.class.php');
$errors = '';
$succes= '';
    if(isset($_POST['submit']))
    {
        $productObject  =new products();

        $productTitle = $_POST['title'];
        $productDesc= $_POST['desc'];
        $productPrice = $_POST['price'];
        $productAvailable =$_POST['availability'];
        $userid =$_SESSION['user']['id'];

        //image
        $image = ' ';
        if(isset($_FILES['image']))
    {
          //information 
          $name =$_FILES['image']['name'];
          $type =$_FILES['image']['type'];
          $temp =$_FILES['image']['tmp_name'];
          $size =$_FILES['image']['size'];
          $error =$_FILES['image']['error'];

          if($type == 'image/png' || $type == 'image/jpg' || $type== 'image/jpeg' && $error == 0 )
          {
              //rename to image 
               $image =md5($name.date('U').rand(1000,100000)).$name;
              
              // move to file
             if(! move_uploaded_file($temp,'../uploads/'.$image) )
             $image = '';
          }
       




    }

        $productData = $productObject->addProducts($productTitle,$productDesc,$image,$productPrice,$productAvailable,$userid);
        if( $productData )

        {
            $succes = 'Product Added';
        }
        else
        {
            $error = "invalid data";
        }
    }

    
include('../templets/admin/add-product.html'); 

include('../includes/footer.php');

}
else
{
    header('location:login.php');
}






?>