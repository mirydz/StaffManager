<?php
$seedValues = array(
    array(0, "Kierownik Katedry", "Head of Department", 1, 1),
    array(1, "Profesorowie", "Professors", 3, 1),
    array(2, "Goście", "Visiting researchers", 0, 1),
    array(3, "Wykładowcy", "Leturers", 0, 1),
    array(4, "Doktoranci", "PhD Students", 25, 1),
    array(5, "Pracwnicy inżynieryjno-techniczni", "Technical and engineering staff", 0, 1),
    array(6, "Pracownicy administracyjni", "Administration", 7, 1),
    array(7, "Adiunkci", "Tutors", 34, 1),
    array(8, "Pracownicy techniczni", "Technical staff", 9, 1),
    array(9, "Inni", "Others", 4 , 0)
);

try {
    # SQLite Database
    $DBH = new PDO("sqlite:staff.db");
} 
catch(PDOException $e) {
    echo $e->getMessage();
}

try {
    $DBH->exec('create table Groups(ID INTEGER PRIMARY KEY AUTOINCREMENT, Position INTEGER, GroupNamePL TEXT, GroupNameEn TEXT, PeopleCount INTEGER, IsActive INTEGER)');
    $STH = $DBH->prepare("INSERT INTO Groups (Position, GroupNamePL, GroupNameEn, PeopleCount, IsActive) VALUES (?, ?, ?, ?, ?)");
    foreach($seedValues as $entry) {
        $STH->execute($entry);
        
    }
}
catch(Exception $e) {
    echo "Somthing went wrong";
}

echo "Procedure completed";
