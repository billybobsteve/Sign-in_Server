#!/bin/sh
echo "SELECT * FROM Students WHERE Id > 1;" | mysql -uroot -pec2inmybutt signoutdb > database.txt
$now = $(date +"%Y-%m-%d")
mv database.txt ../backup/$now.txt
touch database.txt
chmod 777 database.txt
"TRUNCATE TABLE Students;" |  mysql -uroot -pec2inmybutt signoutdb > database.txt
"INSERT INTO Students Name='1';" |  mysql -uroot -pec2inmybutt signoutdb > database.txt
# 55 23 * * * bash /path/to/file/fileSaver.sh