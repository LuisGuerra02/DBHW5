import java.sql.*;

/*
insertStudent.java    // java program that is called by php that just does the insert; calls jdbc_db.java to connect and do the actual insert
jdbc_db.java // class (no main program) that has useful methods
*/

public class allInApplication {
    // The main program that inserts a student
    public static void main(String[] args) throws SQLException {
        String Username = "sc133"; // Change to your own username
        String mysqlPassword = "ohfin1Om"; // Change to your own mysql Password

        // Connect to the database
        jdbc_db myDB = new jdbc_db();
        myDB.connect(Username, mysqlPassword);
        myDB.initDatabase();

        // Parse input string to get student information
        String VALUE = "";
        String BY = "";
        String query = "";

        // Read command line arguments
        VALUE = args[0];
        BY = args[1];

        // Execute Get
        StringBuilder builder = new StringBuilder();
        switch (VALUE) {
            case "all":
                query = "SELECT s.STUDENT_NAME, j.COMPANY_NAME, j.SALARY,s.MAJOR FROM STUDENTS s, JOBS j, APPLICATIONS a WHERE a.STUDENT_ID = s.STUDENT_ID AND a.JOB_ID = j.JOB_ID;";
                builder.append("<br> " + myDB.query(query) + "<br>");
                System.out.println(builder.toString());
                break;
            case "major":
                query = "SELECT s.STUDENT_NAME, j.COMPANY_NAME, j.SALARY,s.MAJOR FROM STUDENTS s, JOBS j, APPLICATIONS a WHERE a.STUDENT_ID = s.STUDENT_ID AND a.JOB_ID = j.JOB_ID AND s.MAJOR = '" + BY + "'";
                builder.append("<br> " + myDB.query(query) + "<br>");
                System.out.println(builder.toString());
                break;
            case "student":
                query = "SELECT s.STUDENT_NAME, j.COMPANY_NAME, j.SALARY,s.MAJOR FROM STUDENTS s, JOBS j, APPLICATIONS a WHERE a.STUDENT_ID = s.STUDENT_ID AND a.JOB_ID = j.JOB_ID AND s.STUDENT_NAME = '" + BY + "'";
                builder.append("<br> " + myDB.query(query) + "<br>");
                System.out.println(builder.toString());
                break;
            case "job":
                query = "SELECT s.STUDENT_NAME, j.COMPANY_NAME, j.SALARY,s.MAJOR FROM STUDENTS s, JOBS j, APPLICATIONS a WHERE a.STUDENT_ID = s.STUDENT_ID AND a.JOB_ID = j.JOB_ID AND j.JOB_TITLE = '" + BY + "'";
                builder.append("<br> " + myDB.query(query) + "<br>");
                System.out.println(builder.toString());
                break;
            default:
                System.out.println("Invalid input");
                break;
        }

        myDB.disConnect();
    }
}
