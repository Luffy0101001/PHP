<?php
    include "dbConnection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update</title>
    <style>
      .secssesfuly{
        color: green;
        padding: 12px;
        margin-bottom: 35px;
        text-align: center;
      
      }
      .error{
      color: red;
      padding: 12px;
      margin-bottom: 35px;
      text-align: center;
      }
  </style>
</head>
<body>
      <div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow w-100" style="max-width: 400px;">
      <div class="card-header bg-primary text-white text-center">
        <h4 class="mb-0">Delet Student</h4>
      </div>
      <div class="card-body">
        <form action="delete.php" method="post">
        <input type="hidden" name="student_id" value="<?= isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '' ?>">
          <div class="d-flex justify-content-between">
            <input type="submit" name="delete" value="delete" class="btn btn-danger">
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
    if(isset($_POST["delete"])){
        try{
            $stmt = $pdo->prepare("DELETE FROM students WHERE id = :student_id");
            $deleting = $stmt->execute([
                ':student_id' => $_POST["student_id"]
            ]);
            if($deleting){
                header("Location:index.php");
            }else{
                echo"failed to delet";
            }
        }catch(PDOException $e){
            echo "error :".$e->getMessage();
        }
    }

?>