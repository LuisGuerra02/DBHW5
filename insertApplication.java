import java.sql.*;

/*
insertApplication.java    // java program that is called by php that just does the insert; calls jdbc_db.java to connect and do the actual insert
jdbc_db.java // class (no main program) that has useful methods
*/

public class insertApplication {
   // The main program that inserts a student
   public static void main(String[] args) throws SQLException {
      String Username = "sc133"; // Change to your own username
      String mysqlPassword = "ohfin1Om"; // Change to your own mysql Password

      // Connect to the database
      jdbc_db myDB = new jdbc_db();
      myDB.connect(Username, mysqlPassword);
      myDB.initDatabase();

      // For debugging purposes: Show the database before the insert
      StringBuilder builder = new StringBuilder();
      String query1 = "SELECT * from APPLICATIONS";

      // Parse input string to get application information
      String STUDENT_ID = "";
      String JOB_ID = "";

      // Read command line arguments
      STUDENT_ID = args[0];
      JOB_ID = args[1];

      // Insert the new application
      String input = "'" + STUDENT_ID + "','" + JOB_ID + "'";
      myDB.insert("APPLICATIONS", input);

      builder.append(myDB.query(query1));
      System.out.println(builder.toString());

      myDB.disConnect();
   }
}
