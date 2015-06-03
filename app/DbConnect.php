<?php
try {
  # SQLite Database
  $DBH = new PDO("sqlite:db/staff.db");
}
catch(PDOException $e) {
    echo $e->getMessage();
}

# using the shortcut ->query() method here since there are no variable
# values in the select statement.
$STH = $DBH->query('SELECT Position, GroupNamePL, GroupNameEn, PeopleCount, IsActive from Groups');
 
# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);
 
while($row = $STH->fetch()) {
    echo $row['Position'] . "\n";
    echo $row['GroupNamePL'] . "\n";
    echo $row['GroupNameEN'] . "\n";
    echo $row['PeopleCount'] . "\n";
    echo $row['IsActive'] . "\n";
    echo "\n";
}