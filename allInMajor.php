<html>
<body>
<h3>Enter information the student below:</h3>

<form action="insertStudent.php" method="post">
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
    $MAJOR = escapeshellarg($_POST[MAJOR]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar allInMajor ' . $MAJOR;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run insertStudent.exe
    system($escaped_command);           
}
?>


