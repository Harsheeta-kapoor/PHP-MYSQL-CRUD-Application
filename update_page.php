<?php include('dbcon.php'); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1 id="main_title">CRUD APPLICATION IN PHP</h1>
    <div class="conatiner m-5 ">
<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
   
        // $query = "select * from 'student' where 'id' ='$id'";
        $query = "SELECT * FROM `student` WHERE `id` = '$id'";

                $result = mysqli_query($connection, $query);

                if(!$result){
                    die("query failed" .mysqli_error($connection));
                }
                else{
                    $row = mysqli_fetch_assoc($result);
                    // print_r($row);
                }
            }
                // $row = mysqli_fetch_assoc($result);
                // if ($row !== null) {
                //     $fname = $row['first_name'];
                //     $lname = $row['last_name'];
                //     $age = $row['age'];
                // } else {
                //     // Handle the case where the row is null (no data found)
                //     echo "No data found for ID: $id";
                //     // You might want to redirect or display an error message here
                // }
            
                    
    
?>

    <?php 
        if(isset($_POST['update_students'])){
            $fname = $_POST['f_name'];
            $lname = $_POST['l_name'];
            $age = $_POST['age'];

            $query = "update `student` set `first_name` = '$fname', `last_name` = '$lname',`age` = '$age' where `id` = $id";
        }

        $result = mysqli_query($connection, $query);

                // if(!$result){
                //     die("query failed".mysqli_error());
                // }
                // else{
                //     header('location:index.php?update_msg= You have successfully updated');
                // }           
    ?>




        <form action="ipdate_page.php?"  method="post">
            <div class="form-group">
                <label for ="f_name">FIRST NAME</label><br>
                <input type="text" name="f_name" class="form_control col-12" value="<?php echo $row['first_name']?>">
            </div>
            <div class="form-group">
                <label for ="l_name">LAST NAME</label><br>
                <input type="text" name="l_name" class="form_control col-12" value="<?php echo $row['last_name']?>">
            </div>
            <div class="form-group">
                <label for ="age">AGE</label><br>
                <input type="text" name="age" class="form_control col-12" value="<?php echo $row['age']?>">

            </div><br>
            <input type="submit" class="btn btn-success" name="update_students" value="UPDATE" >
        </form>

 </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
</body>
</html>            