<?php
include_once("model.php");
include_once("members_model.php");
Class Application extends Model{


     public $app_id;
     public $app_lesson;
     public $app_member_license;
     public $app_notes;
     public $app_ins;

    /**
     * Application constructor.
     * @param $app_id
     * @param $app_lesson
     * @param $app_member_license
     * @param $app_notes
     * @param $app_ins
     */
    public function __construct($app_id=null, $app_lesson=null, $app_member_license=null, $app_notes=null, $app_ins=null){
        $this->app_id = $app_id;
        $this->app_lesson = $app_lesson;
        $this->$app_member_license = $app_member_license;
        $this->app_notes = $app_notes;
        $this->app_ins = $app_ins;
    }

    public function addMemberLicenseToLesson($app_member_license, $lesson_id){
        $app_member_license = intval($app_member_license);
        $lesson_id = intval($lesson_id);
        $ins=$_SESSION["ins_id"];

        $req = parent::getConnection()->prepare('insert into applications(app_lesson,app_member_license,app_ins) values ( :lesson_id,:app_member_license,:ins)');

        $req->execute(array('app_member_license' => $app_member_license,'lesson_id' => $lesson_id,'ins' => $ins));
        $count = $req->rowCount();
        return $count;

    }


    public function getApplications(){
        $selectApplications = self::getConnection()->query("SELECT * FROM applications");
        return $selectApplications;

    }

    public static function getApplicationsByCourse($id) {
        $id = intval($id);
        $req = self::getConnection()->prepare('SELECT * FROM applications WHERE app_lesson = :id');

        $req->execute(array('id' => $id));
        $list = [];
        foreach($req->fetchAll() as $app) {

            $list[] = new Application($app['app_id'], $app['app_lesson'], $app['app_member'],$app['app_notes'],$app['app_ins']);

        }

        return $list;
    }

    public static function getLessonPresenceByCourseAndMember($lesson_number,$course_number,$member_number) {
        $id = intval($course_number);
        $mem = intval($member_number);
        $lesson_number=getLessonByNumber($lesson_number);

        $req = self::getConnection()->prepare('SELECT '.$lesson_number.' as presenza FROM applications WHERE app_course = :id
                             and app_member=:mem ' );

        $req->execute(array('id' => $id,'mem' => $mem));
        $app = $req->fetch();

        return $app['presenza'];
        //return $req;
    }




    public static function deleteMemberFromApplication($application_id) {
        $id = intval($application_id);
        $sql='DELETE from applications WHERE app_id = :id';
        $req = self::getConnection()->prepare($sql);

        $del = $req->execute(array('id' => $id));

        $count = $req->rowCount();
        return $count;
    }

    public static function getMembersByLesson($lesson_id) {
        $id = intval($lesson_id);

        $req = self::getConnection()->prepare('select m.* from members m,member_license ml,applications a 
                            where m.mem_id=ml.mem_id
                            and ml.mem_lic_id=a.member_license
                            and app_lesson=:id');

        $req->execute(array('id' => $id));

        $list = [];
        foreach($req->fetchAll() as $corso) {
            $list[] =  new Member($corso['mem_id'], $corso['mem_ts'],$corso['mem_email'], $corso['mem_firstn'],$corso['mem_lastn'], $corso['mem_title'],
                $corso['mem_address'],$corso['mem_zip'], $corso['mem_city'], $corso['mem_phone'],$corso['mem_mobile'], $corso['mem_work'],
                $corso['mem_birthdate'],$corso['mem_ins'], $corso['mem_status'],
                $corso['mem_session']);

        }
        return $list;

    }

    public static function getApplicationByLessonAndMember($lesson_id,$member_id) {
        $id = intval($lesson_id);
        $member_id = intval($member_id);
        $req = self::getConnection()->prepare('select * from applications a,member_license m 
                            where a.member_license=m.mem_lic_id
                            and m.mem_id=:member_id
                            and app_lesson=:id');

        $req->execute(array('id' => $id,'member_id' => $member_id));
        $app = $req->fetch();


        return new Application($app['app_id'], $app['app_lesson'], $app['member_license'],$app['app_notes'],$app['app_ins']);

    }
    public static function getApplicationByMember($member_id) {
        $member_id = intval($member_id);
        $req = self::getConnection()->prepare('select * from applications 
                            where app_member=:member_id');

        $req->execute(array('member_id' => $member_id));
        $app = $req->fetch();


        return new Application($app['app_id'], $app['app_lesson'], $app['app_member'],$app['app_notes'],$app['app_ins']);

    }



    public static function getMembersCountByLesson($lesson_id) {
        $id = intval($lesson_id);
       // $req = $db->prepare('SELECT count(*) as conteggio FROM applications WHERE app_course = :id group by app_course' );

        $req = self::getConnection()->prepare('select les_number,count(a.member_license) as conteggio from lessons l, applications a
                            where l.les_id=a.app_lesson
                            and les_id=:id
                            group by les_course,les_id' );


        $req->execute(array('id' => $id));
        $app = $req->fetch();

        if( is_null($app['conteggio'])){
            $app['conteggio']=0;
        }

        return $app['conteggio'];
    }


    public static function find($id) {
        // we make sure $id is an integer
        $id = intval($id);
        $req = self::getConnection()->prepare('SELECT * FROM applications WHERE app_id = :id');

        $req->execute(array('id' => $id));
        $app = $req->fetch();


        return new Application($app['app_id'], $app['app_lesson'], $app['app_member'],$app['app_notes'],$app['app_ins']);
    }




		
}
