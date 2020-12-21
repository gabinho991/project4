<?php include('abstract-views/header.php'); ?>


<?php $id = $_GET['id'];?>
<form action="index.php" method="post">


    <input type="hidden" name="action" value="nquestion">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
            
            <label>Question Name</label>
            <input type="text" name="title" >
      
            <br>
       
            <label>Question Body</label>
            <input type="text" name="body" >
            
      
            <br>
            <label>Question Skills</label>
            <input type="hidden" name="skills" >
            <textarea name="skills"  cols="40"></textarea>
            <br>
        
            <br>
            <label>&nbsp;</label>
       
          <input type="submit" value="Submit" >
       <br>
    </form>

<?php include('abstract-views/footer.php'); ?>