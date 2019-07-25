<?php
    include_once "base.php";
    
    if(empty($_SESSION['login'])){
        header("location:index.php");
        exit();
    }

?>
<h2>Login Success!</h2><br>
<hr>
<?php

    $sql = "select name from user where acc='" . $_SESSION['user'] . "'";
    $name = $pdo->query($sql)->fetchColumn();
    echo "Welcome [ ". $name . " ] to Member Page";

?>