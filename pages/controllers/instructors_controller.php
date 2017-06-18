<?php
class InstructorsController {

    public $l_error;

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



    public function logout() {
        //$mess = Message::getMessagesByType(1);
        Instructor::logout();
        header('Location: index.php');
    }

    public function show() {
        if(!isset($this->l_error)){
            $this->setLError("");
        }
        $l_error =$this->getLError();
        $titolo_pagina="Cruscotto";


        $istruttore = Instructor::find($_SESSION["ins_id"]);
        require_once('views/instructors/show.php');
    }

    public function changePass() {
        //$this->setLError($_POST['new_pass']);

        if (!isset($_POST['new_pass'])&&!isset($_POST['rep_pass'])){

            //$this->setLError($_POST['new_pass']);
        }
        else{
            $new_pass=$_POST['new_pass'];
            $rep_pass=$_POST['rep_pass'];
            //se sono uguali le 2 stringhe
            if (strcmp($new_pass,$rep_pass)==0){
                $istruttore = Instructor::find($_SESSION["ins_id"]);
                $id=$istruttore->ins_id;
                Instructor::changePass($id,md5($new_pass));
                $l_error ='<div class="alert alert-success">Password modificata con successo</div>';
                $this->setLError($l_error);

            }
            else{
                $l_error ='<div class="alert alert-danger">Le password non corrispondono</div>';
                $this->setLError($l_error);

            }
        }
        //require_once('views/instructors/show.php');

        $this->show();
    }

}
?>