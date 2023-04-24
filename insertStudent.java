import java.sql.*;

/*
insertStudent.java    // java program that is called by php that just does the insert; calls jdbc_db.java to connect and do the actual insert
jdbc_db.java // class (no main program) that has useful methods
*/

public class insertStudent {
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
      String query1 = "SELECT * from STUDENTS";

      // Parse input string to get student information
      String STUDENT_ID = "";
      String STUDENT_NAME = "";
      String MAJOR = "";

      // Read command line arguments
      STUDENT_ID = args[0];
      STUDENT_NAME = args[1];
      MAJOR = args[2];

      // Insert the new student
      String input = "'" + STUDENT_ID + "','" + STUDENT_NAME + "','" + MAJOR + "'";
      myDB.insert("STUDENTS", input); // insert new student

      // For debugging purposes: Show the database after the insert
      builder.append(myDB.query(query1));
      System.out.println(builder.toString());

      myDB.disConnect();
   }
}
