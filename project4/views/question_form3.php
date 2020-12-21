<?php include('abstract-views/header.php'); ?>



<form action="index.php" method="post">

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
    <input type="hidden" name="action" value="sanswer">
    
      
            <label>Question Name: </label> <?php echo $title; ?>
            <input type="hidden" name="title" >
      
            <br>
       
            <label>Question Body: </label> <?php echo $body; ?>
            <input type="hidden" name="body" >
            
      
            <br>
            <label>Question Skills: </label> <?php echo $skills; ?>
            <input type="hidden" name="skills" >
            
            <br>
            <br>

            <label>Answer</label>
            <input type="text" name="answer" >
            
            
            <label>&nbsp;</label>
       <input type="submit" value="Submit" >
       <br>
    </form>

<?php include('abstract-views/footer.php'); ?>