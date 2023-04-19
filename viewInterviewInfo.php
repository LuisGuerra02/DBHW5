<html>
<body>
<h3>Enter the job ID for information about the interviews for that job:</h3>

<form action="viewInterviewInfo.php" method="post">
    JOB ID: <input type="text" name="JOB_ID">
    <input name="submit" type="submit" ><br><br>
</form>
<br><br>
</body>
</html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $JOB_ID = escapeshellarg($_POST[JOB_ID]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar viewInterviewInfo ' . $JOB_ID;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run insertStudent.exe
    system($escaped_command);           
}
?>


