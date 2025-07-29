<?php
  include "dbConnection.php";

  $stm = $pdo->query("SELECT * FROM students");
  // PDO::FETCH_ASSOC arakd itrara array gis key value 
  $students = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>HOME PAGE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container my-5">
    <div class="text-center mb-4">
      <h1 class="text-primary">CRUD APP IN PHP</h1>
    </div>
    <div class="text-end mb-3">
      <a href="insert.php" class="btn btn-success">+ Add Student</a>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Age</th>
            <th scope="col">Update</th>
            <th scope="col">Delet</th>
          </tr>
        </thead>
        <tbody>
          <!-- darori atrzmt php t9ntst dah h la fin  -->
        <?php foreach($students as $student):?>
          <tr>
            <td><?=$student['id']?></td>
            <td><?=$student['firstName']?></td>
            <td><?=$student['lastName']?></td>
            <td><?=$student['age']?></td>
            <td><a href="update.php?id=<?=$student['id']?>" class="btn btn-info">Update</a></td>
            <td><a href="delete.php?id=<?=$student['id']?>" onclick="return confermation('delet?')" class="btn btn-danger">Delet</a></td>
          </tr>
          <!-- hati ghilih t9n adokan t9adat t9ntst ghid gan bimatabat {} -->
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>