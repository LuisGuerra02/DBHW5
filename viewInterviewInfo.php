<html>
<body>
<a href="http://www.csce.uark.edu/~sc133/project_java/MainPage.html">HOME PAGE</a>
<h3>Enter the job ID for information about the interviews for that job:</h3>

<form action="viewInterviewInfo.php" method="post">
    MAJOR: 
    <?php
    $value1 = 'id';
    $command1 = 'java -cp .:mysql-connector-java-5.1.40-bin.jar availableByFromSelect ' . $value1;

    // remove dangerous characters from command to protect web server
    $escaped_command1 = escapeshellcmd($command1);
    // run Query to get available majors
    system($escaped_command1); 
    ?>
    <br>
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

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar viewInterviewInfo ' . $JOB_ID;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    system($escaped_command);           
}
?>


