<?php include 'database.php' ;
//variable to store error message
$error='';

if(isset($_POST['submit'])){
    if(empty($_POST['email']) || empty($_POST['password'])){
        $error="User or password invalid!!";
    }
    else{
        //define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];

        //prevent mysql injection
        $username=stripcslashes($username);
        $password=stripcslashes($password);
        $username=mysqli_real_escape_string($username);
        $password=mysqli_real_escape_string($password);

        //query the database from user
        $sql="SELECT `email`, `password` FROM `user` WHERE `email`=`$email` and `password`=`$password`";

        $result = mysqli_query($conn,$sql);
        $rows=mysqli_num_rows($result);
        if($rows==1){
            echo "Successfully loggedin!";
        }
        else{
            $error="username or password invalid";
        }
        //closing connection
        mysqli_close($conn);
    }
}
?>





