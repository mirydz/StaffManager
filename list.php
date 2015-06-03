<?php
require 'app/GroupRepository.php';

$repo = new GroupRepository();

$newGroup = new Group(12, "aaa", "aaa", 666, 1);

$repo->add((array)$newGroup);

echo json_encode($repo->getAll());