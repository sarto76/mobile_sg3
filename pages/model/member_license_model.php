<?php
include_once("model.php");
include_once("members_model.php");
include_once("applications_model.php");

Class MemberLicense extends Model{


     public $mem_lic_id;
     public $lic_id;
     public $mem_id;
     public $mem_lic_pin;
     public $mem_lic_ts;

    /**
     * Application constructor.
     * @param $mem_lic_id
     * @param $lic_id
     * @param $mem_id
     * @param $mem_lic_pin
     * @param $mem_lic_ts
     */
    public function __construct($mem_lic_id=null, $lic_id=null, $mem_id=null, $mem_lic_pin=null, $mem_lic_ts=null){
        $this->mem_lic_id = $mem_lic_id;
        $this->lic_id = $lic_id;
        $this->mem_id = $mem_id;
        $this->mem_lic_pin = $mem_lic_pin;
        $this->mem_lic_ts = $mem_lic_ts;
    }


    public function getMemberLicense(){
        $selectApplications = self::getConnection()->query("SELECT * FROM member_license");
        return $selectApplications;
    }

    public function getLicenseCatByLessonAndMemberId($lesson=null,$member=null){
        $lesson = intval($lesson);
        $member = intval($member);
        $req = self::getConnection()->prepare('select l.lic_cat from applications a,member_license m, license l 
                            where a.member_license=m.mem_lic_id
                            and l.lic_id=m.lic_id
                            and m.mem_id=:member
                            and app_lesson=:lesson');

        $req->execute(array('lesson' => $lesson,'member' => $member));
        $app = $req->fetch();
        return $app[0];
    }

		
}