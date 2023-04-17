<html>
<body>
<h3>Enter information the job below:</h3>

<form action="insertJob.php" method="post">
    JOB_ID: <input type="text" name="JOB_ID"><br>
    COMPANY_NAME: <input type="text" name="COMPANY_NAME"><br>
    JOB_TITLE: <input type="text" name="JOB_TITLE"><br>
    SALARY: <input type="text" name="SALARY"><br>
    DESIRED_MAJOR: <input type="text" name="DESIRED_MAJOR"><br>
    <input name="submit" type="submit" >
</form>
<br><br>

</body>
</html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $JOB_ID = escapeshellarg($_POST[JOB_ID]);
    $COMPANY_NAME = escapeshellarg($_POST[COMPANY_NAME]);
    $JOB_TITLE = escapeshellarg($_POST[JOB_TITLE]);
    $SALARY = escapeshellarg($_POST[SALARY]);
    $DESIRED_MAJOR = escapeshellarg($_POST[DESIRED_MAJOR]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar insertJob ' . $JOB_ID . ' ' . $COMPANY_NAME . ' ' . $JOB_TITLE . ' ' . $SALARY . ' ' . $DESIRED_MAJOR;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run insertJob.exe
    system($escaped_command);           
}
?>


