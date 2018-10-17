<?php

function getTimestampFromChDateTime($datetime) {
    $lunghezza=strlen($datetime);
    $day=substr($datetime,0,2);
    $month=substr($datetime,3,2);
    $year=substr($datetime,6,4);
    $hour=substr($datetime,11,2);
    $minute=substr($datetime,14,2);
    $sec="00";
    $timest=strtotime($year."-".$month."-".$day." ".$hour.":".$minute.":".$sec);
    //$timest=$year."-".$month."-".$day." ".$hour.":".$minute.":".$sec;

    return $timest;

}


function getNumberLessonsByCourseType($course) {
    switch($course){
        case 'mot': $number=3; break;
        case 'mos': $number=3; break;
        case 'mop': $number=2; break;
        case 'sam': $number=2; break;
        case 'sen': $number=4; break;
    }


    return $number;

}





function getLessonByNumber($lesson_number){
    if($lesson_number==1){
        $lesson_number='app_1st';
    }
    if($lesson_number==2){
        $lesson_number='app_2nd';
    }
    if($lesson_number==3){
        $lesson_number='app_3rd';
    }
    if($lesson_number==4){
        $lesson_number='app_4th';
    }
    return $lesson_number;
}


function getLicenseTypeByNumber($patstr, $short = false) {
	if ($short == true) {
		$patarray = array(
			'1' => '',
			'2' => 'B',
			'3' => 'A',
			'4' => 'A1',
		);
	}
	else {
		$patarray = array(
			'1' => '',
			'2' => 'Cat. B (Auto)',
			'3' => 'Cat. A (Moto)',
			'4' => 'Cat. A1 (Scooter)',
		);
	}
	foreach ($patarray as $patcode => $patvalue) {$patstr = str_replace("$patcode","$patvalue",$patstr);}
	return $patstr;
}
function getCourseTypeByInitials($corsostr) {
	$corsiarray = array(
		'sam' => 'Soccorritore',
		'teo' => 'Teoria',
		'sen' => 'Sensibilizzazione',
		'mot' => 'Corso Moto',
		'mos' => 'Corso Scooter',
	);
	foreach ($corsiarray as $corsocode => $corsovalue) {$corsostr = str_replace("$corsocode","$corsovalue",$corsostr);}
	return $corsostr;
}

function calcAge($birthDate) {
	$age = date("Y")-date("Y",$birthDate);
	if (date("md",$birthDate) > date("md")) {
		$r_age = $age-1;
	}
	elseif (date("md",$birthDate) <= date("md")) {
		$r_age = $age;
	}
	return $r_age;
}

function getDayMonthNumByTs($ts) {
    $date_str = date("d.m",$ts);
    return $date_str;
}

function getDayMonthNumYearByTs($ts) {
    $date_str = date("d.m.Y",$ts);
    return $date_str;
}


function getDayMonthByTs($ts) {
    $month_str = date("m",$ts);
    $month_array = array(
        '01' => 'Gennaio',
        '02' => 'Febbraio',
        '03' => 'Marzo',
        '04' => 'Aprile',
        '05' => 'Maggio',
        '06' => 'Giugno',
        '07' => 'Luglio',
        '08' => 'Agosto',
        '09' => 'Settembre',
        '10' => 'Ottobre',
        '11' => 'Novembre',
        '12' => 'Dicembre',
    );
    foreach ($month_array as $month_int => $month_name) {
        $month_str = str_replace("$month_int","$month_name",$month_str);
    }
    $date_str = date("d",$ts).". ".$month_str;
    return $date_str;
}

function getDayMonthYearByTs($ts) {
    $month_str = date("m",$ts);
    $month_array = array(
        '01' => 'Gennaio',
        '02' => 'Febbraio',
        '03' => 'Marzo',
        '04' => 'Aprile',
        '05' => 'Maggio',
        '06' => 'Giugno',
        '07' => 'Luglio',
        '08' => 'Agosto',
        '09' => 'Settembre',
        '10' => 'Ottobre',
        '11' => 'Novembre',
        '12' => 'Dicembre',
    );
    foreach ($month_array as $month_int => $month_name) {
        $month_str = str_replace("$month_int","$month_name",$month_str);
    }
    $date_str = date("d",$ts).". ".$month_str;

    $date_str .= " ".date("Y",$ts);

    return $date_str;
}





function printPhone($nr) {
	if ($nr) {
		$nr = snh($nr);
		$str = substr($nr,0,3)." ".substr($nr,3,3)." ".substr($nr,6,2)." ".substr($nr,8,2);
		return $str;
	}
}


function printAmount($mnt) {

	if (!$mnt) {
		$mnt = 0;
	}
	if ($mnt == round($mnt)) {
		$str = $mnt.".&#8211;&#8211";
	}
	else {
		$str = number_format($mnt,2);
	}
	return $str;
}

// Manage Facebook Events
function fbCourseEvent($course,$method) {
	global $fbConnex,$fb;
    $connection= new Database();
	$query =  $connection->query("SELECT * FROM courses WHERE cou_id = '".$course."'");
    $row = $query->fetch();


	// DELETE
	if ($fbConnex && $method == 'DELETE' && $row['cou_fbid']) {
		$delete = $fb->api('/'.$row["cou_fbid"],'DELETE');
		return $delete;
	}
	// POST
	elseif ($fbConnex && $method == 'POST') {
		// Define parameters
		$name = getCourseType($row['cou_type']);
		if ($row['cou_type'] == 'sam' || $row['cou_type'] == 'sen') {
			$name = "Corso " . $name;
		}
		$start_time = date("Y-m-d\TH:i:sO",$row['cou_ts_1']);
		$description = "LEZIONI:\n"
			.strftime("1) %a %e %B %Y, ore %H:%M",$row['cou_ts_1'])
			."\n"
			.strftime("2) %a %e %B %Y, ore %H:%M",$row['cou_ts_2'])
			."\n";
		if ($row['cou_type'] != 'mos') {
			$description .= strftime("3) %a %e %B %Y, ore %H:%M",$row['cou_ts_3'])
				."\n";
			if ($row['cou_type'] == 'sen') {
				$description .= strftime("4) %a %e %B %Y, ore %H:%M",$row['cou_ts_4'])
					."\n";
			}
		}
		$description .= "\nISCRIZIONI:"
			."\n"
			."www.scuolaguidatre.ch/fb/"
			.$course;
		$ticket_uri = "https://scuolaguidatre.ch/fb/"
			.$course;
		$location_id = ges("fb_pageid");
		// Detect mode
		try {
			$fb->api('/'.$row['cou_fbid'],'GET');
			$exists = true;
		}
		catch (FacebookApiException $e) {
			$exists = false;
		}
		// Enter UPDATE mode
		if ($exists == true) {
			$fields = array(
				'start_time'	=> $start_time,
				'description'	=> $description
			);
			$post = $fb->api('/'.$row['cou_fbid'],'POST',$fields);
		}
		// Enter ADD mode
		else {
			$fields = array(
				'name'				=> $name,
				'start_time'	=> $start_time,
				'description'	=> $description,
				'ticket_uri'	=> $ticket_uri,
				'location_id'	=> $location_id
			);
			$post = $fb->api('/me/events','POST',$fields);
			$connection->query("UPDATE courses SET cou_fbid = '".$post['id']."' WHERE cou_id = '".$course."'");
		}
		return $post;
	}
	else {
		return false;
	}
}

// cURL Load Function
function cURLget ($ch_url) {
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$ch_url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
	$ch_send = curl_exec($ch);
	curl_close($ch);
	return $ch_send;
};


// MAKE WEEKDAYS FRIENDLY

$days = array(
    '1' => 'luned&igrave;',
    '2' => 'marted&igrave;',
    '3' => 'mercoledi&igrave;',
    '4' => 'gioved&igrave;',
    '5' => 'venerd&igrave;',
    '6' => 'sabato',
    '7' => 'domenica'
);

function friendlyDay($string, $short = 0) {

    global $days;

    $unfriendly = date("N", $string);
    $friendly = $days[$unfriendly];

    // Shorten
    if ($short == 1) {
        $friendly = substr($friendly, 0, 3);
    }

    return $friendly;

}

// MAKE MONTHS FRIENDLY

$months = array(
    '1' => 'gennaio',
    '2' => 'febbraio',
    '3' => 'marzo',
    '4' => 'aprile',
    '5' => 'maggio',
    '6' => 'giugno',
    '7' => 'luglio',
    '8' => 'agosto',
    '9' => 'settembre',
    '10' => 'ottobre',
    '11' => 'novembre',
    '12' => 'dicembre'
);

function friendlyMonth($string, $short = 0) {

    global $months;

    $unfriendly = date("n", $string);
    $friendly = $months[$unfriendly];

    // Shorten
    if ($short == 1) {
        $friendly = substr($friendly, 0, 3);
    }

    return $friendly;

}



?>