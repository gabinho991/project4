<?php include('abstract-views/header.php'); ?>
     <main>
     <p><a href="https://web.njit.edu/~gnn3/project4" >home</a></p>
     <br>
     <br>
     <br>
     <h1> Log In </h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="validate_login">

      
            <label>Email Address</label>
            <input type="email" name="email" >
      
            <br>
       
            <label>Password</label>
            <input type="password" name="password" >
      
            <br>
            <label>&nbsp;</label>
       <input type="submit" value="Submit" >
       <br>
    </form>
</main>
<?php include('abstract-views/footer.php'); ?>