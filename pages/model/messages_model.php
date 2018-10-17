<?php
include_once("model.php");

Class Message extends Model{
	
	 public $msg_id;
     public $msg_ts;
     public $msg_type;
     public $msg_mem;
     public $msg_ins;
     public $msg_text;
     public $msg_mem_full;
 
 
	 public function __construct($msg_id=null, $msg_ts=null, $msg_type=null,$msg_mem=null, $msg_ins=null, $msg_text=null) {
      $this->msg_id      = $msg_id;
      $this->msg_ts  	 = $msg_ts;
      $this->msg_type = $msg_type;
      $this->msg_mem      = $msg_mem;
      $this->msg_ins  = $msg_ins;
      $this->msg_text = $msg_text;
      parent::__construct();
    }

/*
public function __construct() {
      
    }
  */

    public function getMessagesByType($type){

        $selectMess = parent::getConnection()->prepare("SELECT msg_id,msg_ts,
											msg_type,msg_mem,msg_ins,msg_text 
											FROM messages me left join members m 
											on me.msg_mem=m.mem_id 
											WHERE msg_type =:type ORDER BY msg_ts DESC");

        $selectMess->bindParam(':type', $type, PDO::PARAM_INT);
        $selectMess->execute();

        $list = [];
        foreach($selectMess->fetchAll() as $messaggio) {
            $list[] = new Message($messaggio['msg_id'], $messaggio['msg_ts'], $messaggio['msg_type'],
                $messaggio['msg_mem'], $messaggio['msg_ins'], $messaggio['msg_text']);
        }

        return $list;
    }

    
    
	 function getMessages(){
		//$query="SELECT * FROM messages where true"
		$selectMess = parent::getConnection()->query("SELECT * FROM messages ORDER BY msg_ts DESC");
        return $selectMess;
        
		
	 }

    /*
    function getMessagesByType_old($type){
        $connection= new Database();

        //$selectMess = $connection->prepare("SELECT msg_id,msg_ts,msg_type,msg_mem,msg_ins,msg_text FROM messages WHERE msg_type =:type ORDER BY msg_ts DESC");
        $selectMess = $connection->prepare("SELECT msg_id,msg_ts,
											msg_type,msg_mem,concat (mem_firstn,' ',mem_lastn) as msg_mem_full,
											msg_ins,msg_text 
											FROM messages me left join members m 
											on me.msg_mem=m.mem_id 
											WHERE msg_type =:type ORDER BY msg_ts DESC");






        $selectMess->bindParam(':type', $type, PDO::PARAM_INT);
        $selectMess->execute();

        $list = [];
        foreach($selectMess->fetchAll() as $messaggio) {
            $list[] = new Message($messaggio['msg_id'], $messaggio['msg_ts'], $messaggio['msg_type'],$messaggio['msg_mem'],$messaggio['msg_mem_full'], $messaggio['msg_ins'], $messaggio['msg_text']);
        }

        return $list;
        $connection=null;
    }
    */





    public static function find($id) {

        $id = intval($id);
        $req = self::getConnection()->prepare('SELECT * FROM messages WHERE msg_id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $messaggio = $req->fetch();

        return  new Message($messaggio['msg_id'], $messaggio['msg_ts'], $messaggio['msg_type'],$messaggio['msg_mem'], $messaggio['msg_ins'], $messaggio['msg_text']);

    }

	 
	 
	public function getId()
    {
        return $this->msg_id;
    }

    public function setId($msg_id)
    {
        $this->msg_id = $msg_id;
    }

    public function getTs()
    {
        return $this->msg_ts;
    }

    public function setName($msg_ts)
    {
        $this->msg_ts = $msg_ts;
    }
    
    public function getType()
    {
        return $this->msg_type;
    }

    public function setType($msg_type)
    {
        $this->msg_type = $msg_type;
    }
    public function getMem()
    {
        return $this->msg_mem;
    }

    public function setMem($msg_mem)
    {
        $this->msg_mem = $msg_mem;
    }
	public function getIns()
    {
        return $this->msg_ins;
    }

    public function setIns($msg_ins)
    {
        $this->msg_ins = $msg_ins;
    }
    public function getText()
    {
        return $this->msg_text;
    }

    public function setText($msg_text)
    {
        $this->msg_text = $msg_text;
    }


}
