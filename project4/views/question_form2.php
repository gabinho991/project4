<?php include('abstract-views/header.php'); ?>



<form action="index.php" method="post">


    <input type="hidden" name="action" value="new">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
    
    


         <label>Question Name</label>
            <input type="text" name="title" value="<?php echo $title; ?>">
      
            <br>
       
            <label>Question Body</label>
            <input type="text" name="body" value="<?php echo $body; ?>">
            
      
            <br>
            <label>Question Skills</label>
            <input type="text" name="skills" value="<?php echo $skills; ?>">
            
            <br>
            <br>
        
            <label>&nbsp;</label>
       <input type="submit" value="Submit" >
       <br>
    </form>
    <?php include('abstract-views/footer.php'); ?>
