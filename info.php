<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administration Page</title>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <script>
        function doDel(id) {
            if (confirm("Are you sure you want to delete it?")) {
                window.location = 'action.php?action=del&id=' + id;
            }
        }
    </script>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Administration Page.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    <center>
    <?php
    include_once "menu.php";
    ?>
    <h3>Student Information</h3>
    <table width="1300" border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Major</th>
            <th>Email</th>
            <th>Student Password</th>
            <th>Classes</th>
            <th>Options</th>
        </tr>
        <?php
        //connect to database
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=university_student_database;", "root", "root");
        } catch (PDOException $e) {
            die("Connect failed" . $e->getMessage());
        }
       
        $pdo->query("SET NAMES 'UTF8'");
        //implement SQL and get the value
        $sql = "SELECT * FROM student ";
        foreach ($pdo->query($sql) as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['fname']}</td>";
            echo "<td>{$row['lname']}</td>";
            echo "<td>{$row['sex']}</td>";
            echo "<td>{$row['age']}</td>";
            echo "<td>{$row['maj_name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['stu_paw']}</td>";
            echo "<td>
                    <a href='class_info.php?id=({$row['id']})'>Edit</a>
                  </td>";
            echo "<td>
                    <a href='javascript:doDel({$row['id']})'>Delete</a>
                    <a href='edit.php?id=({$row['id']})'>Edit</a>
                  </td>";
            echo "</tr>";
        }

        ?>

    </table>
</center>
</body>
</html>