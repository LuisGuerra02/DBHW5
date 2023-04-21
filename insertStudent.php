<html>
<body>
<a href="http://www.csce.uark.edu/~laguerra/project_java/MainPage.html">HOME PAGE</a>
<h3>Enter information the student below:</h3>

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


