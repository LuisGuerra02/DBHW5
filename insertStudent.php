<html>
<body>
<h3>Enter information the student below:</h3>

<!-- <div>
    <b>Suppliers:</b>
    <table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1</td>
        <td>Coco Fresh Tea &amp; Juice</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Sharetea</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Boba Guys</td>
    </tr>
    <tr>
        <td>8</td>
        <td>Kung Fu Tea</td>
    </tr>
    <tr>
        <td>15</td>
        <td>Fat Straws</td>
    </tr>
    </tbody>
    </table>
</div> -->

<form action="insertStudent.php" method="post">
    STUDENT_ID: <input type="text" name="STUDENT_ID"><br>
    STUDENT_NAME: <input type="text" name="STUDENT_NAME"><br>
    MAJOR: <input type="text" name="MAJOR"><br>
    <input name="submit" type="submit" >
</form>
<br><br>

</body>
</html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $STUDENT_ID = escapeshellarg($_POST[STUDENT_ID]);
    $STUDENT_NAME = escapeshellarg($_POST[STUDENT_NAME]);
    $MAJOR = escapeshellarg($_POST[MAJOR]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar insertStudent ' . $STUDENT_ID . ' ' . $STUDENT_NAME . ' ' . $MAJOR;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run insertStudent.exe
    system($escaped_command);           
}
?>


