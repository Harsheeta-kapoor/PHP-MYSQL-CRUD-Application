<?php
include 'dbcon.php';
if (isset($_POST['add_students'])){
    
    //we will create 4 variables to exract the actual value entered in the form 
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    //now we will validate to chk if the var is empty or not 
    if($fname == "" || empty($fname)){
        header('location:index.php?message=You need to fill in the first name');

    }
    else{
       
        $query = "INSERT INTO `student` (`first_name`, `last_name`, `age`) VALUES ('$fname', '$lname', '$age')";

        $result = mysqli_query($connection, $query);
        
        // mysqli_query() is inbuilt function that is used to execute the query entered in it as a parameter 

        if(!$result){
            die("Query failed".mysqli_error($connection));
        }
        else{
            header('location:index.php?insert_msg= Your data has been added successfully !');
        }
    }
}

?>