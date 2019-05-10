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
    //implement SQL and get the value
    $sql = "SELECT * FROM student WHERE id =" . $_GET['id'];
    $stmt = $pdo->query($sql);//返回预处理对象
    if ($stmt->rowCount() > 0) {
        $stu = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        die("Faild");
    }
    ?>
    <form method="post" action="action.php?action=edit">

        <input type="hidden" name="id" id="id" value="<?php echo $stu['id']; ?>"/>
        <table>
            <tr>
                <td>First Name</td>
                <td><input id="fname" name="fname" type="text" value="<?php echo $stu['fname'] ?>"/></td>

            </tr>
            <tr>
                <td>Last Name</td>
                <td><input id="lname" name="lname" type="text" value="<?php echo $stu['lname'] ?>"/></td>

            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" name="sex" value="M" <?php echo ($stu['sex'] == "M") ? "checked" : "" ?>/> male
                    <input type="radio" name="sex" value="F" <?php echo ($stu['sex'] == "F") ? "checked" : "" ?>/> female
                </td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" id="age" value="<?php echo $stu['age'] ?>"/></td>
            </tr>
            <tr>
                <td>Major</td>
                <td><input id="major" name="major" type="text" value="<?php echo $stu['major'] ?>"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input id="email" name="email" type="text" value="<?php echo $stu['email'] ?>"/></td>
            </tr>
            <tr>
                <td>Student Password</td>
                <td><input id="stu_paw" name="stu_paw" type="text" value="<?php echo $stu['stu_paw'] ?>"/></td>
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