<html>
<body>
<h3>Choose one of the following ways to view applications by and hit the corresponding submit button:</h3>

<form action="allInApplication.php" method="post">
    <p>View all applications:</p>
    ALL:
    <br>
    <input name="All-Applications" type="submit" value="Search All">
</form>

<form action="allInApplication.php" method="post">
    <br><br>
    <p>View all applications by major:</p>
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
    <input name="Applications-By-Major" type="submit" value="Search By Major">
    <br>
</form>

<form action="allInApplication.php" method="post">
    <br><br>
    <p>View all applications by student:</p>
    MAJOR: 
    <?php
    $value2 = 'student';
    $command2 = 'java -cp .:mysql-connector-java-5.1.40-bin.jar availableByFromSelect ' . $value2;

    // remove dangerous characters from command to protect web server
    $escaped_command2 = escapeshellcmd($command2);
    // run Query to get available majors
    system($escaped_command2); 
    ?>
    <br>
    <input name="Applications-By-Student" type="submit" value="Search By Student">
    <br>
</form>

<form action="allInApplication.php" method="post">
    <br><br>
    <p>View all applications by job:</p>   
    MAJOR: 
    <?php
    $value3 = 'job';
    $command3 = 'java -cp .:mysql-connector-java-5.1.40-bin.jar availableByFromSelect ' . $value3;

    // remove dangerous characters from command to protect web server
    $escaped_command3 = escapeshellcmd($command3);
    // run Query to get available majors
    system($escaped_command3); 
    ?>
    <br>
    <input name="Applications-By-Job" type="submit" value="Search By Job">
    <br>
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
