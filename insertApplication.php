<html>
<body>
<a href="http://www.csce.uark.edu/~sc133/project_java/MainPage.html">HOME PAGE</a>
<h3>Enter information the application below:</h3>

<form action="insertApplication.php" method="post">
    JOB ID: 
    <?php
    $value1 = 'id';
    $command1 = 'java -cp .:mysql-connector-java-5.1.40-bin.jar availableByFromSelect ' . $value1;

    // remove dangerous characters from command to protect web server
    $escaped_command1 = escapeshellcmd($command1);
    // run Query to get available majors
    system($escaped_command1); 
    ?>
    STUDENT ID: 
    <?php
    $value2 = 'studentid';
    $command2 = 'java -cp .:mysql-connector-java-5.1.40-bin.jar availableByFromSelect ' . $value2;

    // remove dangerous characters from command to protect web server
    $escaped_command2 = escapeshellcmd($command2);
    // run Query to get available majors
    system($escaped_command2); 
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
    $STUDENT_ID = escapeshellarg($_POST[STUDENT_ID]);
    $JOB_ID = escapeshellarg($_POST[JOB_ID]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar insertApplication ' . $STUDENT_ID . ' ' . $JOB_ID;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    system($escaped_command);           
}
?>


