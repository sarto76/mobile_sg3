<?php
class ApplicationsController {




    public function show() {



        $corsi = Courses::getCourses();
        require_once('views/instructors/show.php');
    }




}
?>