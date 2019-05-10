<html>
<head>
    <title>Student Information System</title>
</head>
<body>
<center>
    <?php include("menu.php"); ?>
    <h3>Adding Student Information</h3>
    <form method="post" action="action.php?action=add">

        <table>
            <tr>
                <td>First Name</td>
                <td><input  name="fname" type="text"/></td>

            </tr>
            <tr>
                <td>Last Name</td>
                <td><input  name="lname" type="text"/></td>

            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" name="sex" value="M"/> M
                    <input type="radio" name="sex" value="F"/> F
                </td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" /></td>
            </tr>
            <tr>
                <td>Major</td>
                <td><input  name="major" type="text"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input  name="email" type="text"/></td>
            </tr>
            <tr>
                <td>Student Password</td>
                <td><input  name="stu_paw" type="text"/></td>
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