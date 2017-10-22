<?php include 'database.php';

if (isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $addr_line_1=$_POST['addr_line_1'];
    $addr_line_2=$_POST['addr_line_2'];
    $addr_city=$_POST['addr_city'];
    $contact=$_POST['contact'];

    //set form values into the user table data fields
    $sql ="INSERT INTO `user`(`email`, `password`, `addr_line_1`, `addr_line_2`, `addr_city`, `contact`) VALUES ([value-1],[value-2],[value-5],[value-6],[value-7],[value-8],[value-11])";

    //if there is error
    $result=myaqli_query($conn,$sql) or die(mysqli_error($conn));
    echo "New record is created successfully!";

    mysqli_close($conn);
}