<?php

// Send Pushover Notifications
function pushOver ($poMessage,$poLink,$poLinkTitle,$poUser) {
	// Return error if no message
	if ($poMessage == false) {
		echo "<b>Function: pushOver</b><br />Error: You cannot send empty messages!<br />";
		return false;
	}
	// Default link and title
	if ($poLink == false) {
		$poLink = "http://www.scuolaguidatre.ch/admin";
	}
	if ($poLinkTitle == false) {
		$poLinkTitle = "Accedi al pannello";
	}
	// Define data array
	$poPostData = array(
		"token"			=> ges('sg3_pushover'),
		"message"		=> $poMessage,
		"url"				=> $poLink,
		"url_title"	=> $poLinkTitle,
	);
	// Send to all users
	if ($poUser == false) {
		$poQuery = mysql_query("SELECT ins_pushover FROM instructors WHERE ins_pushover != ''");
		while ($poRow = mysql_fetch_array($poQuery)) {
			$poPostData['user'] = $poRow['ins_pushover'];
			curl_setopt_array(
				$ch = curl_init(),
				array(
					CURLOPT_URL => "https://api.pushover.net/1/messages.json",
					CURLOPT_POSTFIELDS => $poPostData,
					CURLOPT_RETURNTRANSFER => true,
				)
			);
			curl_exec($ch);
			curl_close($ch);
		}
		return true;
	}
	// Send to specific user
	else {
		$poQuery = mysql_query("SELECT ins_pushover FROM instructors WHERE ins_id = '" . $poUser . "' AND ins_pushover != ''");
		if (mysql_num_rows($poQuery) != 1) {
			echo "<b>Function: pushOver</b><br />Error: Destination user does not exist!<br />";
			return false;
		}
		else {
			$poRow = mysql_fetch_array($poQuery);
			$poPostData['user'] = $poRow['ins_pushover'];
			curl_setopt_array(
				$ch = curl_init(),
				array(
					CURLOPT_URL => "https://api.pushover.net/1/messages.json",
					CURLOPT_POSTFIELDS => $poPostData,
					CURLOPT_RETURNTRANSFER => true,
				)
			);
			curl_exec($ch);
			curl_close($ch);
			return true;
		}
	}
}

?>