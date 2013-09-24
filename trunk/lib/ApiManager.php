<?php

class ApiManager extends SqlManaged {
	public function __construct($sqlManager = null) {
		parent::SetSqlManager($sqlManager);
	}

	public function __destruct() {
	}

	public function GetExpiredCacheCorpHistory() {
		$sql = "SELECT `a3`.`vkey`      AS `key`,      " . 
                    "`a3`.`vcode`     AS `code`,     " .
						  "`a1`.`character` AS `character` " . 
						  "FROM `corphistory` AS `a1` " . 
						  "INNER JOIN `characters` AS `a2` ON `a1`.`character`=`a2`.`id` " . 
					 	  "INNER JOIN `apikeys`    AS `a3` ON `a2`.`user`=`a3`.`user` " . 
          			  "WHERE cachedUntil < CURRENT_TIMESTAMP";
		$statement = parent::GetSqlManager()->GetStatement($sql);
		$return    = array();	

		if($statement) {
			$statement->execute();
			$statement->bind_result($key, $code, $character);
	
			while($statement->fetch()) {
				$value = array('key'=>$key, 'code'=>$code, 'character'=>$character);
				$return[count($return)] = $value;
			}
		}	// end if

		return $return;
	}	// end function GetExpiredCacheCorpHistory
}	// end class ApiManager

?>
