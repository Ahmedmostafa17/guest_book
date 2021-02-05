<?php
session_start();
require('../includes/generalFunction.php');

if(checkLogin())
{
    require('../includes/config.php');
    require('../includes/products.class.php');
    $idUrl =(isset($_GET['id'])) ? (int)$_GET['id'] :0;

    $errors = '';
    $sucess= '';
    

    $productObject =new products();
    $product =$productObject->getProduct($idUrl);
    include('../includes/header.php');

 


    if(count($_POST) > 0)
    {

        $productTitle = $_POST['title'];
        $productDesc= $_POST['desc'];
        $productPrice = $_POST['price'];
        $productAvailable =$_POST['availability'];
        $oldImage =$_POST['image-name'];

        $idForm = $_POST['id'];
   

        //image
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
               $NewImage =md5($name.date('U').rand(1000,100000)).$name;
              
              // move to file
             if( move_uploaded_file($temp,'../uploads/'.$NewImage) )
             {
                if(file_exists('../uploads/'.$oldImage))
                {
                    unlink('../uploads/'.$oldImage);

                    $oldImage =  $NewImage;
                }
                  
              

             }
             
          }
       
        }
      $productResult =$productObject->updateProducts($idForm,$productTitle,$productDesc,$oldImage,$productPrice,$productAvailable);
        if($productResult )

        {
            $sucess = 'Product Update';

        }
        else
        {
            $errors = "NO update Done";

        }
        include('../templets/admin/resultMessage.html'); 

    }
    else
    {
        include('../templets/admin/update-product.html'); 


    }
    include('../includes/footer.php');

    
    // $errors = 'Product Not found';
    // include('../templets/admin/resultMessage.html'); 

    // include('../includes/footer.php');
    // exit();


}


  

    

else
{
header('location:login.php');
}

?>