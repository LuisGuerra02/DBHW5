<html>
<body>
<h3>Choose one of the following ways to view applications by and hit the corresponding submit button:</h3>

<form action="allInApplication.php" method="post">
    <p>View all applications:</p>
    ALL:<input name="All-Applications" type="submit" value="Search All"><br><br>
</form>
<form action="allInApplication.php" method="post">
    <p>View all applications by major:</p>
    MAJOR: <input type="text" name="MAJOR">
    <input name="Applications-By-Major" type="submit" value="Search By Major"><br><br>
</form>
<form action="allInApplication.php" method="post">
    <p>View all applications by student:</p>
    STUDENT: <input type="text" name="STUDENT">
    <input name="Applications-By-Student" type="submit" value="Search By Student"><br><br>
</form>
<form action="allInApplication.php" method="post">
    <p>View all applications by job:</p>   
    JOB: <input type="text" name="JOB">
    <input name="Applications-By-Job" type="submit" value="Search By Job"><br><br>
</form>
<br><br>

</body>
</html>

<?php
if (isset($_POST['All-Applications'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $value = 'all';

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar allInApplication ' . $value . ' ' . $value;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run insertStudent.exe
    system($escaped_command);           
}

if (isset($_POST['Applications-By-Major'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $value = 'major';
    $MAJOR = escapeshellarg($_POST[MAJOR]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar allInApplication ' . $value . ' ' . $MAJOR;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run insertStudent.exe
    system($escaped_command);           
}

if (isset($_POST['Applications-By-Student'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $value = 'student';
    $STUDENT = escapeshellarg($_POST[STUDENT]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar allInApplication ' . $value . ' ' . $STUDENT;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run insertStudent.exe
    system($escaped_command);           
}

if (isset($_POST['Applications-By-Job'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $value = 'job';
    $JOB = escapeshellarg($_POST[JOB]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar allInApplication ' . $value . ' ' . $JOB;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run insertStudent.exe
    system($escaped_command);           
}
?>
