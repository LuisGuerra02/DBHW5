import java.sql.*;

/*
insertStudent.java    // java program that is called by php that just does the insert; calls jdbc_db.java to connect and do the actual insert
jdbc_db.java // class (no main program) that has useful methods
*/

public class viewInterviewInfo {
    // The main program that inserts a student
    public static void main(String[] args) throws SQLException {
        String Username = "sc133"; // Change to your own username
        String mysqlPassword = "ohfin1Om"; // Change to your own mysql Password

        // Connect to the database
        jdbc_db myDB = new jdbc_db();
        myDB.connect(Username, mysqlPassword);
        myDB.initDatabase();

        String ID = "";

        // Read command line arguments
        ID = args[0];

        // Execute Get
        StringBuilder builder = new StringBuilder();
        String query1 = "SELECT JOBS.COMPANY_NAME, JOBS.JOB_TITLE, INTERVIEWERS.INTERVIEWER_NAME, INTERVIEWERS.INTERVIEW_TIME FROM INTERVIEWERS INNER JOIN JOBS ON INTERVIEWERS.JOB_ID = JOBS.JOB_ID AND INTERVIEWERS.JOB_ID = '" + ID + "'";
        builder.append(myDB.query(query1));
        System.out.println(builder.toString());

        myDB.disConnect();
    }
}
