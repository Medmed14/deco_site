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
        
        if(isset($_GET['id'])  && filter_var($_GET['id'],FILTER_VALIDATE_INT)){

            $id = $_GET['id'];
            $deleteGrade = new Grade();
            $deleteGrade->setId_g($id);
            $nbLine = $this->addG->deleteGrade($deleteGrade);

            if($nbLine > 0){
                header('location: index.php?action=list_g');
            }
        }
    }

    public function editGrade(){
        AuthController::isLogged();

        if(isset($_GET['id']) && $_GET['id'] < 300 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $id = trim($_GET['id']);
            $grade = $this->addG->gradeItem($id);

            if(isset($_POST['soumis']) && !empty($_POST['newGrade'])){

                $newGrade = trim(addslashes(htmlentities($_POST['newGrade'])));
                $grade->setNom_g($newGrade);
                $nb = $this->addG->updateGrade($grade);
                
                if($nb > 0){
                    header('location:index.php?action=list_g');
                }
            }
    
            require_once('./views/admin/grades/adminEditGrade.php');
    
        }
    }

    
    public function addGrade(){
        AuthController::isLogged();

        if(isset($_POST['soumis']) && !empty($_POST['newGrade'])){
            $nom_grade = trim(htmlentities(addslashes($_POST['newGrade'])));
            $newGrade = new Grade();
            $newGrade->setNom_g($nom_grade);

            $ok = $this->addG->insertGrade($newGrade);
            if($ok){
                header('location:index.php?action=list_g');
            }
        }
        require_once('./views/admin/grades/adminAddGrade.php');
    }
}