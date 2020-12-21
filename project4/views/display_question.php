
<?php include('abstract-views/header.php'); ?>

<div class="navbar">
<a href=".?action=display_question_form&id=<?php echo $uid; ?>">Add Question</a>
  <div class="dropdown">
    <button class="dropbtn">Display
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href=".?action=display1&id=<?php echo $uid; ?>">My Questions</a>
    <a href=".?action=displayall&id=<?php echo $uid; ?>">All Questions</a>
    
    </div>
  </div> 
</div>

<table>
    <tr>
        <th>Name</th>
        <th>Body</th>
        <th>skills</th>
        <th>answer(s)</th>
        <th>Score</th>
        <th>Vote</th>
    </tr>
    <?php foreach ($yy as $y) : ?>
        <tr> <?php foreach ($xx as $x) : ?>
            <td><?php echo $x[0]; ?></td>
            <td><?php echo $x[1]; ?></td>
            <td><?php echo $x[2]; ?></td>
            <td><?php echo $y[0]; ?></td>
            <?php endforeach; ?></td>
            <td><?php echo $y[1]; ?></td>
            <td>
            
            <form action="." method="post">
                
                <input type="hidden" name="action" value="upvote">
                <input type="hidden" name="id" value="<?php echo $x[4]; ?>">
                <input type="hidden" name="uid" value="<?php echo $x[3]; ?>">
                <input type="hidden" name="qid" value="<?php echo $y[2]; ?>">
                <input type="submit" value="upvote">
            </form>
            <form action="." method="post">
                
                    <input type="hidden" name="action" value="downvote">
                    
                    <input type="hidden" name="id" value="<?php echo $x[4]; ?>">
                    <input type="hidden" name="uid" value="<?php echo $x[3]; ?>">
                    <input type="hidden" name="qid" value="<?php echo $y[2]; ?>">
                    <input type="submit" value="downvote">
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