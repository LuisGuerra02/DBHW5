<html>
<body>
<h3>Enter information the application below:</h3>

<form action="insertApplication.php" method="post">
    STUDENT_ID: <input type="text" name="STUDENT_ID"><br>
    JOB_ID: <input type="text" name="JOB_ID"><br>
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
    $JOB_ID = escapeshellarg($_POST[JOB_ID]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar insertApplication ' . $STUDENT_ID . ' ' . $JOB_ID;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run insertApplication.exe
    system($escaped_command);           
}
?>


