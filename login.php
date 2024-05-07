<?php
require'config.php';
if (isset($_POST['submit'])) {
    $usernameemail=$_POST['usernameemail'];
    $password=$_POST['password'];
    $result=mysqli_query($conn,"SELECT *FROM user WHERE username='$usernameemail'
     OR email='$usernameemail'");
    $row=mysqli_fetch_assoc($result);
    
    if (mysqli_num_rows($result)) {
        if ($password == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row['id'];
            header("Location: index.php");
            
        }else {
            echo"<script>alert('Wrong Password');</script>";
        }
    }else {
        echo"<script>alert('User not Registerd');</script>";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Username or Email</label><br>
        <input type="text" name="usernameemail" id=""><br>
        <label for="">password</label><br>
        <input type="password" name="password" id="">
        <br><br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>