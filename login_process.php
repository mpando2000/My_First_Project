<?php

ECHO "USHAMBA ";
$conn=mysqli_connect('localhost','root','','jobdb');
if($conn){
   echo "unable to connect".mysql_errno();
    
}else{
    echo "database does not connected ";
}

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM users WHERE users.email='$email' AND users.password='$password' ";
    //global $conn;
    print_r($conn);
    $result=mysqli_query($conn,$sql);

    if($result->num_rows === 1){
        header("Location:./Admin/index.php");
    }else{
        echo "wrong username or password ";
    }
}


// echo "Hello";
// print_r($_POST);

?>