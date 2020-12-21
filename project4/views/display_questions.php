
<?php include('abstract-views/header.php'); ?>
<?php $id = $_GET['id'];?>


<div class="navbar">
<a href=".?action=display_question_form&id=<?php echo $id; ?>">Add Question</a>
  <div class="dropdown">
    <button class="dropbtn">Display
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href=".?action=display1&id=<?php echo $id; ?>">My Questions</a>
    <a href=".?action=displayall&id=<?php echo $id; ?>">All Questions</a>
    
    </div>
  </div> 
</div>

<table>
    <tr>
        <th>Name</th>
        <th>Body</th>
        <th>skills</th>
        <th>buttons</th>
    </tr>
    <?php foreach ($xx as $x) : ?>
        <tr>
            <td><?php echo $x[0]; ?></td>
            <td><?php echo $x[1]; ?></td>
            <td><?php echo $x[2]; ?></td>
            <td>



               
            <form action="." method="post">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="qname" value="<?php echo $x[0]; ?>">
                <input type="hidden" name="qbody" value="<?php echo $x[1]; ?>">
                <input type="hidden" name="qskills" value="<?php echo $x[2]; ?>">
                <input type="hidden" name="id" value="<?php echo $x[3]; ?>">
                <input type="hidden" name="uid" value="<?php echo $x[4]; ?>">
                <input type="submit" value="edit">

                    </form>
                <form action="." method="post">
                
                    <input type="hidden" name="action" value="delete_question">
                    <input type="hidden" name="id" value="<?php echo $x[4]; ?>">
                    <input type="hidden" name="uid" value="<?php echo $x[3]; ?>">
                    <input type="submit" value="delete">
                </form>
                <form action="." method="post">
                <input type="hidden" name="action" value="answer">
                <input type="hidden" name="qname" value="<?php echo $x[0]; ?>">
                <input type="hidden" name="qbody" value="<?php echo $x[1]; ?>">
                <input type="hidden" name="qskills" value="<?php echo $x[2]; ?>">
                <input type="hidden" name="id" value="<?php echo $x[3]; ?>">
                <input type="hidden" name="uid" value="<?php echo $x[4]; ?>">
                <input type="submit" value="answer">

                    </form>
                <form action="." method="post">
                
                    <input type="hidden" name="action" value="view_question">
                    <input type="hidden" name="id" value="<?php echo $x[4]; ?>">
                    <input type="hidden" name="uid" value="<?php echo $x[3]; ?>">
                    
                    <input type="submit" value="view">
                </form>
                
                
                
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<form action="." method="post">
                
                    <input type="hidden" name="action" value="logout">
                    <input type="submit" value="Log out">
                </form>

<?php include('abstract-views/footer.php'); ?>