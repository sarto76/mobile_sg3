<?php
include_once("model.php");
include_once("settings_model.php");
include_once("courses_model.php");
include_once("applications_model.php");

Class Lesson extends Model{


     public $les_id;
     public $les_course;
     public $les_ts;
     public $les_number;
     public $les_instructor;
    public $les_status;

    /**
     * Lesson constructor.
     * @param $les_id
     * @param $les_course
     * @param $les_ts
     * @param $les_number
     * @param $les_instructor
     */
    public function __construct($les_id=null, $les_course=null, $les_ts=null, $les_number=null, $les_instructor=null,$les_status=null)
    {
        $this->les_id = $les_id;
        $this->les_course = $les_course;
        $this->les_ts = $les_ts;
        $this->les_number = $les_number;
        $this->les_instructor = $les_instructor;
        $this->les_status = $les_status;
        parent::__construct();
    }



    public static function find($id) {
        $id = intval($id);
        $req = self::getConnection()->prepare('SELECT * FROM lessons WHERE les_id = :id');

        $req->execute(array('id' => $id));
        $les = $req->fetch();


        return new Lesson($les['les_id'], $les['les_course'], $les['les_ts'],$les['les_number'],$les['les_instructor'],$les['les_status']);
    }



    public static function insertLesson($les_course,$les_ts,$les_number,$les_instructor,$les_status) {

        $sql='insert into lessons(les_course,les_ts,les_number,les_instructor,les_status) values(:les_course,:les_ts,:les_number,:les_instructor,:les_status)';
        $req = self::getConnection()->prepare($sql);

        $ins = $req->execute(array('les_course' => $les_course,'les_ts' => $les_ts,'les_number' => $les_number,'les_instructor' => $les_instructor
                                ,'les_status' => $les_status));

        $count = $req->rowCount();
        return $count;


    }

    public static function updateLesson($les_id,$les_ts,$les_instructor,$les_status) {

        $sql='update lessons set les_ts=:les_ts,les_instructor=:les_instructor,les_status=:les_status where les_id=:les_id';
        $req = self::getConnection()->prepare($sql);

        $ins = $req->execute(array('les_ts' => $les_ts,'les_instructor' => $les_instructor,'les_status' => $les_status,'les_id' => $les_id));
        $count = $req->rowCount();
        return $count;
    }

    public static function deleteLessonByCourse($les_course) {

        $sql='delete from lessons where les_course=:les_course';
        $req = self::getConnection()->prepare($sql);

        $ins = $req->execute(array('les_course' => $les_course));

        $count = $req->rowCount();
        return $count;
    }


    public static function hasFreePlaces($les_id) {
        $lesson=self::find($les_id);
        $course=Course::find($lesson->les_course);

        $numtot=new Setting();
        $maxall=$numtot->getValueByName($course->cou_type."_max");

        $presenze=Application::getMembersCountByLesson($lesson->les_id);


        if($presenze<$maxall){
            return true;
        }
        else{
            return false;
        }



    }


		
}
