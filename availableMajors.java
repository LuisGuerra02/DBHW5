import java.sql.*;

/*
insertStudent.java    // java program that is called by php that just does the insert; calls jdbc_db.java to connect and do the actual insert
jdbc_db.java // class (no main program) that has useful methods
*/

public class availableMajors {
    // The main program that inserts a student
    public static void main(String[] args) throws SQLException {
        String Username = "laguerra"; // Change to your own username
        String mysqlPassword = "aid9iuT5"; // Change to your own mysql Password

        // Connect to the database
        jdbc_db myDB = new jdbc_db();
        myDB.connect(Username, mysqlPassword);
        myDB.initDatabase();

        // Execute Get
        StringBuilder builder = new StringBuilder();
        String query1 = "SELECT DISTINCT MAJOR from STUDENTS;";

        String[] majorParts = myDB.query(query1).split("<br>");
        // System.out.println([0]);majorParts
        builder.append("<select>");
        String majorValue = majorParts[0];
        for (int i = 6; i < majorParts.length; i++) {
            builder.append("<option value=\"" + majorParts[i] + "\">" + majorParts[i] + "</option>");
        }
        builder.append("</select>");
        System.out.println(builder.toString());

        myDB.disConnect();
    }
}
