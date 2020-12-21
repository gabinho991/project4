
<?php

class accountsDB{
public static function user($email){
$db = Database::getDB();
$sql = "SELECT `lname`,`fname` FROM `accounts` WHERE `email` = :email";
$statement = $db->prepare($sql);
$statement->bindValue(':email', $email);
$statement->execute();
$user = $statement->fetch();
$statement->closeCursor();
return $user;
 
}
public static function create($email, $fname, $lname, $birthday,$password)
{ 
    $db = Database::getDB();
     $sql = "INSERT INTO accounts (email, fname, lname, birthday, password) VALUES (:email, :fname, :lname, :birthday, :password)";
      
    $new=$db->prepare($sql);
    $new->bindValue(':email', $email);
    $new->bindValue(':fname', $fname);
    $new->bindValue(':lname', $lname);
    $new->bindValue(':birthday', $birthday);
    $new->bindValue(':password', $password);
    $result = $new->execute();
}

public static function validate_login($email, $password)
{
    $db = Database::getDB();

$sql = "SELECT `email`,`password`,`id` FROM `accounts` WHERE `email` = :email";

$statement = $db->prepare($sql);

$statement->bindValue(':email', $email);

$statement->execute();

$rows = $statement->fetchAll(PDO::FETCH_NUM);



foreach($rows as $row){
    if ($email==$row[0] and $password==$row[1] )
   {
    return $row[2];
   }
   else {return false;}
}
}

}
?>


