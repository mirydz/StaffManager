<?php
class Group 
{
    //public $ID;
    public $position;
    public $groupNamePL;
    public $groupNameEN;
    public $peopleCount;
    public $isActive;
    
    public function __construct($position, $groupNamePL, $groupNameEN, $peopleCount, $isActive) {
        $this->position = $position;
        $this->groupNamePL = $groupNamePL;
        $this->groupNameEN = $groupNameEN;
        $this->peopleCount = $peopleCount;
        $this->isActive = $isActive;
    }
}

