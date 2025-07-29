<?php 
  include "dbConnection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Students</title>
  <style>
    .error{
      color: red;
      padding: 12px;
      margin-bottom: 35px;
      text-align: center;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow w-100" style="max-width: 400px;">
      <div class="card-header bg-primary text-white text-center">
        <h4 class="mb-0">Add Student</h4>
      </div>
      <div class="card-body">
        <form action="insert.php" method="post">
          <div class="mb-3">
            <label for="f_name" class="form-label">First Name</label>
            <input type="text" name="f_name" class="form-control" required placeholder="Enter first name">
          </div>
          <div class="mb-3">
            <label for="l_name" class="form-label">Last Name</label>
            <input type="text" name="l_name" class="form-control" required placeholder="Enter last name">
          </div>
          <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" name="age" class="form-control" required placeholder="Enter age">
          </div>
          <div class="d-flex justify-content-between">
            <input type="submit" name="add" value="add" class="btn btn-success">
            <input type="reset" name="cancel" value="cancel" class="btn btn-secondary">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
  if(isset($_POST['add'])){
    if(
      !empty($_POST['f_name']) &&
      !empty($_POST['l_name']) &&
      !empty($_POST['age'])
      ){

        $fName = htmlspecialchars($_POST['f_name']) ;
        $lName = htmlspecialchars($_POST['l_name']);
        $age   = htmlspecialchars($_POST['age']);

        try{
          $stmt = $pdo->prepare("INSERT INTO students (firstName, lastName, age) VALUES (:firstName, :lastName, :age)");
          $stmt->bindParam(':firstName',$fName);
          $stmt->bindParam(':lastName',$lName);
          $stmt->bindParam(':age',$age);

          if ($stmt->execute()){
              header("Location: index.php");
              exit;
          } else {
              echo "<p class='error'>Failed to add!</p>";
          }

        }catch(PDOexception $e){
          echo"<p class='error'> error type:</p>"." ".$e;
        }

       }else{
        echo"<p class='error'> write somme thing first!</p>";
       }
  }
?>
<?php
