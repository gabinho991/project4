<?php include('abstract-views/header.php'); ?>
     <main>
     <p><a href="https://web.njit.edu/~gnn3/project4" >home</a></p>
     <br>
     <br>
     <br>
     <h1> Sign Up </h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="signup">

      
            <label>First Name</label>
            <input type="text" name="fname" >
      
            <br>
       
            <label>Last Name</label>
            <input type="text" name="lname" >
      
            <br>
            <label>Birthday</label>
            <input type="date" name="birthday" >
      
            <br>
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