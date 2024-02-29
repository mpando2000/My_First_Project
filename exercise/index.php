<?php 
$connection = mysqli_connect("localhost","root","","student");
if($connection){
    echo "Database is connecting sucessful";
}else{
    die("failed to connecting to database");
};
/*$name="daud hasani";
echo "hello word,welcome mr $name";
echo "<br> ";

$result=50+50;
echo "  $result ";
echo "<br>";
$number1=78;
$number2=0;
$product=$number1*$number2;
echo "The product of two nymber is ".$product;
echo "<br>";*/
if(isset($_POST["submit"])){
    $First_name =$_POST["fname"];
    $Last_name =$_POST["lname"];
    $Age=$_POST["age"];
    $Gender =$_POST["gender"];
    $Date =$_POST["date"];
    $sql="INSERT INTO users(first_name,last_name,age,gender,date) VALUES('$First_name','$Last_name','$Age','$Gender','$Date')";

    $result = mysqli_query($connection,$sql);
if($result){
    echo " user insert correctly ";
}else{
    die("failed to insert data");
}
/*echo " full name ".$First_name." ".$Last_name;
   // echo " it work";
   
} else{
    echo " failed to work";
}*/
}
?>