<?php  
require('../model/database.php');
require('../model/accounts_db.php');
require('../model/questions_db.php');


session_start();

$action = filter_input(INPUT_POST, 'action');


if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'login';
    }
}


if ($action=='login'){
    
include('login.php');
}

elseif ($action=='validate_login')
{ 

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$id=accountsDB::validate_login($email, $password);
if (strlen($password)<8)
{  $error = 'Password should be 8 chararcter or more ';
    include('../errors/error.php');    }

elseif ($id!=false) {
    $_SESSION['id'] = $id;
    header("Location: .?id=$id&action=display_questions");
}
else { $error = 'wrong log in infos try again or go back and sign up ';
    include('../errors/error.php');      }
    
        
}       
else if ($action=='register'){
    include('signup.php');

}


else if ($action=='signup'){
    
    
    
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $lname=filter_input(INPUT_POST,'lname');
    $fname=filter_input(INPUT_POST,'fname');
    $birthday=filter_input(INPUT_POST,'birthday');
    if ($password==NULL||$lname==NULL ||$fname==NULL ||$birthday==NULL)
    {  $error = 'All fields are required';
        include('../errors/error.php');    }
    elseif (strlen($password)<8)
        {  $error = 'Password should be 8 chararcter or more ';
            include('../errors/error.php');    }
        
else{
    accountsDB::create($email, $fname, $lname, $birthday,$password);
    header('Location: .?action=login');
}
    

 
 } 
else if($action== 'logout'){
    session_destroy();
    header('Location: .?action=login');

}

 else if(isset($_SESSION['id'])){

 if ($action== 'display_question_form')
 {   
     $id = $_GET['id'];
    
    include('question_form.php');
 }

else if ($action=='nquestion') {


    //$answer=filter_input(INPUT_POST, 'answer');
    $title = filter_input(INPUT_POST, 'title');
    $body = filter_input(INPUT_POST, 'body');
    $skills = filter_input(INPUT_POST, 'skills');
    $id = filter_input(INPUT_POST, 'id');
    
    
    $array = explode(',', $skills); 
    
    if ($title==NULL||$body==NULL ||$skills==NULL )
    {  $error = 'All fields are required';
        include('../errors/error.php');    }
    elseif (strlen($body)>500)
        {  $error = 'Question Body should be less than 500 characters ';
            include('../errors/error.php');    }
    
    
    elseif(count($array)<2)
    {               

        $error ='Enter at least two skills';
        include('../errors/error.php');  
    }

    else{ 
        questionsDB::createq ($title, $body, $skills, $id) ;

        header("Location: .?action=display_questions&id=$id");
    
        
    }

    
    
}

else if ($action=='display_questions')
{

   
   

$id = filter_input(INPUT_POST, 'id');


include('display_questions.php');



}
else if ($action=='displayall')
{
    $id = $_GET['id'];
    
     
    $xx=questionsDB::getallq();
    

    include('display_questions.php');
    

}
else if ($action=='display1')
{
    
     
    $id = $_GET['id'];
    
    
    $xx=questionsDB::get1q($id);
    
    include('display_questions.php');
    
   
}

else if ($action=='delete_question')

{    

     $id = filter_input(INPUT_POST, 'id');
     $uid = filter_input(INPUT_POST, 'uid');
     
     questionsDB::deleteq($id);
     
     
    
    header("Location: .?action=displayall&id=$uid");
    


}
else if ($action=='update'){
    
    $title = filter_input(INPUT_POST, 'qname');
    $body = filter_input(INPUT_POST, 'qbody');
    $skills = filter_input(INPUT_POST, 'qskills');
    $id = filter_input(INPUT_POST, 'id');
    $uid = filter_input(INPUT_POST, 'uid');
    


    
     include ('question_form2.php');
     //header("Location: .?action=display&uid=$uid&id=$id");
     
    
}

else if ($action=='new')
{
     
    
    $id = filter_input(INPUT_POST, 'id');
    $uid = filter_input(INPUT_POST, 'uid');
    $title= filter_input(INPUT_POST, 'title');
    $body = filter_input(INPUT_POST, 'body');
    $skills = filter_input(INPUT_POST, 'skills');
    
      
    questionsDB::updateq($uid,$title,$body,$skills);
    
    
    header("Location: .?action=display_questions&id=$id");
    
}
else if ($action=='view_question')

{    

    
    $id = filter_input(INPUT_POST, 'id');
    $uid = filter_input(INPUT_POST, 'uid');
    if ($id==NULL || $uid==NULL)
    {
        $id = $_GET['id'];
        $uid = $_GET['uid'];

    }
    $xx=questionsDB::view1q($id);
    $yy=questionsDB::viewa($id);
    
    
    include('display_question.php');


}
else if ($action=='answer'){

    $title = filter_input(INPUT_POST, 'qname');
    $body = filter_input(INPUT_POST, 'qbody');
    $skills = filter_input(INPUT_POST, 'qskills');
    $id = filter_input(INPUT_POST, 'id');
    $uid = filter_input(INPUT_POST, 'uid');
    include ('question_form3.php');
    


}

else if ($action=='sanswer'){

     $answer=filter_input(INPUT_POST, 'answer');
    $title = filter_input(INPUT_POST, 'qname');
    $body = filter_input(INPUT_POST, 'qbody');
    $skills = filter_input(INPUT_POST, 'qskills');
    $id = filter_input(INPUT_POST, 'id');
    $uid = filter_input(INPUT_POST, 'uid');
    questionsDB::createa($uid,$id,$answer);
    
    
    header("Location: .?action=display_questions&id=$id");
}


 



 else if ($action=='upvote'){
   
    
    $id = filter_input(INPUT_POST, 'id');
    $uid = filter_input(INPUT_POST, 'uid');
    $qid = filter_input(INPUT_POST, 'qid');
    $zz=questionsDB::score($qid);
    foreach ($zz as $z)
    {$nz=$z[0];}
   
   
    
    $nz=$nz+1;

    questionsDB::nscore($nz,$qid);

    header("Location: .?action=view_question&id=$id&uid=$uid");

 }
 else if ($action=='downvote'){

    $id = filter_input(INPUT_POST, 'id');
    $uid = filter_input(INPUT_POST, 'uid');
    $qid = filter_input(INPUT_POST, 'qid');
    $zz=questionsDB::score($qid);
    foreach ($zz as $z)
    {$nz=$z[0];}
    
    
    $nz=$nz-1;

    questionsDB::nscore($nz,$qid);

    header("Location: .?action=view_question&id=$id&uid=$uid");
 }

 }

 else {
     $error = 'You are not logged in Please go back and log in  ';
            include('../errors/error.php');  
            //header("Location: ../project4"); 
        }
?>
