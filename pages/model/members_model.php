<?php
include_once("connection.php");
include_once("model.php");

Class Member extends Model{


     public $mem_id;
     public $mem_ts;
    public  $mem_email;
     public $mem_firstn;
     public $mem_lastn;
     public $mem_title;
     public $mem_address;
     public $mem_zip;
     public $mem_city;
     public $mem_phone;
     public $mem_mobile,$mem_work;
     public $mem_birthdate;
     public $mem_ins;
     public $mem_lic_cat;
     public $mem_lic_pin;
     public $mem_lic_ts;
     public $mem_status;
     public $mem_session;

    /**
     * Member constructor.
     * @param $mem_id
     * @param $mem_ts
     * @param $mem_email
     * @param $mem_firstn
     * @param $mem_lastn
     * @param $mem_title
     * @param $mem_address
     * @param $mem_zip
     * @param $mem_city
     * @param $mem_phone
     * @param $mem_mobile
     * @param $mem_work
     * @param $mem_birthdate
     * @param $mem_ins
     * @param $mem_lic_cat
     * @param $mem_lic_pin
     * @param $mem_lic_ts
     * @param $mem_status
     * @param $mem_session
     */
    public function __construct($mem_id=null, $mem_ts=null,$mem_email=null, $mem_firstn=null, $mem_lastn=null, $mem_title=null,
                                $mem_address=null, $mem_zip=null, $mem_city=null, $mem_phone=null, $mem_mobile=null,
                                $mem_work=null, $mem_birthdate=null, $mem_ins=null, $mem_lic_cat=null, $mem_lic_pin=null,
                                $mem_lic_ts=null, $mem_status=null, $mem_session=null)
    {
        $this->mem_id = $mem_id;
        $this->mem_ts = $mem_ts;
        $this->mem_email = $mem_email;
        $this->mem_firstn = $mem_firstn;
        $this->mem_lastn = $mem_lastn;
        $this->mem_title = $mem_title;
        $this->mem_address = $mem_address;
        $this->mem_zip = $mem_zip;
        $this->mem_city = $mem_city;
        $this->mem_phone = $mem_phone;
        $this->mem_mobile = $mem_mobile;
        $this->mem_work = $mem_work;
        $this->mem_birthdate = $mem_birthdate;
        $this->mem_ins = $mem_ins;
        $this->mem_lic_cat = $mem_lic_cat;
        $this->mem_lic_pin = $mem_lic_pin;
        $this->mem_lic_ts = $mem_lic_ts;
        $this->mem_status = $mem_status;
        $this->mem_session = $mem_session;
    }




    function getFirstname(){
		return $this->mem_firstn;
	}

    public static function updateMember($mem_id, $mem_ts='',$mem_email='', $mem_firstn='', $mem_lastn='', $mem_title='',
                                        $mem_address='', $mem_zip='', $mem_city='', $mem_phone='', $mem_mobile='',
                                        $mem_work='', $mem_birthdate='', $mem_ins='', $mem_lic_cat='', $mem_lic_pin='',
                                        $mem_lic_ts='', $mem_status='', $mem_session=''){
        $db=Database::get();
        $id = intval($mem_id);

        $sql='update members set mem_ts=:mem_ts, mem_email=:mem_email,mem_firstn=:mem_firstn,mem_lastn=:mem_lastn,mem_title=:mem_title,mem_address=:mem_address,
                                  mem_zip=:mem_zip,mem_city=:mem_city,mem_phone=:mem_phone,mem_mobile=:mem_mobile,mem_work=:mem_work,mem_birthdate=:mem_birthdate,
                                  mem_ins=:mem_ins,mem_lic_cat=:mem_lic_cat,mem_lic_pin=:mem_lic_pin,mem_lic_ts=:mem_lic_ts,mem_status=:mem_status,mem_session=:mem_session
                                  where mem_id=:id';



        $req = $db->prepare($sql);
        $req->bindParam(':mem_ts', $mem_ts, PDO::PARAM_STR);
        $req->bindParam(':mem_email', $mem_email, PDO::PARAM_STR);
        $req->bindParam(':mem_firstn', $mem_firstn, PDO::PARAM_STR);
        $req->bindParam(':mem_lastn', $mem_lastn, PDO::PARAM_STR);
        $req->bindParam(':mem_title', $mem_title, PDO::PARAM_STR);
        $req->bindParam(':mem_address', $mem_address, PDO::PARAM_STR);
        $req->bindParam(':mem_zip', $mem_zip, PDO::PARAM_STR);
        $req->bindParam(':mem_city', $mem_city, PDO::PARAM_STR);
        $req->bindParam(':mem_phone', $mem_phone, PDO::PARAM_STR);
        $req->bindParam(':mem_mobile', $mem_mobile, PDO::PARAM_STR);
        $req->bindParam(':mem_work', $mem_work, PDO::PARAM_STR);
        $req->bindParam(':mem_birthdate', $mem_birthdate, PDO::PARAM_STR);
        $req->bindParam(':mem_ins', $mem_ins, PDO::PARAM_STR);
        $req->bindParam(':mem_lic_cat', $mem_lic_cat, PDO::PARAM_STR);
        $req->bindParam(':mem_lic_pin', $mem_lic_pin, PDO::PARAM_STR);
        $req->bindParam(':mem_lic_ts', $mem_lic_ts, PDO::PARAM_STR);
        $req->bindParam(':mem_status', $mem_status, PDO::PARAM_STR);
        $req->bindParam(':mem_session', $mem_session, PDO::PARAM_STR);
        $req->bindParam(':id', $id, PDO::PARAM_INT);

        $up = $req->execute();
        return $up;

    }

    public static function addMember($mem_ts='',$mem_email='', $mem_firstn='', $mem_lastn='', $mem_title='',
                                        $mem_address='', $mem_zip='', $mem_city='', $mem_phone='', $mem_mobile='',
                                        $mem_work='', $mem_birthdate='', $mem_ins='', $mem_lic_cat='', $mem_lic_pin='',
                                        $mem_lic_ts='', $mem_status='', $mem_session=''){
        $db=Database::get();


        $sql='insert into members (mem_ts,mem_email,mem_firstn,mem_lastn,mem_title,mem_address,mem_zip,mem_city,mem_phone,mem_mobile,mem_work,mem_birthdate,
                                   mem_ins,mem_lic_cat,mem_lic_pin,mem_lic_ts,mem_status,mem_session)
                           values (:mem_ts,:mem_email,:mem_firstn,:mem_lastn,:mem_title,:mem_address,
                                  :mem_zip,:mem_city,:mem_phone,:mem_mobile,:mem_work,:mem_birthdate,
                                  :mem_ins,:mem_lic_cat,:mem_lic_pin,:mem_lic_ts,:mem_status,:mem_session)';



        $req = $db->prepare($sql);
        $req->bindParam(':mem_ts', $mem_ts, PDO::PARAM_STR);
        $req->bindParam(':mem_email', $mem_email, PDO::PARAM_STR);
        $req->bindParam(':mem_firstn', $mem_firstn, PDO::PARAM_STR);
        $req->bindParam(':mem_lastn', $mem_lastn, PDO::PARAM_STR);
        $req->bindParam(':mem_title', $mem_title, PDO::PARAM_STR);
        $req->bindParam(':mem_address', $mem_address, PDO::PARAM_STR);
        $req->bindParam(':mem_zip', $mem_zip, PDO::PARAM_STR);
        $req->bindParam(':mem_city', $mem_city, PDO::PARAM_STR);
        $req->bindParam(':mem_phone', $mem_phone, PDO::PARAM_STR);
        $req->bindParam(':mem_mobile', $mem_mobile, PDO::PARAM_STR);
        $req->bindParam(':mem_work', $mem_work, PDO::PARAM_STR);
        $req->bindParam(':mem_birthdate', $mem_birthdate, PDO::PARAM_STR);
        $req->bindParam(':mem_ins', $mem_ins, PDO::PARAM_STR);
        $req->bindParam(':mem_lic_cat', $mem_lic_cat, PDO::PARAM_STR);
        $req->bindParam(':mem_lic_pin', $mem_lic_pin, PDO::PARAM_STR);
        $req->bindParam(':mem_lic_ts', $mem_lic_ts, PDO::PARAM_STR);
        $req->bindParam(':mem_status', $mem_status, PDO::PARAM_STR);
        $req->bindParam(':mem_session', $mem_session, PDO::PARAM_STR);


        $up = $req->execute();

        $ultimoId = $db->lastInsertId();
        return $ultimoId;
        return $ultimoId;

    }



    public static function getMembers() {
        $connection=Database::get();

        $selectMem = $connection->query("SELECT * FROM members");

        $list = [];
        foreach($selectMem->fetchAll() as $post) {
            $list[] = new Member($post['mem_id'], $post['mem_ts'],$post['mem_email'], $post['mem_firstn'],$post['mem_lastn'], $post['mem_title'],
                $post['mem_address'],$post['mem_zip'], $post['mem_city'], $post['mem_phone'],$post['mem_mobile'], $post['mem_work'],
                $post['mem_birthdate'],$post['mem_ins'], $post['mem_lic_cat'], $post['mem_lic_pin'],$post['mem_lic_ts'], $post['mem_status'],
                $post['mem_session']);
        }
        return $list;

    }
	 


    public static function find($id) {
        $db=Database::get();
        // we make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM members WHERE mem_id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $post = $req->fetch();

        return new Member($post['mem_id'], $post['mem_ts'],$post['mem_email'], $post['mem_firstn'],$post['mem_lastn'], $post['mem_title'],
            $post['mem_address'],$post['mem_zip'], $post['mem_city'], $post['mem_phone'],$post['mem_mobile'], $post['mem_work'],
            $post['mem_birthdate'],$post['mem_ins'], $post['mem_lic_cat'], $post['mem_lic_pin'],$post['mem_lic_ts'], $post['mem_status'],
            $post['mem_session']);
    }



    public function getMemberById($id){

        $connection=Database::get();

		$sql='SELECT mem_id,mem_ts,mem_email,mem_firstn, mem_lastn,mem_title,mem_address,mem_zip,mem_city,mem_phone,mem_mobile,mem_work,mem_birthdate,mem_ins,mem_lic_cat,mem_lic_pin,mem_lic_ts,mem_status,mem_session FROM members where mem_id=:id';
		$result=$connection->prepare($sql);
		
		//inserisco i parametri
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		
		//eseguo la query
		$result->execute();	
		
		/*
		$row = $result->fetch();
		$connection=null;	
		return $row;
		*/
		
		
		$array = $result->fetch(PDO::FETCH_ASSOC);
		print_r($array);
        if (is_array($array) || is_object($array)){
			foreach ($array as $key => $value) {
				 $this->$key = $value;
				 
			}

		}
		
	} 
		
}
