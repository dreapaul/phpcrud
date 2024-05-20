<?php class database{
    function opencon(){
        return new PDO('mysql:host=localhost; dbname=phpoop_221','root','');
    }
    function check($username, $password){
        $con = $this->opencon();
        $query = "SELECT * from users WHERE user='".$username."'&&pass='".$password."'";
        return $con->query($query)->fetch();
    }
 
    function signup($firstname, $lastname, $birthday, $sex, $username, $password){
        $con = $this->opencon();
 
        $query = $con->prepare("SELECT user FROM users WHERE user = ?");
        $query->execute([$username]);
        $existingUser =  $query->fetch();
 
        if($existingUser){
            return false;
        }
 
        return $con->prepare("INSERT INTO users (firstname, lastname, birthday, sex, user, pass) VALUES (?,?,?,?,?,?)")
                ->execute([$firstname, $lastname, $birthday, $sex, $username, $password]);
    }
 
    function signupUser($firstname, $lastname, $birthday, $sex, $email, $username, $password, $profilePicture)
    {
        $con = $this->opencon();
        // Save user data along with profile picture path to the database
        $con->prepare("INSERT INTO users (user_firstname, user_lastname, user_birthday, user_sex, user_email, user_name, user_pass, user_profile_picture) VALUES (?,?,?,?,?,?,?,?)")->execute([$firstname, $lastname, $birthday, $sex, $email, $username, $password, $profilePicture]);
        return $con->lastInsertId();
        
    }
   
    function insertAddress($user_id, $street, $barangay, $city, $province) {
        $con = $this->opencon();
       
        return $con->prepare("INSERT INTO user_address(user_id, user_street, user_barangay, user_city, user_province) VALUES (?, ?, ?, ?, ?)")->execute(array($user_id, $street, $barangay, $city, $province));
       
    }
   
   
   
}