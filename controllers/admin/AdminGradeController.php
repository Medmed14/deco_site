<?php

class AdminGradeController{

    private $addG;
    
    public function __construct()
    {
        $this->addG = new AdminGradeModel();
    }

    public function listGrades(){
        AuthController::isLogged();
         $allGrades = $this->addG->getGrades();
         require_once('./views/admin/grades/adminGradesItems.php');
    }

    public function removeGrade(){
        AuthController::isLogged();
        AuthController::accessUser();
        if(isset($_GET['id'])  && filter_var($_GET['id'],FILTER_VALIDATE_INT)){

            $id = trim($_GET['id']);

            $nbLine = $this->addG->deleteGrade($id);

            if($nbLine > 0){
                header('location: index.php?action=list_g');
            }
        }
    }
}