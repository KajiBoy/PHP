<?php
require'config.php';
if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
$duplicate=mysqli_query($conn,"SELECT * FROM user WHERE username='$username' OR email='$email'");
if (mysqli_num_rows($duplicate) > 0) {
    echo"<script>alert('Username or Email Has Already Taken');</script>";
}else {
    if ($password==$cpassword) {
    $query="INSERT INTO user VALUES(null,'$name','$username','$email','$password')";
  mysqli_query($conn,$query);
        echo"<script>alert('Registration Successful!');</script>";
    }else {
        echo"<script>alert('Password Does Not Match');</script>";
    }
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
        <label for="">Name</label><br>
        <input type="text" name="name" id=""><br>
        <label for="">Username</label><br>
        <input type="text" name="username" id=""><br>
        <label for="">Email</label><br>
        <input type="email" name="email" id=""><br>
        <label for="">password</label><br>
        <input type="password" name="password" id=""><br>
        <label for="">Confirm Password</label><br>
        <input type="password" name="cpassword" id=""><br><br>
        <button type="submit" name="submit">Registration here</button>
    </form>
</body>
</html>