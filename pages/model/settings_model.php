<?php
include_once("model.php");

Class Setting extends Model{


public $sam_hour;
public $sam_min;
public $sen_hour;
public $sen_min;
public $sam_ins;
public $mot_hour;
public $mot_min;
public $mos_hour;
public $mos_min;
public $sam_gap_1;
public $sam_gap_2;
public $sen_gap_1;
public $sen_gap_2;
public $sen_gap_3;
public $mot_gap_1;
public $mot_gap_2;
public $mos_gap_1;
public $sam_max;
public $sen_max;
public $mot_max;
public $mos_max;
public $sg3_phone;
public $sg3_email;
public $app_buffer;
public $app_lima;
public $sg3_address;
public $sg3_zip;
public $sg3_city;
public $pay_currency;
public $pay_sam;
public $pay_sen;
public $pay_teo_long;
public $pay_mot;
public $pay_mos;
public $teo_days;
public $teo_hours;
public $teo_fee;
public $pho_dir;
public $sg3_title;
public $fb_pageid;
public $sg3_www;
public $tcs_www;
public $sg3_news;
public $pho_ftp;
public $pho_user;
public $pho_pass;
public $pho_base;
public $sg3_admin;
public $fb_appid;
public $fb_secret;
public $fb_token;
public $fb_redirect;
public $sg3_panel;
public $fb_scope;
public $sg3_pushover;
public $fb_authuser;
public $sg3_loc_open;
public $sg3_loc_close;
public $cou_sam_hours;
public $cou_teo_hours;
public $cou_sen_hours;
public $cou_mot_hours;
public $foo_email;
public $app_terms;
public $pay_aut;
public $tel_country;
public $foo_site;
public $fb_page;
public $pay_sf1;
public $pay_sf2;
public $sg3_noreply;
public $car_speed;
public $sg3_page_title;
public $sg3_page_desc;
public $pay_teo_short;


    /**
     * Settings constructor.
     * @param $sam_hour
     * @param $sam_min
     * @param $sen_hour
     * @param $sen_min
     * @param $sam_ins
     * @param $mot_hour
     * @param $mot_min
     * @param $mos_hour
     * @param $mos_min
     * @param $sam_gap_1
     * @param $sam_gap_2
     * @param $sen_gap_1
     * @param $sen_gap_2
     * @param $sen_gap_3
     * @param $mot_gap_1
     * @param $mot_gap_2
     * @param $mos_gap_1
     * @param $sam_max
     * @param $sen_max
     * @param $mot_max
     * @param $mos_max
     * @param $sg3_phone
     * @param $sg3_email
     * @param $app_buffer
     * @param $app_lima
     * @param $sg3_address
     * @param $sg3_zip
     * @param $sg3_city
     * @param $pay_currency
     * @param $pay_sam
     * @param $pay_sen
     * @param $pay_teo_long
     * @param $pay_mot
     * @param $pay_mos
     * @param $teo_days
     * @param $teo_hours
     * @param $teo_fee
     * @param $pho_dir
     * @param $sg3_title
     * @param $fb_pageid
     * @param $sg3_www
     * @param $tcs_www
     * @param $sg3_news
     * @param $pho_ftp
     * @param $pho_user
     * @param $pho_pass
     * @param $pho_base
     * @param $sg3_admin
     * @param $fb_appid
     * @param $fb_secret
     * @param $fb_token
     * @param $fb_redirect
     * @param $sg3_panel
     * @param $fb_scope
     * @param $sg3_pushover
     * @param $fb_authuser
     * @param $sg3_loc_open
     * @param $sg3_loc_close
     * @param $cou_sam_hours
     * @param $cou_teo_hours
     * @param $cou_sen_hours
     * @param $cou_mot_hours
     * @param $foo_email
     * @param $app_terms
     * @param $pay_aut
     * @param $tel_country
     * @param $foo_site
     * @param $fb_page
     * @param $pay_sf1
     * @param $pay_sf2
     * @param $sg3_noreply
     * @param $car_speed
     * @param $sg3_page_title
     * @param $sg3_page_desc
     * @param $pay_teo_short
     */
    public function __construct($sam_hour=null, $sam_min=null, $sen_hour=null, $sen_min=null, $sam_ins=null, $mot_hour=null, $mot_min=null, $mos_hour=null, $mos_min=null, $sam_gap_1=null, $sam_gap_2=null, $sen_gap_1=null, $sen_gap_2=null, $sen_gap_3=null, $mot_gap_1=null, $mot_gap_2=null, $mos_gap_1=null, $sam_max=null, $sen_max=null, $mot_max=null, $mos_max=null, $sg3_phone=null, $sg3_email=null, $app_buffer=null, $app_lima=null, $sg3_address=null, $sg3_zip=null, $sg3_city=null, $pay_currency=null, $pay_sam=null, $pay_sen=null, $pay_teo_long=null, $pay_mot=null, $pay_mos=null, $teo_days=null, $teo_hours=null, $teo_fee=null, $pho_dir=null, $sg3_title=null, $fb_pageid=null, $sg3_www=null, $tcs_www=null, $sg3_news=null, $pho_ftp=null, $pho_user=null, $pho_pass=null, $pho_base=null, $sg3_admin=null, $fb_appid=null, $fb_secret=null, $fb_token=null, $fb_redirect=null, $sg3_panel=null, $fb_scope=null, $sg3_pushover=null, $fb_authuser=null, $sg3_loc_open=null, $sg3_loc_close=null, $cou_sam_hours=null, $cou_teo_hours=null, $cou_sen_hours=null, $cou_mot_hours=null, $foo_email=null, $app_terms=null, $pay_aut=null, $tel_country=null, $foo_site=null, $fb_page=null, $pay_sf1=null, $pay_sf2=null, $sg3_noreply=null, $car_speed=null, $sg3_page_title=null, $sg3_page_desc=null, $pay_teo_short=null)
    {

        $this->sam_hour = $sam_hour;
        $this->sam_min = $sam_min;
        $this->sen_hour = $sen_hour;
        $this->sen_min = $sen_min;
        $this->sam_ins = $sam_ins;
        $this->mot_hour = $mot_hour;
        $this->mot_min = $mot_min;
        $this->mos_hour = $mos_hour;
        $this->mos_min = $mos_min;
        $this->sam_gap_1 = $sam_gap_1;
        $this->sam_gap_2 = $sam_gap_2;
        $this->sen_gap_1 = $sen_gap_1;
        $this->sen_gap_2 = $sen_gap_2;
        $this->sen_gap_3 = $sen_gap_3;
        $this->mot_gap_1 = $mot_gap_1;
        $this->mot_gap_2 = $mot_gap_2;
        $this->mos_gap_1 = $mos_gap_1;
        $this->sam_max = $sam_max;
        $this->sen_max = $sen_max;
        $this->mot_max = $mot_max;
        $this->mos_max = $mos_max;
        $this->sg3_phone = $sg3_phone;
        $this->sg3_email = $sg3_email;
        $this->app_buffer = $app_buffer;
        $this->app_lima = $app_lima;
        $this->sg3_address = $sg3_address;
        $this->sg3_zip = $sg3_zip;
        $this->sg3_city = $sg3_city;
        $this->pay_currency = $pay_currency;
        $this->pay_sam = $pay_sam;
        $this->pay_sen = $pay_sen;
        $this->pay_teo_long = $pay_teo_long;
        $this->pay_mot = $pay_mot;
        $this->pay_mos = $pay_mos;
        $this->teo_days = $teo_days;
        $this->teo_hours = $teo_hours;
        $this->teo_fee = $teo_fee;
        $this->pho_dir = $pho_dir;
        $this->sg3_title = $sg3_title;
        $this->fb_pageid = $fb_pageid;
        $this->sg3_www = $sg3_www;
        $this->tcs_www = $tcs_www;
        $this->sg3_news = $sg3_news;
        $this->pho_ftp = $pho_ftp;
        $this->pho_user = $pho_user;
        $this->pho_pass = $pho_pass;
        $this->pho_base = $pho_base;
        $this->sg3_admin = $sg3_admin;
        $this->fb_appid = $fb_appid;
        $this->fb_secret = $fb_secret;
        $this->fb_token = $fb_token;
        $this->fb_redirect = $fb_redirect;
        $this->sg3_panel = $sg3_panel;
        $this->fb_scope = $fb_scope;
        $this->sg3_pushover = $sg3_pushover;
        $this->fb_authuser = $fb_authuser;
        $this->sg3_loc_open = $sg3_loc_open;
        $this->sg3_loc_close = $sg3_loc_close;
        $this->cou_sam_hours = $cou_sam_hours;
        $this->cou_teo_hours = $cou_teo_hours;
        $this->cou_sen_hours = $cou_sen_hours;
        $this->cou_mot_hours = $cou_mot_hours;
        $this->foo_email = $foo_email;
        $this->app_terms = $app_terms;
        $this->pay_aut = $pay_aut;
        $this->tel_country = $tel_country;
        $this->foo_site = $foo_site;
        $this->fb_page = $fb_page;
        $this->pay_sf1 = $pay_sf1;
        $this->pay_sf2 = $pay_sf2;
        $this->sg3_noreply = $sg3_noreply;
        $this->car_speed = $car_speed;
        $this->sg3_page_title = $sg3_page_title;
        $this->sg3_page_desc = $sg3_page_desc;
        $this->pay_teo_short = $pay_teo_short;
        parent::__construct();
    }




    public function getValueByName($name){
        $req = parent::getConnection()->prepare('SELECT set_value FROM settings WHERE set_name = :name' );

        $req->execute(array('name' => $name));
        $set = $req->fetch();
        return $set['set_value'];
    }



    public function getSettings(){

        $selectSettings = parent::getConnection()->query("SELECT * FROM settings");

        $connection=null;
        return $selectSettings;

    }

    /**
     * @return null
     */
    public function getSamHour()
    {
        return $this->sam_hour;
    }

    /**
     * @param null $sam_hour
     */
    public function setSamHour($sam_hour)
    {
        $this->sam_hour = $sam_hour;
    }

    /**
     * @return null
     */
    public function getSamMin()
    {
        return $this->sam_min;
    }

    /**
     * @param null $sam_min
     */
    public function setSamMin($sam_min)
    {
        $this->sam_min = $sam_min;
    }

    /**
     * @return null
     */
    public function getSenHour()
    {
        return $this->sen_hour;
    }

    /**
     * @param null $sen_hour
     */
    public function setSenHour($sen_hour)
    {
        $this->sen_hour = $sen_hour;
    }

    /**
     * @return null
     */
    public function getSenMin()
    {
        return $this->sen_min;
    }

    /**
     * @param null $sen_min
     */
    public function setSenMin($sen_min)
    {
        $this->sen_min = $sen_min;
    }

    /**
     * @return null
     */
    public function getSamIns()
    {
        return $this->sam_ins;
    }

    /**
     * @param null $sam_ins
     */
    public function setSamIns($sam_ins)
    {
        $this->sam_ins = $sam_ins;
    }

    /**
     * @return null
     */
    public function getMotHour()
    {
        return $this->mot_hour;
    }

    /**
     * @param null $mot_hour
     */
    public function setMotHour($mot_hour)
    {
        $this->mot_hour = $mot_hour;
    }

    /**
     * @return null
     */
    public function getMotMin()
    {
        return $this->mot_min;
    }

    /**
     * @param null $mot_min
     */
    public function setMotMin($mot_min)
    {
        $this->mot_min = $mot_min;
    }

    /**
     * @return null
     */
    public function getMosHour()
    {
        return $this->mos_hour;
    }

    /**
     * @param null $mos_hour
     */
    public function setMosHour($mos_hour)
    {
        $this->mos_hour = $mos_hour;
    }

    /**
     * @return null
     */
    public function getMosMin()
    {
        return $this->mos_min;
    }

    /**
     * @param null $mos_min
     */
    public function setMosMin($mos_min)
    {
        $this->mos_min = $mos_min;
    }

    /**
     * @return null
     */
    public function getSamGap1()
    {
        return $this->sam_gap_1;
    }

    /**
     * @param null $sam_gap_1
     */
    public function setSamGap1($sam_gap_1)
    {
        $this->sam_gap_1 = $sam_gap_1;
    }

    /**
     * @return null
     */
    public function getSamGap2()
    {
        return $this->sam_gap_2;
    }

    /**
     * @param null $sam_gap_2
     */
    public function setSamGap2($sam_gap_2)
    {
        $this->sam_gap_2 = $sam_gap_2;
    }

    /**
     * @return null
     */
    public function getSenGap1()
    {
        return $this->sen_gap_1;
    }

    /**
     * @param null $sen_gap_1
     */
    public function setSenGap1($sen_gap_1)
    {
        $this->sen_gap_1 = $sen_gap_1;
    }

    /**
     * @return null
     */
    public function getSenGap2()
    {
        return $this->sen_gap_2;
    }

    /**
     * @param null $sen_gap_2
     */
    public function setSenGap2($sen_gap_2)
    {
        $this->sen_gap_2 = $sen_gap_2;
    }

    /**
     * @return null
     */
    public function getSenGap3()
    {
        return $this->sen_gap_3;
    }

    /**
     * @param null $sen_gap_3
     */
    public function setSenGap3($sen_gap_3)
    {
        $this->sen_gap_3 = $sen_gap_3;
    }

    /**
     * @return null
     */
    public function getMotGap1()
    {
        return $this->mot_gap_1;
    }

    /**
     * @param null $mot_gap_1
     */
    public function setMotGap1($mot_gap_1)
    {
        $this->mot_gap_1 = $mot_gap_1;
    }

    /**
     * @return null
     */
    public function getMotGap2()
    {
        return $this->mot_gap_2;
    }

    /**
     * @param null $mot_gap_2
     */
    public function setMotGap2($mot_gap_2)
    {
        $this->mot_gap_2 = $mot_gap_2;
    }

    /**
     * @return null
     */
    public function getMosGap1()
    {
        return $this->mos_gap_1;
    }

    /**
     * @param null $mos_gap_1
     */
    public function setMosGap1($mos_gap_1)
    {
        $this->mos_gap_1 = $mos_gap_1;
    }

    /**
     * @return null
     */
    public function getSamMax()
    {
        return $this->sam_max;
    }

    /**
     * @param null $sam_max
     */
    public function setSamMax($sam_max)
    {
        $this->sam_max = $sam_max;
    }

    /**
     * @return null
     */
    public function getSenMax()
    {
        return $this->sen_max;
    }

    /**
     * @param null $sen_max
     */
    public function setSenMax($sen_max)
    {
        $this->sen_max = $sen_max;
    }

    /**
     * @return null
     */
    public function getMotMax()
    {
        return $this->mot_max;
    }

    /**
     * @param null $mot_max
     */
    public function setMotMax($mot_max)
    {
        $this->mot_max = $mot_max;
    }

    /**
     * @return null
     */
    public function getMosMax()
    {
        return $this->mos_max;
    }

    /**
     * @param null $mos_max
     */
    public function setMosMax($mos_max)
    {
        $this->mos_max = $mos_max;
    }

    /**
     * @return null
     */
    public function getSg3Phone()
    {
        return $this->sg3_phone;
    }

    /**
     * @param null $sg3_phone
     */
    public function setSg3Phone($sg3_phone)
    {
        $this->sg3_phone = $sg3_phone;
    }

    /**
     * @return null
     */
    public function getSg3Email()
    {
        return $this->sg3_email;
    }

    /**
     * @param null $sg3_email
     */
    public function setSg3Email($sg3_email)
    {
        $this->sg3_email = $sg3_email;
    }

    /**
     * @return null
     */
    public function getAppBuffer()
    {
        return $this->app_buffer;
    }

    /**
     * @param null $app_buffer
     */
    public function setAppBuffer($app_buffer)
    {
        $this->app_buffer = $app_buffer;
    }

    /**
     * @return null
     */
    public function getAppLima()
    {
        return $this->app_lima;
    }

    /**
     * @param null $app_lima
     */
    public function setAppLima($app_lima)
    {
        $this->app_lima = $app_lima;
    }

    /**
     * @return null
     */
    public function getSg3Address()
    {
        return $this->sg3_address;
    }

    /**
     * @param null $sg3_address
     */
    public function setSg3Address($sg3_address)
    {
        $this->sg3_address = $sg3_address;
    }

    /**
     * @return null
     */
    public function getSg3Zip()
    {
        return $this->sg3_zip;
    }

    /**
     * @param null $sg3_zip
     */
    public function setSg3Zip($sg3_zip)
    {
        $this->sg3_zip = $sg3_zip;
    }

    /**
     * @return null
     */
    public function getSg3City()
    {
        return $this->sg3_city;
    }

    /**
     * @param null $sg3_city
     */
    public function setSg3City($sg3_city)
    {
        $this->sg3_city = $sg3_city;
    }

    /**
     * @return null
     */
    public function getPayCurrency()
    {
        return $this->pay_currency;
    }

    /**
     * @param null $pay_currency
     */
    public function setPayCurrency($pay_currency)
    {
        $this->pay_currency = $pay_currency;
    }

    /**
     * @return null
     */
    public function getPaySam()
    {
        return $this->pay_sam;
    }

    /**
     * @param null $pay_sam
     */
    public function setPaySam($pay_sam)
    {
        $this->pay_sam = $pay_sam;
    }

    /**
     * @return null
     */
    public function getPaySen()
    {
        return $this->pay_sen;
    }

    /**
     * @param null $pay_sen
     */
    public function setPaySen($pay_sen)
    {
        $this->pay_sen = $pay_sen;
    }

    /**
     * @return null
     */
    public function getPayTeoLong()
    {
        return $this->pay_teo_long;
    }

    /**
     * @param null $pay_teo_long
     */
    public function setPayTeoLong($pay_teo_long)
    {
        $this->pay_teo_long = $pay_teo_long;
    }

    /**
     * @return null
     */
    public function getPayMot()
    {
        return $this->pay_mot;
    }

    /**
     * @param null $pay_mot
     */
    public function setPayMot($pay_mot)
    {
        $this->pay_mot = $pay_mot;
    }

    /**
     * @return null
     */
    public function getPayMos()
    {
        return $this->pay_mos;
    }

    /**
     * @param null $pay_mos
     */
    public function setPayMos($pay_mos)
    {
        $this->pay_mos = $pay_mos;
    }

    /**
     * @return null
     */
    public function getTeoDays()
    {
        return $this->teo_days;
    }

    /**
     * @param null $teo_days
     */
    public function setTeoDays($teo_days)
    {
        $this->teo_days = $teo_days;
    }

    /**
     * @return null
     */
    public function getTeoHours()
    {
        return $this->teo_hours;
    }

    /**
     * @param null $teo_hours
     */
    public function setTeoHours($teo_hours)
    {
        $this->teo_hours = $teo_hours;
    }

    /**
     * @return null
     */
    public function getTeoFee()
    {
        return $this->teo_fee;
    }

    /**
     * @param null $teo_fee
     */
    public function setTeoFee($teo_fee)
    {
        $this->teo_fee = $teo_fee;
    }

    /**
     * @return null
     */
    public function getPhoDir()
    {
        return $this->pho_dir;
    }

    /**
     * @param null $pho_dir
     */
    public function setPhoDir($pho_dir)
    {
        $this->pho_dir = $pho_dir;
    }

    /**
     * @return null
     */
    public function getSg3Title()
    {
        return $this->sg3_title;
    }

    /**
     * @param null $sg3_title
     */
    public function setSg3Title($sg3_title)
    {
        $this->sg3_title = $sg3_title;
    }

    /**
     * @return null
     */
    public function getFbPageid()
    {
        return $this->fb_pageid;
    }

    /**
     * @param null $fb_pageid
     */
    public function setFbPageid($fb_pageid)
    {
        $this->fb_pageid = $fb_pageid;
    }

    /**
     * @return null
     */
    public function getSg3Www()
    {
        return $this->sg3_www;
    }

    /**
     * @param null $sg3_www
     */
    public function setSg3Www($sg3_www)
    {
        $this->sg3_www = $sg3_www;
    }

    /**
     * @return null
     */
    public function getTcsWww()
    {
        return $this->tcs_www;
    }

    /**
     * @param null $tcs_www
     */
    public function setTcsWww($tcs_www)
    {
        $this->tcs_www = $tcs_www;
    }

    /**
     * @return null
     */
    public function getSg3News()
    {
        return $this->sg3_news;
    }

    /**
     * @param null $sg3_news
     */
    public function setSg3News($sg3_news)
    {
        $this->sg3_news = $sg3_news;
    }

    /**
     * @return null
     */
    public function getPhoFtp()
    {
        return $this->pho_ftp;
    }

    /**
     * @param null $pho_ftp
     */
    public function setPhoFtp($pho_ftp)
    {
        $this->pho_ftp = $pho_ftp;
    }

    /**
     * @return null
     */
    public function getPhoUser()
    {
        return $this->pho_user;
    }

    /**
     * @param null $pho_user
     */
    public function setPhoUser($pho_user)
    {
        $this->pho_user = $pho_user;
    }

    /**
     * @return null
     */
    public function getPhoPass()
    {
        return $this->pho_pass;
    }

    /**
     * @param null $pho_pass
     */
    public function setPhoPass($pho_pass)
    {
        $this->pho_pass = $pho_pass;
    }

    /**
     * @return null
     */
    public function getPhoBase()
    {
        return $this->pho_base;
    }

    /**
     * @param null $pho_base
     */
    public function setPhoBase($pho_base)
    {
        $this->pho_base = $pho_base;
    }

    /**
     * @return null
     */
    public function getSg3Admin()
    {
        return $this->sg3_admin;
    }

    /**
     * @param null $sg3_admin
     */
    public function setSg3Admin($sg3_admin)
    {
        $this->sg3_admin = $sg3_admin;
    }

    /**
     * @return null
     */
    public function getFbAppid()
    {
        return $this->fb_appid;
    }

    /**
     * @param null $fb_appid
     */
    public function setFbAppid($fb_appid)
    {
        $this->fb_appid = $fb_appid;
    }

    /**
     * @return null
     */
    public function getFbSecret()
    {
        return $this->fb_secret;
    }

    /**
     * @param null $fb_secret
     */
    public function setFbSecret($fb_secret)
    {
        $this->fb_secret = $fb_secret;
    }

    /**
     * @return null
     */
    public function getFbToken()
    {
        return $this->fb_token;
    }

    /**
     * @param null $fb_token
     */
    public function setFbToken($fb_token)
    {
        $this->fb_token = $fb_token;
    }

    /**
     * @return null
     */
    public function getFbRedirect()
    {
        return $this->fb_redirect;
    }

    /**
     * @param null $fb_redirect
     */
    public function setFbRedirect($fb_redirect)
    {
        $this->fb_redirect = $fb_redirect;
    }

    /**
     * @return null
     */
    public function getSg3Panel()
    {
        return $this->sg3_panel;
    }

    /**
     * @param null $sg3_panel
     */
    public function setSg3Panel($sg3_panel)
    {
        $this->sg3_panel = $sg3_panel;
    }

    /**
     * @return null
     */
    public function getFbScope()
    {
        return $this->fb_scope;
    }

    /**
     * @param null $fb_scope
     */
    public function setFbScope($fb_scope)
    {
        $this->fb_scope = $fb_scope;
    }

    /**
     * @return null
     */
    public function getSg3Pushover()
    {
        return $this->sg3_pushover;
    }

    /**
     * @param null $sg3_pushover
     */
    public function setSg3Pushover($sg3_pushover)
    {
        $this->sg3_pushover = $sg3_pushover;
    }

    /**
     * @return null
     */
    public function getFbAuthuser()
    {
        return $this->fb_authuser;
    }

    /**
     * @param null $fb_authuser
     */
    public function setFbAuthuser($fb_authuser)
    {
        $this->fb_authuser = $fb_authuser;
    }

    /**
     * @return null
     */
    public function getSg3LocOpen()
    {
        return $this->sg3_loc_open;
    }

    /**
     * @param null $sg3_loc_open
     */
    public function setSg3LocOpen($sg3_loc_open)
    {
        $this->sg3_loc_open = $sg3_loc_open;
    }

    /**
     * @return null
     */
    public function getSg3LocClose()
    {
        return $this->sg3_loc_close;
    }

    /**
     * @param null $sg3_loc_close
     */
    public function setSg3LocClose($sg3_loc_close)
    {
        $this->sg3_loc_close = $sg3_loc_close;
    }

    /**
     * @return null
     */
    public function getCouSamHours()
    {
        return $this->cou_sam_hours;
    }

    /**
     * @param null $cou_sam_hours
     */
    public function setCouSamHours($cou_sam_hours)
    {
        $this->cou_sam_hours = $cou_sam_hours;
    }

    /**
     * @return null
     */
    public function getCouTeoHours()
    {
        return $this->cou_teo_hours;
    }

    /**
     * @param null $cou_teo_hours
     */
    public function setCouTeoHours($cou_teo_hours)
    {
        $this->cou_teo_hours = $cou_teo_hours;
    }

    /**
     * @return null
     */
    public function getCouSenHours()
    {
        return $this->cou_sen_hours;
    }

    /**
     * @param null $cou_sen_hours
     */
    public function setCouSenHours($cou_sen_hours)
    {
        $this->cou_sen_hours = $cou_sen_hours;
    }

    /**
     * @return null
     */
    public function getCouMotHours()
    {
        return $this->cou_mot_hours;
    }

    /**
     * @param null $cou_mot_hours
     */
    public function setCouMotHours($cou_mot_hours)
    {
        $this->cou_mot_hours = $cou_mot_hours;
    }

    /**
     * @return null
     */
    public function getFooEmail()
    {
        return $this->foo_email;
    }

    /**
     * @param null $foo_email
     */
    public function setFooEmail($foo_email)
    {
        $this->foo_email = $foo_email;
    }

    /**
     * @return null
     */
    public function getAppTerms()
    {
        return $this->app_terms;
    }

    /**
     * @param null $app_terms
     */
    public function setAppTerms($app_terms)
    {
        $this->app_terms = $app_terms;
    }

    /**
     * @return null
     */
    public function getPayAut()
    {
        return $this->pay_aut;
    }

    /**
     * @param null $pay_aut
     */
    public function setPayAut($pay_aut)
    {
        $this->pay_aut = $pay_aut;
    }

    /**
     * @return null
     */
    public function getTelCountry()
    {
        return $this->tel_country;
    }

    /**
     * @param null $tel_country
     */
    public function setTelCountry($tel_country)
    {
        $this->tel_country = $tel_country;
    }

    /**
     * @return null
     */
    public function getFooSite()
    {
        return $this->foo_site;
    }

    /**
     * @param null $foo_site
     */
    public function setFooSite($foo_site)
    {
        $this->foo_site = $foo_site;
    }

    /**
     * @return null
     */
    public function getFbPage()
    {
        return $this->fb_page;
    }

    /**
     * @param null $fb_page
     */
    public function setFbPage($fb_page)
    {
        $this->fb_page = $fb_page;
    }

    /**
     * @return null
     */
    public function getPaySf1()
    {
        return $this->pay_sf1;
    }

    /**
     * @param null $pay_sf1
     */
    public function setPaySf1($pay_sf1)
    {
        $this->pay_sf1 = $pay_sf1;
    }

    /**
     * @return null
     */
    public function getPaySf2()
    {
        return $this->pay_sf2;
    }

    /**
     * @param null $pay_sf2
     */
    public function setPaySf2($pay_sf2)
    {
        $this->pay_sf2 = $pay_sf2;
    }

    /**
     * @return null
     */
    public function getSg3Noreply()
    {
        return $this->sg3_noreply;
    }

    /**
     * @param null $sg3_noreply
     */
    public function setSg3Noreply($sg3_noreply)
    {
        $this->sg3_noreply = $sg3_noreply;
    }

    /**
     * @return null
     */
    public function getCarSpeed()
    {
        return $this->car_speed;
    }

    /**
     * @param null $car_speed
     */
    public function setCarSpeed($car_speed)
    {
        $this->car_speed = $car_speed;
    }

    /**
     * @return null
     */
    public function getSg3PageTitle()
    {
        return $this->sg3_page_title;
    }

    /**
     * @param null $sg3_page_title
     */
    public function setSg3PageTitle($sg3_page_title)
    {
        $this->sg3_page_title = $sg3_page_title;
    }

    /**
     * @return null
     */
    public function getSg3PageDesc()
    {
        return $this->sg3_page_desc;
    }

    /**
     * @param null $sg3_page_desc
     */
    public function setSg3PageDesc($sg3_page_desc)
    {
        $this->sg3_page_desc = $sg3_page_desc;
    }

    /**
     * @return null
     */
    public function getPayTeoShort()
    {
        return $this->pay_teo_short;
    }

    /**
     * @param null $pay_teo_short
     */
    public function setPayTeoShort($pay_teo_short)
    {
        $this->pay_teo_short = $pay_teo_short;
    }









		
}
