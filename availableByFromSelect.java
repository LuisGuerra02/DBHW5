import java.sql.*;

/*
insertStudent.java    // java program that is called by php that just does the insert; calls jdbc_db.java to connect and do the actual insert
jdbc_db.java // class (no main program) that has useful methods
*/

public class availableByFromSelect {
    // The main program that inserts a student
    public static void main(String[] args) throws SQLException {
        String Username = "laguerra"; // Change to your own username
        String mysqlPassword = "aid9iuT5"; // Change to your own mysql Password

        // Connect to the database
        jdbc_db myDB = new jdbc_db();
        myDB.connect(Username, mysqlPassword);
        myDB.initDatabase();

        String VALUE = "";
        VALUE = args[0];

        // Execute Get
        StringBuilder builder = new StringBuilder();
        String query0 = "SELECT DISTINCT DESIRED_MAJOR from JOBS;";
        String query1 = "SELECT DISTINCT MAJOR from STUDENTS;";
        String query2 = "SELECT DISTINCT STUDENT_NAME from STUDENTS;";
        String query3 = "SELECT DISTINCT JOB_TITLE from JOBS;";
        String query4 = "SELECT DISTINCT JOB_ID from JOBS;";

        switch (VALUE) {
            case "major":
                String[] majorParts = myDB.query(query1).split("<br>");
                // System.out.println([0]);majorParts
                builder.append("<select name= \"MAJOR\">");
                for (int i = 6; i < majorParts.length; i++) {
                    builder.append("<option value=\"" + majorParts[i] + "\">" + majorParts[i] + "</option>");
                }
                builder.append("<option value=\" ALL \"> ALL </option>");
                builder.append("</select>");
                System.out.println(builder.toString());
                break;
            case "student":
                String[] studentParts = myDB.query(query2).split("<br>");
                // System.out.println([0]);majorParts
                builder.append("<select name= \"STUDENT\">");
                for (int i = 6; i < studentParts.length; i++) {
                    builder.append("<option value=\"" + studentParts[i] + "\">" + studentParts[i] + "</option>");
                }
                builder.append("<option value=\" ALL \"> ALL </option>");
                builder.append("</select>");
                System.out.println(builder.toString());
                break;
            case "job":
                String[] jobParts = myDB.query(query3).split("<br>");
                // System.out.println([0]);majorParts
                builder.append("<select name= \"JOB\">");
                for (int i = 6; i < jobParts.length; i++) {
                    builder.append("<option value=\"" + jobParts[i] + "\">" + jobParts[i] + "</option>");
                }
                builder.append("<option value=\" ALL \"> ALL </option>");
                builder.append("</select>");
                System.out.println(builder.toString());
                break;
            case "id":
                String[] idParts = myDB.query(query4).split("<br>");
                // System.out.println([0]);majorParts
                builder.append("<select name= \"JOB_ID\">");
                for (int i = 6; i < idParts.length; i++) {
                    builder.append("<option value=\"" + idParts[i] + "\">" + idParts[i] + "</option>");
                }
                builder.append("<option value=\" ALL \"> ALL </option>");
                builder.append("</select>");
                System.out.println(builder.toString());
                break;
            case "desired_major":
                String[] desiredParts = myDB.query(query0).split("<br>");
                // System.out.println([0]);majorParts
                builder.append("<select name= \"DESIRED_MAJOR\">");
                for (int i = 6; i < desiredParts.length; i++) {
                    builder.append("<option value=\"" + desiredParts[i] + "\">" + desiredParts[i] + "</option>");
                }
                builder.append("<option value=\" ALL \"> ALL </option>");
                builder.append("</select>");
                System.out.println(builder.toString());
                break;
            default:
                System.out.println("Invalid input");
                break;
        }

        myDB.disConnect();
    }
}
