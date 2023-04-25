<html>
<body style="background-color:rgb(98, 165, 232);">
<a href="http://www.csce.uark.edu/~sc133/project_java/MainPage.html">HOME PAGE</a>
<h3>Enter Which Major you would like to see jobs for:</h3>

<form action="allJobInMajor.php" method="post">
    Desired major: 
    <?php
    $value1 = 'desired_major';
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
    $DESIRED_MAJOR = escapeshellarg($_POST[DESIRED_MAJOR]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar allJobInMajor ' . $DESIRED_MAJOR;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    system($escaped_command);           
}
?>


