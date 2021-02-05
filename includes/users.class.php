<?php

class users
{

    private $conn;
    public function __construct()
    {
        $this->conn = new mysqli('localhost','root','','guest_book');
        
    }


    public function addUser($username,$email,$password){
     $this->conn->query("INSERT INTO users (username,email,`password`) VALUES ('$username','$email','$password') ");
            if($this->conn->affected_rows > 0)
            
                return true;
            
                return false;

            

    }
    
    public function updateUser($id,$username,$email,$password){

        $sql = "UPDATE users SET ";

        if(strlen($username) > 0)
        {
            $sql .= " username = '$username' ,";

        }
        
        if(strlen($email) > 0)
        {
            $sql .= " email= '$email' , "; 

        }

        if(strlen($password) > 0)
        {
            $sql .= " password= '$password' "; 

        }
        
        
        
            $sql .= " WHERE `id` = '$id'";

        $this->conn->query($sql);


        if($this->conn->affected_rows > 0)
        
            return true;
        
            return false;
    
        

    }
    
    public function deleteUser($id){
       $this->conn->query("DELETE FROM users WHERE id = '$id'");
        
        if($this->conn->affected_rows > 0)
        return true;
        return false;

        
    }
    
    public function getusers($extra= ''){
        $result= $this->conn->query("SELECT * FROM users $extra");
        if($result->num_rows > 0)
        {
            $users =array();
            while($row = $result->fetch_assoc())
            {
                $users[]= $row;
            }
            return $users;
        }
        return null;
        
    }
    public function getuser($id){
       $users = $this->getusers("where id ='$id'");
       if($users && count($users) > 0)
       {
           return $users[0];
       }
       else
       {
           return null;
       }
                
    }
  public function login($username,$password)
  {
        $users = $this->getusers("WHERE username='$username' AND password='$password'");

        if($users && count($users) > 0)
        {
            return $users[0];
        }
        else
        {
            return null;
        }
                
}
/**close connection */

public function __destruct()
{
    $this->conn->close();
}
}


?>