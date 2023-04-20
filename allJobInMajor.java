import java.sql.*;

/*
insertStudent.java    // java program that is called by php that just does the insert; calls jdbc_db.java to connect and do the actual insert
jdbc_db.java // class (no main program) that has useful methods
*/

public class allJobInMajor {
    // The main program that inserts a student
    public static void main(String[] args) throws SQLException {
        String Username = "sc133"; // Change to your own username
        String mysqlPassword = "ohfin1Om"; // Change to your own mysql Password

        // Connect to the database
        jdbc_db myDB = new jdbc_db();
        myDB.connect(Username, mysqlPassword);
        myDB.initDatabase();

        // Parse input string to get student information
        String MAJOR = "";

        // Read command line arguments
        MAJOR = args[0];

        // Execute Get
        StringBuilder builder = new StringBuilder();
        String query1;
        if (!MAJOR.contains("ALL"))
            query1 = "SELECT * from JOBS WHERE DESIRED_MAJOR = '" + MAJOR + "'";
        else
            query1 = "SELECT * from JOBS";
        builder.append("<br> " + myDB.query(query1) + "<br>");
        System.out.println(builder.toString());

        myDB.disConnect();
    }
}
