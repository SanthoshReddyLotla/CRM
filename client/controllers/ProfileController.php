<?php
include __DIR__. "/../config/database.php";

class ProfileController {
    public function showProfile(){
        include '../../views/profile/index.php';
    }
}

?>