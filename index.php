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
    <div class="box1">
    <h2> ALL STUDENTS </h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" > ADD STUDENTS </button>
    </div>
    <table class = "table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name </th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "select * from `student`";

                $result = mysqli_query($connection, $query);

                if(!$result){
                    die("query failed".mysqli_error());
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
                      ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><a href="update_page.php?id=<?php echo $row['id']; ?>" class = "btn btn-success">Update</a></td>
                    <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class = "btn btn-danger">Delete</a></td>
                </tr>           
                      <?php  
                    }
                }
            ?>
            
        </tbody>
    </table>
    <?php
      if (isset($_GET['message'])){
        echo "<h6>".$_GET['message']."</h6>";
      }
    ?>

<?php
      if (isset($_GET['insert_msg'])){
        echo "<h7>".$_GET['insert_msg']."</h7>";
      }
    ?>

<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div class="form-group">
                <label for ="f_name">FIRST NAME</label><br>
                <input type="text" name= "f_name" class="form_control">
            </div>
            <div class="form-group">
                <label for ="l_name">LAST NAME</label><br>
                <input type="text" name= "l_name" class="form_control">
            </div>
            <div class="form-group">
                <label for ="age">AGE</label><br>
                <input type="text" name= "age" class="form_control">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD" >
      </div>
    </div>
  </div>
</div>
</form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
</body>
</html>


    