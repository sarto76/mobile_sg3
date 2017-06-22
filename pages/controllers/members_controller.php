<?php
class MembersController {

    public $l_error;
    public $allievi;
    public $member;

    public function __construct()
    {
        require_once 'includes.php';
    }

    public function updateMember(){

        if (isset($_POST['id'])) {
            $id=$_POST['id'];
        }
        if (isset($_POST['cognome'])) {
            $cognome=$_POST['cognome'];
        }
        if (isset($_POST['nome'])) {
            $nome=$_POST['nome'];
        }
        if (isset($_POST['tit'])) {
            $tit=$_POST['tit'];
        }
        if (isset($_POST['nas'])) {
            $nas=strtotime($_POST['nas']);
        }
        if (isset($_POST['indirizzo'])) {
            $indirizzo=$_POST['indirizzo'];
        }
        if (isset($_POST['cap'])) {
            $cap=$_POST['cap'];
        }
        if (isset($_POST['citta'])) {
            $citta=$_POST['citta'];
        }
        if (isset($_POST['cell'])) {
            $cell=$_POST['cell'];
        }
        if (isset($_POST['telcas'])) {
            $telcas=$_POST['telcas'];
        }
        if (isset($_POST['email'])) {
            $email=$_POST['email'];
        }
        if (isset($_POST['cat'])) {
            $cat=$_POST['cat'];
        }
        if (isset($_POST['ril'])) {
            $ril=strtotime($_POST['ril']);
        }
        if (isset($_POST['nip'])) {
            $nip = $_POST['nip'];

        }

        $mod=Member::updateMember($id,strtotime("now"),$email,$nome,$cognome,$tit,$indirizzo,$cap,$citta,$telcas,$cell,'',$nas,$_SESSION["ins_id"],$cat,$nip,$ril,'','');
        if($mod){
            $this->l_error = '<div class="alert alert-success">Allievo modificato con successo</div>';

        }
        else{
            $this->l_error = '<div class="alert alert-warning">Errore: problema nella modifica</div>';
        }
        $this->show();
    }



    public function show() {

        $titolo_pagina="Allievi";


        $this->allievi = Member::getMembers();
        require_once('views/members/show.php');
    }

    public function addMember(){
        if (isset($_POST['cognome'])) {
            $cognome=$_POST['cognome'];
        }
        if (isset($_POST['nome'])) {
            $nome=$_POST['nome'];
        }
        if (isset($_POST['tit'])) {
            $tit=$_POST['tit'];
        }
        if (isset($_POST['nas'])) {
            $nas=strtotime($_POST['nas']);
        }
        if (isset($_POST['indirizzo'])) {
            $indirizzo=$_POST['indirizzo'];
        }
        if (isset($_POST['cap'])) {
            $cap=$_POST['cap'];
        }
        if (isset($_POST['citta'])) {
            $citta=$_POST['citta'];
        }
        if (isset($_POST['cell'])) {
            $cell=$_POST['cell'];
        }
        if (isset($_POST['telcas'])) {
            $telcas=$_POST['telcas'];
        }
        if (isset($_POST['email'])) {
            $email=$_POST['email'];
        }
        if (isset($_POST['cat'])) {
            $cat=$_POST['cat'];
        }
        if (isset($_POST['ril'])) {
            $ril=strtotime($_POST['ril']);
        }
        if (isset($_POST['nip'])) {
            $nip = $_POST['nip'];

        }

        $mod=Member::addMember(strtotime("now"),$email,$nome,$cognome,$tit,$indirizzo,$cap,$citta,$telcas,$cell,'',$nas,$_SESSION["ins_id"],$cat,$nip,$ril,'','');
        if($mod){
            $this->l_error = '<div class="alert alert-success">Allievo inserito con successo</div>';

        }
        else{
            $this->l_error = '<div class="alert alert-warning">Errore: problema nell\'inserimento</div>';
        }
        $this->show();
    }






    public function manageMember() {
        $titolo_pagina="";
        if (isset($_GET['id'])) {
            $this->showManageMember($_GET['id']);
        }
        //se si tratta di un inserimento nuovo
        else{
            $titolo_pagina= "Inserimento nuovo Allievo";
            $this->member = new Member();
            $action="addMember";
            $bott="Inserisci";

            require_once('views/members/manage_member.php');
        }
    }


    public function showManageMember($mem_id) {
        $this->member = Member::find($mem_id);
        $titolo_pagina= $this->member->mem_firstn." ".$this->member->mem_lastn;
        $action="updateMember";
        $bott="Modifica";
        require_once('views/members/manage_member.php');

    }

    public function showInscriptions(){
        $this->member = Member::find($_GET['id']);
        $this->l_error = '<div></div>';
        $titolo_pagina= "Iscrizioni di ".$this->member->mem_firstn." ".$this->member->mem_lastn;
        $corsi = Course::getActualCoursesWithLessons();
        $numtot=new Setting();
        $applications=Application::getApplicationByMember($this->member->mem_id);


        require_once('views/members/showInscriptions.php');
    }


}
?>