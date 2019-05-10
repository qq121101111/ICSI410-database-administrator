<?php

//connect to database
try{
    $pdo = new PDO("mysql:host=localhost;dbname=university_student_database;","root","root");
}catch(PDOException $e){
    die("Connect failed".$e->getMessage());
}

//2.switch deferent operations

switch($_GET['action']){
    case "add"://add operation
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $major = $_POST['major'];
        $email = $_POST['email'];
        $stu_paw = $_POST['stu_paw'];

        $sql = "insert into student values(null,'{$fname}','{$lname}','{$sex}','{$age}','{$major}','{$email}','{$stu_paw}')";
        $rw = $pdo->exec($sql);
        if($rw > 0){
            echo "<script>alert('added');window.location='info.php'</script>";
        }else{
            echo "<script>alert('failed');window.history.back();</script>";
        }
        break;

    case "del"; //delete operation
        $id = $_GET['id'];
        $sql = "delete from student where id={$id}";
        $pdo->exec($sql);
        header("Location:info.php");
        break;

    case "edit":

        //edit operation
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $major = $_POST['major'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $stu_paw = $_POST['stu_paw'];

        $sql = "update student set fname='{$fname}',lname='{$lname}',sex='{$sex}',age='{$age}',major='{$major}',email='{$email}',stu_paw='{$stu_paw}' where student.id={$id}";
        $rw = $pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('update');window.location='info.php'</script>";
        }else{
           echo "<script>alert('nothing changed');window.history.back();</script>";
        }
        break;

    case "update_grade":

        //updata operation
        $num = $_POST['num'];
        $grade = $_POST['grade'];

        $sql = "update stu_classes set grade='{$grade}' where num={$num}";
        $rw = $pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('update');window.location='info.php'</script>";
        }else{
           echo "<script>alert('nothing changed');window.history.back();</script>";
        }
        break;
}
?>