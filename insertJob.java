import java.sql.*;

/*
insertJob.java    // java program that is called by php that just does the insert; calls jdbc_db.java to connect and do the actual insert
jdbc_db.java // class (no main program) that has useful methods
*/

public class insertJob {
   // The main program that inserts a job
   public static void main(String[] args) throws SQLException {
      String Username = "sc133"; // Change to your own username
      String mysqlPassword = "ohfin1Om"; // Change to your own mysql Password

      // Connect to the database
      jdbc_db myDB = new jdbc_db();
      myDB.connect(Username, mysqlPassword);
      myDB.initDatabase();

      // For debugging purposes: Show the database before the insert
      StringBuilder builder = new StringBuilder();
      String query1 = "SELECT * from JOBS";
      builder.append("<br> Table JOBS before:" + myDB.query(query1) + "<br>");

      // Parse input string to get job information
      String JOB_ID = "";
      String COMPANY_NAME = "";
      String JOB_TITLE = "";
      String SALARY = "";
      String DESIRED_MAJOR = "";

      // Read command line arguments
      JOB_ID = args[0];
      COMPANY_NAME = args[1];
      JOB_TITLE = args[2];
      SALARY = args[3];
      DESIRED_MAJOR = args[4];

      // Insert the new student
      String input = "'" + JOB_ID + "','" + COMPANY_NAME + "','" + JOB_TITLE + "','" + SALARY + "','" + DESIRED_MAJOR + "'";
      myDB.insert("JOBS", input); // insert new job

      // For debugging purposes: Show the database after the insert
      builder.append("<br><br><br> Table JOBS after:" + myDB.query(query1));
      System.out.println(builder.toString());

      myDB.disConnect();
   }
}
