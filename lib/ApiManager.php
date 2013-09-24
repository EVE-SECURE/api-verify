<?php

class ApiManager extends SqlManaged {
	private $scripts = array(
		array("name"     => "character info", 
            "location" => "CharacterInfo.xml.aspx", 
				"args"     => array("key", "code", "character")), 
		array("name"     => "characters", 
				"location" => "/account/Characters.xml.aspx", 
				"args"     => array("key", "code")), 
		array("name"     => "status", 
				"location" => "/account/AccountStatus.xml.aspx", 
				"args"     => array("key", "code", "character")), 
		array("name"     => "api key info", 
				"location" => "/account/APIKeyInfo.xml.aspx", 
				"args"     => array("key", "code")), 
		array("name"     => "character account balance", 
				"location" => "/char/AccountBalance.xml.aspx", 
				"args"     => array("key", "code", "character")), 
		array("name"     => "character asset list", 
				"location" => "/char/AssetList.xml.aspx", 
				"args"     => array("key", "code", "character")), 
		array("name"     => "character calendar event attendees", 
				"location" => "/char/CalendarEventAttendees.xml.aspx", 
				"args"     => array("key", "code", "character", "event")), 
		array("name"     => "character sheet", 
				"location" => "/char/CharacterSheet.xml.aspx", 
				"args"     => array("key", "code", "character")), 
		array("name"     => "character contact list", 
				"location" => "/char/ContactList.xml.aspx", 
				"args"     => array("key", "code", "character")), 
		array("name"     => "character contact notifications", 
				"location" => "/char/ContactNotifications.xml.aspx", 
				"args"     => array("key", "code", "character")), 
		array("name"     => "character faction warfare statistics", 
				"location" => "/char/FacWarStats.xml.aspx", 
				"args"     => array("key", "code", "character")), 
		array("name"     => "character industry jobs", 
				"location" => "/char/IndustryJobs.xml.aspx", 
				"args"     => array("key", "code", "character")), 
		array("name"     => "character kill log", 
				"location" => "KillLog.xml.aspx", 
				"args"     => array("key", "code", "character", "before kill")), 
		array("name"     => "character mailing lists", 
				"location" => "/char/mailinglists.xml.aspx", 
				"args"     => array("key", "code", "character")), 
		array("name"     => "character mail bodies", 
				"location" => "/char/MailBodies.xml.aspx", 
				"args"     => array("key", "code", "mail ids")), 
		array("name"     => "", 
				"location" => "", 
				"args"     => array("key", "code")), 
		array("name"     => "", 
				"location" => "", 
				"args"     => array("key", "code")), 
		array("name"     => "", 
				"location" => "", 
				"args"     => array("key", "code")), 
		array("name"     => "", 
				"location" => "", 
				"args"     => array("key", "code")), 
		array("name"     => "", 
				"location" => "", 
				"args"     => array("key", "code")), 
	public function __construct($sqlManager = null) {
		parent::SetSqlManager($sqlManager);
	}

	public function __destruct() {
	}

	public function GetExpiredCache() {
		$sql = "SELECT `a1`.`script` AS `script`,   " .
				        "`a2`.`vkey`   AS `key`,      " .
				        "`a2`.`vcode`  AS `code`      " . 
						  "FROM `cachedCalls` AS `a1`   " . 
                    "INNER JOIN `apikeys` AS `a2` " . 
                    "ON `a1`.`apikey`=`a2`.`id`   " . 
                    "WHERE `a1`.`cachedUntil` < CURRENT_TIMESTAMP";
		$statement = parent::GetSqlManager()->GetStatement($sql);
		$return    = array();	

		if($statement) {
			$statement->execute();
			$statement->bind_result($script, $key, $code);
	
			while($statement->fetch()) {
				$value = array('key'=>$key, 'code'=>$code, 'character'=>$character);
				$return[count($return)] = $value;
			}
		}	// end if

		return $return;
	}	// end function GetExpiredCacheCorpHistory

}	// end class ApiManager

?>
