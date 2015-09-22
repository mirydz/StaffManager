<?php
require 'app/GroupRepository.php';

$repo = new GroupRepository();

//$newGroup = new Group(13, "zzz", "zzz", 22, 1);
//$repo->add($newGroup);
header('Content-Type: application/json');
echo json_encode($repo->getAll());