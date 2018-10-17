<?php
include_once("model.php");

Class Instructor extends Model{


     public $ins_id;
     public $ins_init;
     public $ins_lastn;
     public $ins_firstn;
     public $ins_email;
     public $ins_mobile;
     public $ins_pass;
     public $ins_session;
     public $ins_status;
     public $ins_pushover;
     public $ins_label;
     public $ins_rank;
     public $ins_portrait;

    /**
     * Instructor constructor.
     * @param $ins_id
     * @param $ins_init
     * @param $ins_lastn
     * @param $ins_firstn
     * @param $ins_email
     * @param $ins_mobile
     * @param $ins_pass
     * @param $ins_session
     * @param $ins_status
     * @param $ins_pushover
     * @param $ins_label
     * @param $ins_rank
     * @param $ins_portrait
     */
    public function __construct($ins_id=null, $ins_init=null, $ins_lastn=null, $ins_firstn=null, $ins_email=null, $ins_mobile=null,
                                $ins_pass=null, $ins_session=null, $ins_status=null, $ins_pushover=null, $ins_label=null,
                                $ins_rank=null, $ins_portrait=null)
    {
        $this->ins_id = $ins_id;
        $this->ins_init = $ins_init;
        $this->ins_lastn = $ins_lastn;
        $this->ins_firstn = $ins_firstn;
        $this->ins_email = $ins_email;
        $this->ins_mobile = $ins_mobile;
        $this->ins_pass = $ins_pass;
        $this->ins_session = $ins_session;
        $this->ins_status = $ins_status;
        $this->ins_pushover = $ins_pushover;
        $this->ins_label = $ins_label;
        $this->ins_rank = $ins_rank;
        $this->ins_portrait = $ins_portrait;
        parent::__construct();
    }

    public function login($username,$pass)
    {
        //session_start();
        $codestr="";
        // Generate Random Code
        for ($i = 1; $i <= 12; $i++) {
            $textornumber = rand(1,2);
            if ($textornumber == 1) {
                $codestr .= chr(rand(48,57));
            }
            if($textornumber == 2) {
                $codestr .= chr(rand(65,90));
            }
        }

        //$connection=$this->getConnection();
        $sql = 'SELECT * FROM instructors WHERE ins_init=:username AND ins_pass=:pass';

        $result=parent::getConnection()->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':pass', $pass, PDO::PARAM_STR);

        $result->execute();
        $righe = $result->fetch();
        $result=null;


        if ($righe >0) {

            $l_code = time()."_".$codestr;
            $_SESSION["l_session"] = $l_code;
            $_SESSION["ins_id"] =$righe['ins_id'] ;
            parent::getConnection()->query("UPDATE instructors SET ins_session = '$l_code' WHERE ins_init = '$username'");
            //header('Location:home.php');
            return true;

        }
        else {
            //$l_error = "Utente o password non corretti";
            $l_error ='<div class="alert alert-danger">Utente o password non corretti</div>';
            return false;
        }

    }

    public function is_loggedin()
    {
        if(isset($_SESSION['l_session']))
        {
            return true;
        }
    }

    public function redirect($url)
    {
        //header("Location: $url");

        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';

    }

    public static function logout()
    {
        session_destroy();
        unset($_SESSION['l_session']);
        return true;

    }


    public function getInstructors(){
		$selectMem = parent::getConnection()->query("SELECT * FROM instructors");

      return $selectMem;
		
	 }

    public static function find($id) {
        $db=Database::get();
        // we make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM instructors WHERE ins_id = :id');

        $req->execute(array('id' => $id));
        $ins = $req->fetch();


        return new Instructor($ins['ins_id'], $ins['ins_init'], $ins['ins_lastn'],$ins['ins_firstn'], $ins['ins_email'],
            $ins['ins_mobile'],$ins['ins_pass'], $ins['ins_session'], $ins['ins_status'],$ins['ins_pushover'], $ins['ins_label'],
            $ins['ins_rank'],$ins['ins_portrait']);
    }

    public static function getAll() {
        $req = self::getConnection()->prepare('SELECT * FROM instructors where ins_status=1');

        $req->execute();
        $list = [];
        foreach($req->fetchAll() as $ins) {
            $list[] = new Instructor($ins['ins_id'], $ins['ins_init'], $ins['ins_lastn'],$ins['ins_firstn'], $ins['ins_email'],
                $ins['ins_mobile'],$ins['ins_pass'], $ins['ins_session'], $ins['ins_status'],$ins['ins_pushover'], $ins['ins_label'],
                $ins['ins_rank'],$ins['ins_portrait']);
        }
        return $list;
    }

    public static function changePass($id,$pass){

        $id = intval($id);
        $sql='UPDATE instructors set ins_pass=:pass WHERE ins_id = :id';
        $req = self::getConnection()->prepare($sql);

        $count = $req->execute(array('id' => $id,'pass'=> $pass));

        return $count;

    }



		
}
