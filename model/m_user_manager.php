<?php
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}

//Database connection
require_once ($_SERVER['DOCUMENT_ROOT'] . "/config/odbc_connection.php");

class UserManager {
    //Construction
	public function __construct() {
		global $odbc;
		$this -> setOdbc($odbc);
	}

    //INSERT DB FUNCTION
	public function insert(User $user) {
            $q = $this -> _db -> prepare('INSERT INTO user(id, username, name, surname, email, right, deleted, password)
                VALUES(:id, :username, :name, :surname, :email, :right, :deleted, :password)');
            $q -> bindValue(':id', $user -> getid());
            $q -> bindValue(':username', $user -> getusername());
            $q -> bindValue(':name', $user -> getname());
            $q -> bindValue(':surname', $user -> getsurname());
            $q -> bindValue(':email', $user -> getemail());
            $q -> bindValue(':password', $user -> getpassword());
            $q -> bindValue(':deleted', $user -> getdeleted());
            if ($q -> execute()) {
                    //execution successfull: return last inserted id
                    $return = $this -> _db -> lastInsertId();
            } else {
                    //execution failed: return FALSE
                    $return = FALSE;
            }
            return $return;
	}

    //SELECT DB FUNCTION
	public function select(User $user) {
		$output = array();
		$q = $this -> _db -> prepare("SELECT * FROM user WHERE username = :username AND password = :password AND deleted != 1");
		$q -> bindValue(':username', $user -> getusername());
                $q -> bindValue(':password', $user -> getpassword());
                $result = $q -> fetch(PDO::FETCH_ASSOC);
		if ($q -> execute()) {
			//execution successfull: return DB data
			while ($result = $q -> fetch()) {
				array_push($output, array($result['id'], $result['username'], $result['name'], $result['surname'], $result['email'], $result['right'], $result['deleted'], $result['password']));
			}
			$return = $output;
		} else
			//execution failed: return FALSE
			$return = FALSE;
		return $return;
	}

    //SOFT DELETE ELEMENT FUNCTION
    public function soft_delete(User $user) {
		//update table deleted attr.
		$q = $this -> _db -> prepare('UPDATE user SET deleted=1 WHERE id=:id)');
		$q -> bindValue(':id', $user -> getid());
        if ($q -> execute()) {
            //execution successfull: return TRUE
			$return = TRUE;
		} else {
            //execution failed: return FALSE
			$return = FALSE;
		}
		return $return;
	}

    //setDB
	public function setOdbc(PDO $odbc) {
		$this -> _db = $odbc;
	}
}

?>