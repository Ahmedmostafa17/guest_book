<?php
class products
{

    private $conn;
    public function __construct()
    {
        $this->conn = new mysqli('localhost','root','','guest_book');
        
    }


    public function addProducts($title,$description,$image,$price,$available,$userID)
    {

        $this->conn->query("INSERT INTO products ( title, `description`, `image`, price, available,userID) VALUES ('$title','$description','$image',$price ,$available,$userID) ");
        if($this->conn->affected_rows > 0)
        {
            return true;

        }
        else
        {
            return false;

        }

    }
    public function updateProducts($id,$title,$description ,$image,$price,$available)
    {
        $this->conn->query("UPDATE `products` SET `title`='$title',`description`='$description',`image`='$image',`price`=$price,`available`=$available   WHERE id =$id ");


        if($this->conn->affected_rows > 0)
        
            return true;
        
            return false;
    
    } 
    public function deleteProducts($id)
    {

        $this->conn->query("DELETE FROM products WHERE id = '$id'");
        
        if($this->conn->affected_rows > 0)
        return true;
        return false;

    }

    public function getProducts($extra= '')
    {

        $result= $this->conn->query("SELECT * FROM products $extra");
        if($result->num_rows > 0)
        {
            $products =array();

            while($row = $result->fetch_assoc())
            {
                $products[]= $row;
            }
            return $products;
        }
        return null;
    }
    public function getProduct($id)
    {
        $products = $this->getProducts("where id ='$id'");
       if($products && count($products) > 0)
       {
           return $products[0];
       }
       else
       {
           return null;
       }
    }
    public function searchProduct($keyword)
    {
        return $this->getProducts("where title LIKE '%$keyword%'");
    }


    /**close connection */

public function __destruct()
{
    $this->conn->close();
}

}


?>