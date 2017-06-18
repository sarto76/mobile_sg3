<?php
class CoursesController {

    public $l_error;
    public $tipo;
    public $lezioni;
    public $istruttori;
    public $istruttore;


    public function __construct()
    {
        require_once 'includes.php';
    }

    /**
     * @return mixed
     */
    public function getLezioni()
    {
        return $this->lezioni;
    }

    /**
     * @param mixed $lezioni
     */
    public function setLezioni($lezioni)
    {
        $this->lezioni = $lezioni;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }



    /**
     * @return mixed
     */
    public function getLError()
    {
        return $this->l_error;
    }

    /**
     * @param mixed $l_error
     */
    public function setLError($l_error)
    {
        $this->l_error = $l_error;
    }


    public function manageLesson() {
        $titolo_pagina="";
        if (isset($_GET['id'])) {
            $this->showManageLesson($_GET['id']);
        }
    }


    public function showManageLesson($lesson_id) {
        $this->lesson = Lesson::find($lesson_id);
        $course=Course::find($this->lesson->les_course);
        $this->istruttori=Instructor::getAll();
        $this->istruttore=Instructor::find($this->lesson->les_instructor);
        $allievi=Application::getMembersByLesson($lesson_id);
        //$app=Application::find($lesson_id);

        $titolo_pagina="Lezione ".$this->lesson->les_number." del ".getDayMonthYearByTs($this->lesson->les_ts)." del ".($this->lesson->les_ts);
        require_once('views/lessons/manage_lesson.php');

    }

    public function showAddCourse($type) {
        if(!isset($this->l_error)){
            $this->setLError("");
        }
        $lezioni=getNumberLessonsByCourseType($this->getTipo());
        $this->setLezioni($lezioni);
        $this->istruttori=Instructor::getAll();


        $titolo_pagina=getCourseTypeByInitials($this->getTipo());

        //$corsi = Course::getCoursesbyType($this->getTipo());
        //$l_error =$this->getLError();
        require_once('views/courses/addCourse.php');

    }


    public function addCourse() {
        if (isset($_GET['type'])) {
            $this->setTipo($_GET['type']);
            $this->showAddCourse($_GET['type']);
        }

        //se clicco sul bottone inserisci
        if (isset($_POST['inserisci'])) {

            $this->setTipo($_POST['type']);
            $lezioni = getNumberLessonsByCourseType($this->getTipo());
            //inserisco il corso e ricavo il suo id
            $idCourse = Course::addCourseByTypeAndStatus($this->getTipo(),$_POST['iscrizioni']);

            for ($lez = 1; $lez < $lezioni + 1; $lez++) {
                $dataCorr = "data" . $lez;
                $insCorr = "ins" . $lez;
                //echo "<pre>";
                //print_r("datacorr: ".$_POST[$dataCorr]." inscorr: ".$_POST[$insCorr]);
                //echo "</pre>";
                //controllo se ha settato le 3 date, altrimenti errore
                if ($_POST[$dataCorr] != "") {
                    //controllo se è stato messo il docente
                    if (isset($_POST[$insCorr])) {
                        Lesson::insertLesson($idCourse, getTimestampFromChDateTime($_POST[$dataCorr]), $lez, $_POST[$insCorr]);
                    } else {
                        Lesson::insertLesson($idCourse, getTimestampFromChDateTime($_POST[$dataCorr]), $lez, null);
                    }
                    $l_error = '<div class="alert alert-success">Corso inserito con successo</div>';
                    $this->setLError($l_error);
                } //se non sono settate tutte le date cancello il corso ed esco dal ciclo
                else {
                    Course::deleteCourse($idCourse);
                    $idCourse = "";
                    $l_error = '<div class="alert alert-warning">Errore: inserire tutte le date delle lezioni</div>';
                    $this->setLError($l_error);
                    $this->showAddCourse($this->getTipo());
                   // $titolo_pagina = getCourseTypeByInitials($this->getTipo());

                    //require_once('views/courses/addCourse.php');
                    break;

                }
            }
            if ($idCourse != "") {

            //require_once('views/courses/addCourse.php');
            $this->show();
             }
        }
    }



    public function show() {
        //setto il tipo di corso
        if (isset($_GET['type'])) {
            $this->setTipo($_GET['type']);
        }
        //print_r("Tipo ".$this->getTipo());
        if(!isset($this->l_error)){
            $this->setLError("");
        }
        $numtot=new Setting();
        $maxall=$numtot->getValueByName($this->getTipo()."_max");

        $lezioni=getNumberLessonsByCourseType($this->getTipo());
        $this->setLezioni($lezioni);

        $titolo_pagina=getCourseTypeByInitials($this->getTipo());

        $corsi = Course::getCoursesbyType($this->getTipo());
       // $corsi = Course::getCoursesWithLessonsByType($this->getTipo());

        //print_r($corsi);
        $l_error =$this->getLError();
        require_once('views/courses/show.php');
    }

    public function deleteMemberFromApplication() {
        if (isset($_GET['app_id'])) {
            //prendo l'id della lezione che eliminerò per ritornare lì
            $lesson_id=Application::find($_GET['app_id'])->app_lesson;

            //cancello il membro sal corso
            $righe = Application::deleteMemberFromApplication($_GET['app_id']);
            //se ha cancellato il membro
            if($righe==1){
                $l_error ='<div class="alert alert-success">Allievo eliminato con successo dal corso</div>';
                $this->setLError($l_error);
                $this->showManageLesson($lesson_id);
                //require_once('views/courses/show_moto.php');
            }
            else{
                $l_error ='<div class="alert alert-warning">Errore</div>';
                $this->setLError($l_error);
            }



        }
    }

    public function deleteCourse() {

        if (isset($_GET['id'])) {
            $this->setTipo(Course::find($_GET['id'])->cou_type);
            $righe = Course::deleteCourse($_GET['id']);
            //se ha cancellato il corso
            if($righe==1){
                $l_error ='<div class="alert alert-success">Corso eliminato con successo</div>';
                $this->setLError($l_error);
                $this->show();
                //require_once('views/courses/show_moto.php');
            }
            else{
                $l_error ='<div class="alert alert-warning">Errore</div>';
                $this->setLError($l_error);
            }



        }
    }

    public function manageMoto() {

        $titolo_pagina="";

        if (isset($_GET['id'])) {
            $this->showManageMoto($_GET['id']);
        }


    }


    public function showManageMoto($id) {
        $corso = Course::find($id);
        $allievi=Application::getApplicationsByCourse($id);
        $titolo_pagina="Corso moto del ".getDayMonthYearByTs($corso->cou_ts_1);
        require_once('views/courses/manage_all_moto.php');

    }






}
?>