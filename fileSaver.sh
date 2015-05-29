#!/bin/sh
echo "SELECT * FROM Students;" | mysql -uroot -pec2inmybutt signoutdb > database.txt
$now = $(date +"%Y-%m-%d")
mv database.txt ../backup/$now.txt
touch database.txt
chmod 777 database.txt
