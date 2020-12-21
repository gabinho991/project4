

<?php
    class questionsDB{

    
    public static function createq($qname,$qbody,$qskills,$id)
    {
        $db = Database::getDB();
    $sql = "INSERT INTO questions ( title, body, skills, ownerid) VALUES ( :qname, :qbody, :qskills, :id)";
    
    $statement=$db->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':qname', $qname);
    $statement->bindValue(':qbody', $qbody);
    $statement->bindValue(':qskills', $qskills);
    $statement->execute();
    $statement->closeCursor();
    
    }
    
    public static function get1q($id){
        $db = Database::getDB();
        $sql = "SELECT `title`,`body`,`skills`,`ownerid`,`id` FROM `questions` WHERE `ownerid` = :id";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_NUM);
    $statement->closeCursor();
    return $rows;
    }
    public static function view1q($id){
        $db = Database::getDB();
        $sql = "SELECT `title`,`body`,`skills`,`ownerid`,`id` FROM `questions` WHERE `id` = :id";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_NUM);
    $statement->closeCursor();
    return $rows;
    }
    public static function getallq(){
        $db = Database::getDB();

        $sql = "SELECT `title`,`body`,`skills`,`ownerid`,`id` FROM `questions` ";
        $statement = $db->prepare($sql);
        $statement->execute();
        $questions = $statement->fetchAll(PDO::FETCH_NUM);
        $statement->closeCursor();
    return $questions;
    }
    
    public static function deleteq($id) {
        $db = Database::getDB();
    $sql = "DELETE FROM `questions` WHERE `id` = :id";
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
    }  


    public static function updateq($id,$qname,$qbody,$qskills) {
        $db = Database::getDB();
    $sql = "UPDATE  `questions` SET  `title`=:qname, `body`= :qbody, `skills`=:qskills WHERE   `id`=:id ";
    
    $statement=$db->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':qname', $qname);
    $statement->bindValue(':qbody', $qbody);
    $statement->bindValue(':qskills', $qskills);
    $statement->execute();
    $statement->closeCursor();
    
   }  

   public static function createa($ownerid,$uid,$answer)
    {
    $db = Database::getDB();
    $sql = "INSERT INTO answers (ownerid, uid,answer) VALUES (:ownerid, :uid,:answer)";
      
      $new=$db->prepare($sql);
      $new->bindValue(':ownerid', $ownerid);
      $new->bindValue(':uid', $uid);
      $new->bindValue(':answer', $answer);
       $new->execute();
    
    }


    public static function viewa($id){
        $db = Database::getDB();
        //$sql = "SELECT `answer`,`score`,`id` FROM `answers` WHERE `ownerid` = :id";
        $sql = "SELECT `answer`,`score`,`id` FROM `answers` WHERE `ownerid` = :id ORDER BY `score` DESC";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_NUM);
    $statement->closeCursor();
    return $rows;
}
    

public static function score($id){
    $db = Database::getDB();
    $sql = "SELECT `score` FROM `answers` WHERE `id` = :id";
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_NUM);
$statement->closeCursor();
return $rows;
}

public static function nscore($nscore,$id) {
    $db = Database::getDB();
$sql = "UPDATE  `answers` SET  `score`=:nscore WHERE `id`=:id ";

$statement=$db->prepare($sql);
$statement->bindValue(':id', $id);
$statement->bindValue(':nscore', $nscore);

$statement->execute();
$statement->closeCursor();

}  


}
    
    ?>
    