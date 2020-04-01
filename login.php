<form action="login.php">
    <div> 
        Username :<input name="login"/> </br>
        password: <input name="password"/> </br>
        <input type="submit" name="submit" value="Submit" /> 
    </div>
</form>
<?php
    if (isset($_GET["submit"])) {
        $login = $_GET["login"]  ;
        $password = $_GET["password"] ;
        if(!preg_match("/^cbu\d+\./", $login)&&!preg_match("/.{3,}/", $password)){ ?>
        <h1> <?php echo("error between login password combination") ?> </h1>
        <?php }
    elseif (preg_match("/^cbu\d+\./", $login)&&preg_match("/.{3,}/", $password)){
        header("Location:first.html");

    } 
} ?>
