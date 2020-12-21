
<?php include('abstract-views/header.php'); ?>
<?php $id = $_GET['id'];?>
<
</div>


<table>
    <tr>
        <th>Name</th>
        <th>Body</th>
        <th>skills</th>
        <th>answer</th>
    </tr>
    



               
            <form action="." method="post">
                <input type="hidden" name="action" value="upvote">
                <input type="hidden" name="qname" value="<?php echo $x[0]; ?>">
                <input type="hidden" name="qbody" value="<?php echo $x[1]; ?>">
                <input type="hidden" name="qskills" value="<?php echo $x[2]; ?>">
                <input type="hidden" name="id" value="<?php echo $x[3]; ?>">
                <input type="hidden" name="uid" value="<?php echo $x[4]; ?>">
                <input type="submit" value="upvote">

                    </form>
                <form action="." method="post">
                
                    <input type="hidden" name="action" value="downvote">
                    <input type="hidden" name="qname" value="<?php echo $x[0]; ?>">
                    <input type="hidden" name="id" value="<?php echo $x[3]; ?>">
                    <input type="hidden" name="uid" value="<?php echo $id; ?>">
                    <input type="submit" value="downvote">
                </form>
                
                
         
            </td>
        </tr>
 
</table>
<form action="." method="post">
                
         <input type="hidden" name="action" value="logout">
            <input type="submit" value="Log out">
         </form>

<?php include('abstract-views/footer.php'); ?>