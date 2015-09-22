<?php
function __autoload($class_name) {
     include $class_name . '.php';
 }
 
 require 'Group.php';

error_reporting(-1);
class GroupRepository {
    private $db;
    public $DBH;
    public function __construct() {
        try {
          # SQLite Database
          $this->db = new PDO("sqlite:/home/ubuntu/workspace/StaffManager/app/db/staff.db");
        } 
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function getAll() {
        $result = $this->db->query("SELECT ID, Position, GroupNamePL, GroupNameEn, PeopleCount, IsActive FROM Groups");
        $result->setFetchMode(PDO::FETCH_OBJ);
        
        $allGroups = array();
        
        while ($group = $result->fetch()) {
            $allGroups[] = $group;
    }
        
        return $allGroups;
    }
    
    public function deleteGroupById($id) {
        $this->db->exec("DELETE FROM Groups WHERE ID = " . $id);
    }
    
    public function add($group) {
        $stmt = $this->db->prepare("INSERT INTO Groups (Position, GroupNamePL, GroupNameEn, PeopleCount, IsActive) VALUES (:position, :groupNamePL, :groupNameEN, :peopleCount, :isActive)");
        $stmt->execute((array)$group);
        
    }
    
    
}

//$newGroup = new Group(12, "aaa", "aaa", 666, 1);

//$repo = new GroupRepository();

//$repo->add((array)$newGroup);
//echo json_encode($repo->getAll());



