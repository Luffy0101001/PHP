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
        <h4 class="mb-0">Update Student</h4>
      </div>
      <div class="card-body">
        <form action="update.php" method="post">

          <input type="hidden" name="student_id" value="<?= isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '' ?>">
          
          <div class="mb-3">
            <label for="f_name" class="form-label">New First Name</label>
            <input type="text" name="New_fname" class="form-control" required placeholder="Enter New First Name">
          </div>
          <div class="mb-3">
            <label for="l_name" class="form-label">New Last Name</label>
            <input type="text" name="New_lname" class="form-control" required placeholder="Enter New last name">
          </div>
          <div class="mb-3">
            <label for="age" class="form-label">New Age</label>
            <input type="number" name="Newage" class="form-control" required placeholder="Enter New age">
          </div>
          <div class="d-flex justify-content-between">
            <input type="submit" name="uppdate" value="uppdate" class="btn btn-success">
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
if (isset($_POST['uppdate'])) {
    $newfname = htmlspecialchars($_POST['New_fname']);
    $newlname = htmlspecialchars($_POST['New_lname']);
    $newage   = htmlspecialchars($_POST['Newage']);

    if (!empty($newfname) && !empty($newlname) && !empty($newage)) {
        try {
            $stmt = $pdo->prepare("UPDATE students 
                                   SET firstName = :newfname,
                                       lastName = :newlname,
                                       age = :newage
                                   WHERE id = :id");

            $executed = $stmt->execute([
                ':newfname' => $newfname,
                ':newlname' => $newlname,
                ':newage'   => $newage,
                ':id'       => $_POST['student_id']
            ]);

            if ($executed) {
                echo "<p class='secssesfuly'>Updated successfully</p>";

                header("Location: index.php");
                exit();
            } else {
                echo "<p class='error'>Failed to update!</p>";
            }

        } catch (PDOException $e) {
            echo "<p class='error'>Error type: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p class='error'>Please fill in all fields.</p>";
    }
}
?>

<?php 
