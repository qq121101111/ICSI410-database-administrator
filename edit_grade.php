<html>
<head>
    <meta charset="UTF-8">
    <title>Student Infomations System</title>

</head>
<body>
<center>
    <?php
    include_once "menu.php";
    //connect to database
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=university_student_database;", "root", "root");
    } catch (PDOException $e) {
        die("connect failed" . $e->getMessage());
    }
   
    $pdo->query("SET NAMES 'UTF8'");
    //implement sql and get the value
    $sql = "SELECT * FROM stu_classes WHERE num =" . $_GET['num'];
    $stmt = $pdo->query($sql);//return the value
    if ($stmt->rowCount() > 0) {
        $stu = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        die("Faild");
    }
    ?>
    <form method="post" action="action.php?action=update_grade">

        <input type="hidden" name="num" id="num" value="<?php echo $stu['num']; ?>"/>
        <table>
            <tr>
                <td>Number</td>
                <td><input id="num" name="num" type="text" value="<?php echo $stu['num'] ?>"/></td>

            </tr>
            <tr>
                <td>Grade</td>
                <td><input id="grade" name="grade" type="text" value="<?php echo $stu['grade'] ?>"/></td>

            </tr>
            
            <tr>
                <td> </td>
                <td><input type="submit" value="Submit"/>  
                    <input type="reset" value="Reset"/>
                </td>
            </tr>
        </table>

    </form>


</center>
</body>
</html>