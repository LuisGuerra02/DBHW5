set -e -v

echo "Creating and filling tables..."
./hw4.sh

echo "Compiling..."
cd
chmod o+x public_html
cd public_html
chmod o+x project_java
cd project_java
chmod a+r insertStudent.php
chmod +w insertStudent.php
chmod a+r insertJob.php
chmod +w insertJob.php
chmod a+r insertApplication.php
chmod +w insertApplication.php
chmod a+r allInMajor.php
chmod +w allInMajor.php
chmod a+r allJobInMajor.php
chmod +w allJobInMajor.php
chmod a+r allInApplication.php
chmod +w allInApplication.php
chmod a+r viewInterviewInfo.php
chmod +w viewInterviewInfo.php
chmod 755 *
javac *.java

cd
chmod o+x public_html
cd public_html
chmod o+x project_java
cd project_java
chmod a+r insertStudent.php
chmod +w insertStudent.php
chmod a+r insertJob.php
chmod +w insertJob.php
chmod a+r insertApplication.php
chmod +w insertApplication.php
chmod a+r allInMajor.php
chmod +w allInMajor.php
chmod a+r allJobInMajor.php
chmod +w allJobInMajor.php
chmod a+r allInApplication.php
chmod +w allInApplication.php
chmod a+r viewInterviewInfo.php
chmod +w viewInterviewInfo.php
chmod 755 *
javac *.java

echo "Running..."

