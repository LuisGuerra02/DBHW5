import java.sql.*;

/*
insertStudent.java    // java program that is called by php that just does the insert; calls jdbc_db.java to connect and do the actual insert
jdbc_db.java // class (no main program) that has useful methods
*/

public class viewInterviewInfo {
    // The main program that inserts a student
    public static void main(String[] args) throws SQLException {
        String Username = "laguerra"; // Change to your own username
        String mysqlPassword = "aid9iuT5"; // Change to your own mysql Password

        // Connect to the database
        jdbc_db myDB = new jdbc_db();
        myDB.connect(Username, mysqlPassword);
        myDB.initDatabase();

        // Parse input string to get student information
        String ID = "";

        // Read command line arguments
        ID = args[0];

        // Execute Get
        StringBuilder builder = new StringBuilder();
        String query1;
        if (!ID.contains("ALL")) {
            query1 = "SELECT JOBS.COMPANY_NAME, JOBS.JOB_TITLE, INTERVIEWERS.INTERVIEWER_NAME, INTERVIEWERS.INTERVIEW_TIME FROM INTERVIEWERS INNER JOIN JOBS ON INTERVIEWERS.JOB_ID = JOBS.JOB_ID AND INTERVIEWERS.JOB_ID = '"
                    + ID + "'";
        } else {
            query1 = "SELECT JOBS.COMPANY_NAME, JOBS.JOB_TITLE, INTERVIEWERS.INTERVIEWER_NAME, INTERVIEWERS.INTERVIEW_TIME FROM INTERVIEWERS INNER JOIN JOBS ON INTERVIEWERS.JOB_ID = JOBS.JOB_ID";
        }
        builder.append("<br> " + myDB.query(query1) + "<br>");
        System.out.println(builder.toString());

        myDB.disConnect();
    }
}
