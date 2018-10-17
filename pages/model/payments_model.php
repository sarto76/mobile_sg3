<?php
include_once("model.php");

Class Payment extends Model{


     public $pay_id;
     public $pay_ts;
     public $pay_member;
     public $pay_course;
     public $pay_instructor;
     public $pay_amount;

    /**
     * Payment constructor.
     * @param $pay_id
     * @param $pay_ts
     * @param $pay_member
     * @param $pay_course
     * @param $pay_instructor
     * @param $pay_amount
     */
    public function __construct($pay_id=null, $pay_ts=null, $pay_member=null, $pay_course=null, $pay_instructor=null, $pay_amount=null)
    {
        $this->pay_id = $pay_id;
        $this->pay_ts = $pay_ts;
        $this->pay_member = $pay_member;
        $this->pay_course = $pay_course;
        $this->pay_instructor = $pay_instructor;
        $this->pay_amount = $pay_amount;
        parent::__construct();
    }


    public static function getPaymentsByInstructorId($id) {
        $id = intval($id);
        $selectPay = self::getConnection()->prepare('SELECT * FROM payments WHERE pay_instructor = :id');

        $selectPay->bindParam(':id', $id, PDO::PARAM_INT);
        $selectPay->execute();

        $list = [];
        foreach($selectPay->fetchAll() as $pag) {
            $list[] = new Payment($pag['pay_id'], $pag['pay_ts'], $pag['pay_member'],$pag['pay_course'],$pag['pay_instructor'],$pag['$pay_amount']);
        }

        return $list;
    }

    public static function getPaymentsByMemberId($id) {
        $id = intval($id);
        $selectPay = self::getConnection()->prepare('SELECT * FROM payments WHERE pay_member = :id');

        $selectPay->bindParam(':id', $id, PDO::PARAM_INT);
        $selectPay->execute();

        $list = [];
        foreach($selectPay->fetchAll() as $pag) {
            $list[] = new Payment($pag['pay_id'], $pag['pay_ts'], $pag['pay_member'],$pag['pay_course'],$pag['pay_instructor'],$pag['$pay_amount']);
        }

        return $list;
    }


    public static function getPaymentsByMemberAndCourseId($member_id,$course_id) {
        $member_id = intval($member_id);
        $course_id= intval($course_id);
        $req = self::getConnection()->prepare('SELECT * FROM payments WHERE pay_member = :member_id and pay_course= :course_id');

        $req->execute(array('member_id' => $member_id,'course_id' => $course_id));
        $pag = $req->fetch();


        return new Payment($pag['pay_id'], $pag['pay_ts'], $pag['pay_member'],$pag['pay_course'],$pag['pay_instructor'],$pag['pay_amount']);
    }



    public static function find($id) {
        $id = intval($id);
        $req = self::getConnection()->prepare('SELECT * FROM payments WHERE pay_id = :id');

        $req->execute(array('id' => $id));
        $pag = $req->fetch();


        return new Payment($pag['pay_id'], $pag['pay_ts'], $pag['pay_member'],$pag['pay_course'],$pag['pay_instructor'],$pag['$pay_amount']);
    }




		
}
