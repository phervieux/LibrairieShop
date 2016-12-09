<?php
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}

//Database connection
require_once ($_SERVER['DOCUMENT_ROOT'] . "/config/db_connection.php");

class GenreManager {
    //Construction
	public function __construct() {
		global $db;
		$this -> setDb($db);
	}

    //SELECT DB FUNCTION
	public function select($myvalue) {
		$output = null;
		$q = $this -> _db -> prepare("SELECT id, name FROM t_genre WHERE deleted = 0");
		$result = $q -> fetch(PDO::FETCH_ASSOC);
		if ($q -> execute()) {
			//execution successfull: return DB data
			while ($result = $q -> fetch()) {
				if ($myvalue == $result['id']){
					$output .= '<option selected value="'.$result['id'].'">'.$result['name'].'</option>';
				} else{
					$output .= '<option value="'.$result['id'].'">'.$result['name'].'</option>';
				}
			}
			$return = $output;
		} else
			//execution failed: return FALSE
			$return = FALSE;
		return $return;
	}

    //setDB
	public function setDb(PDO $db) {
		$this -> _db = $db;
	}
}

?>