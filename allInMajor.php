<html>
<body>
<a href="http://www.csce.uark.edu/~sc133/project_java/MainPage.html">HOME PAGE</a>
<h3>Enter Which Majors Students you would like to see:</h3>

<form action="allInMajor.php" method="post">
    MAJOR: 
    <?php
    $value1 = 'major';
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
    $MAJOR = escapeshellarg($_POST[MAJOR]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar allInMajor ' . $MAJOR;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    system($escaped_command);           
}
?>


