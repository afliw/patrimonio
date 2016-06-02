<?php
include_once "class/db.php";

class User{
    public $id_user,$username,$password;
    
    public function User($id,$user,$pass){
        $this->id_user=$id;
        $this->username=$user;
        $this->password=$pass;
            
    }
    
    public static function Login($user,$pass){
        $result=DB::Read("select id_user,username,password from user where username='{$user}' and password='{$pass}'");
        if($result){
            return new User($result[0]["id_user"],$result[0]["username"],$result[0]["password"]);
        }else{
            return null;
        } 
    } 
    
}
?>
