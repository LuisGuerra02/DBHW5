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
      StringBuilder error = new StringBuilder();
      StringBuilder builder = new StringBuilder();
      String query1 = "SELECT * from APPLICATIONS";
      builder.append("<br> Table APPLICATIONS before:" + myDB.query(query1) + "<br>");

      // Parse input string to get application information
      String STUDENT_ID = "";
      String JOB_ID = "";

      // Read command line arguments
      STUDENT_ID = args[0];
      JOB_ID = args[1];

      // Insert the new application
      String input = "'" + STUDENT_ID + "','" + JOB_ID + "'";
      if(!myDB.insert("APPLICATIONS", input))
      {
        error.append("The given ID's are not in the database or already in use for an application, try again!");
        System.out.println(error.toString());
      }
      else
      {
        // For debugging purposes: Show the database after the insert
        builder.append("<br><br><br> Table APPLICATIONS after:" + myDB.query(query1));
        System.out.println(builder.toString());
      }

      myDB.disConnect();
   }
}
