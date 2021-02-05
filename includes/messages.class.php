<?php

class messages
{

    private $conn;
    public function __construct()
    {
        $this->conn = new mysqli('localhost','root','','guest_book');
        
    }


    public function addMessage($title,$content,$name,$email){
     $this->conn->query("INSERT INTO messages (title,content,`name`,`email`) VALUES ('$title','$content','$name','$email') ");
            if($this->conn->affected_rows > 0)
            
                return true;
            
                return false;

            

    }
    
    public function updateMessages($id,$title,$content,$name,$email){

        $sql = "UPDATE users SET ";

        if(strlen($title) > 0)
        {
            $sql .= " title = '$title' ,";

        }
        
        if(strlen($content) > 0)
        {
            $sql .= " content= '$content' , "; 

        }

        if(strlen($name) > 0)
        {
            $sql .= " name= '$name' "; 

        }
        if(strlen($email) > 0)
        {
            $sql .= " email= '$email' "; 

        }
        
        
        
        
        
            $sql .= " WHERE `id` = '$id'";

        $this->conn->query($sql);


        if($this->conn->affected_rows > 0)
        
            return true;
        
            return false;
    
        

    }
    
    public function deleteMessage($id){
       $this->conn->query("DELETE FROM messages WHERE id = '$id'");
        
        if($this->conn->affected_rows > 0)
        return true;
        return false;

        
    }
    
    public function getMessages($extra= ''){
        $result= $this->conn->query("SELECT * FROM messages $extra");
        if($result->num_rows > 0)
        {
            $messages =array();
            while($row = $result->fetch_assoc())
            {
                $messages[]= $row;
            }
            return $messages;
        }
        return null;
        
    }
    public function getMessage($id){
       $messages = $this->getMessages("where id ='$id'");
       if($messages && count($messages) > 0)
       {
           return $messages[0];
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