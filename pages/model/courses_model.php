<?php
include_once("model.php");
include_once("lessons_model.php");

Class Course extends Model{


     public $cou_id;
     public $cou_type;
     public $cou_status;
     public $cou_fbid;
     public $lessons = [];



    /**
     * Courses constructor.
     * @param $cou_id
     * @param $cou_type
     * @param $cou_status
     * @param $cou_fbid
     */
    public function __construct($cou_id=null, $cou_type=null, $cou_status=null, $cou_fbid=null)
    {
        $this->cou_id = $cou_id;
        $this->cou_type = $cou_type;
        $this->cou_status = $cou_status;
        $this->cou_fbid = $cou_fbid;
        parent::__construct();
    }



    public static function addCourseByType($type){

        $sql='insert into courses(cou_type) values(:type)';
        $req = self::getConnection()->prepare($sql);

        $ins = $req->execute(array('type' => $type));

        $ultimoId = self::getConnection()->lastInsertId();
        return $ultimoId;

    }
    public static function addCourseByTypeAndStatus($type,$status){

        $sql='insert into courses(cou_type,cou_status) values(:type,:status)';
        $req = self::getConnection()->prepare($sql);

        $ins = $req->execute(array('type' => $type,'status' => $status));

        $ultimoId = self::getConnection()->lastInsertId();
        return $ultimoId;

    }



    public static function deleteCourse($id){
        $id = intval($id);
        $sql='DELETE from courses WHERE cou_id = :id';
        $req = self::getConnection()->prepare($sql);

        $del = $req->execute(array('id' => $id));

        $count = $req->rowCount();


        $sql1='DELETE from lessons WHERE les_course = :id';
        $req1 = self::getConnection()->prepare($sql1);

        $del1 = $req1->execute(array('id' => $id));



        return $count;

    }


    public function getCourses(){
        $selectCourses = self::getConnection()->query("SELECT * FROM courses");
        return $selectCourses;

    }

    public static function getCoursesbyType($type) {

        $selectCou = self::getConnection()->prepare('SELECT * FROM courses WHERE cou_type = :type order by cou_id desc');
        //$selectCou = $connection->prepare('SELECT * FROM courses WHERE cou_type = :type order by cou_id desc limit 20');


        $selectCou->bindParam(':type', $type, PDO::PARAM_INT);
        $selectCou->execute();

        $list = [];
        foreach($selectCou->fetchAll() as $corso) {
            $list[] = new Course($corso['cou_id'], $corso['cou_type'], $corso['cou_status'],$corso['cou_fbid']);
        }
        return $list;

    }

    public static function hasFreePlaces($cou_id) {

        $lessons=self::getLessons($cou_id);


        foreach($lessons as $les){
            //print_r ($les->les_id);
            if(Lesson::hasFreePlaces($les->les_id)){
                return true;
            }
        }
        return false;

    }

    public static function getCoursesWithLessonsByType($type) {
        $selectCou = static::getConnection()->prepare('
            SELECT * 
            FROM courses
            WHERE cou_type = :type
            order by cou_id desc
        ');
        $selectCou->bindParam(':type', $type, PDO::PARAM_INT);
        $selectCou->execute();

        $list = [];
        foreach($selectCou->fetchAll() as $corso) {
            $list[$corso['cou_id']] = new Course(
                $corso['cou_id'],
                $corso['cou_type'],
                $corso['cou_status'],
                $corso['cou_fbid']
            );
        }

        $selectLess = self::getConnection()->prepare('SELECT l.*
            FROM lessons l
            JOIN courses c ON c.cou_id = l.les_course
            WHERE c.cou_type = :type
            order by les_number'
        );
        $selectLess->bindParam(':type', $type, PDO::PARAM_INT);;
        $selectLess->execute();
        foreach($selectLess->fetchAll() as $lezione) {
            $list[$lezione['les_course']]->lessons[] = new Lesson(
                $lezione['les_id'],
                $lezione['les_course'],
                $lezione['les_ts'],
                $lezione['les_number'],
                $lezione['les_instructor']
            );
        }

        return $list;
    }


    public static function getActualCoursesWithLessons() {

        $sql='SELECT *
            FROM courses c, lessons l
            where c.cou_id = l.les_course
            and l.les_ts>=(select UNIX_TIMESTAMP())
            order by cou_type desc,cou_id desc';

        $selectCou = self::getConnection()->prepare($sql);

        $selectCou->execute();

        $list = [];
        foreach($selectCou->fetchAll() as $corso) {
            $list[$corso['cou_id']] = new Course(
                $corso['cou_id'],
                $corso['cou_type'],
                $corso['cou_status'],
                $corso['cou_fbid']
            );
        }


        $sqlLess='SELECT l.*
            FROM lessons l
            JOIN courses c ON c.cou_id = l.les_course
            where l.les_ts>=(select UNIX_TIMESTAMP())';

        $selectLess = self::getConnection()->prepare($sqlLess);

        $selectLess->execute();
        foreach($selectLess->fetchAll() as $lezione) {
            $list[$lezione['les_course']]->lessons[] = new Lesson(
                $lezione['les_id'],
                $lezione['les_course'],
                $lezione['les_ts'],
                $lezione['les_number'],
                $lezione['les_instructor']
            );
        }

        return $list;
    }


    public static function getLessons($id) {

        $id = intval($id);

        $selectLess = self::getConnection()->prepare('SELECT * FROM lessons WHERE les_course = :id order by les_number');

        $selectLess->bindParam(':id', $id, PDO::PARAM_INT);
        $selectLess->execute();

        $list = [];
        foreach($selectLess->fetchAll() as $lezione) {
            $list[] = new Lesson($lezione['les_id'], $lezione['les_course'], $lezione['les_ts'],$lezione['les_number'],$lezione['les_instructor']);
        }
        return $list;

    }




    public static function find($id) {
        // we make sure $id is an integer
        $id = intval($id);
        $req = self::getConnection()->prepare('SELECT * FROM courses WHERE cou_id = :id');

        $req->execute(array('id' => $id));
        $cou = $req->fetch();

        return new Course($cou['cou_id'], $cou['cou_type'], $cou['cou_status'],$cou['cou_fbid']);
    }




		
}
