<html>
<body>
<h3>Enter Which Majors Students you would like to see:</h3>

<form action="allInMajor.php" method="post">
    MAJOR: <input type="text" name="MAJOR"><br>
    <input name="submit" type="submit" >
</form>
<br><br>

</body>
</html>

<?php
$command1 = 'java -cp .:mysql-connector-java-5.1.40-bin.jar availableMajors ';

// remove dangerous characters from command to protect web server
$escaped_command1 = escapeshellcmd($command1);
echo "<p>command1: $command1 <p>"; 
// run insertStudent.exe
system($escaped_command1);  

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


