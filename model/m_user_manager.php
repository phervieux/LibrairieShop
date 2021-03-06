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
		$this -> setodbc($odbc);
	}

    //INSERT DB FUNCTION
	public function insert(User $user) {
            $q = $this -> _odbc -> prepare('INSERT INTO user(id, username, name, surname, email, right, deleted, password)
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
                    $return = $this -> _odbc -> lastInsertId();
            } else {
                    //execution failed: return FALSE
                    $return = FALSE;
            }
            return $return;
	}

    //SELECT DB FUNCTION
	public function select($username, $password) {
            try {
                $output = array();
		$q = $this -> _odbc -> prepare("SELECT * FROM user WHERE username = :username AND password = :password AND deleted = 0");
		$q -> bindValue(':username', $username);
                $q -> bindValue(':password', $password);
                $result = $q -> fetch(PDO::FETCH_ASSOC);
		if ($q -> execute()) {
			//execution successfull: return DB data
			while ($result = $q -> fetch()) {
                            //array_push($output, array($result['id'], $result['username'], $result['name'], $result['surname'], $result['email'], $result['right'], $result['deleted'], $result['password']));
                            $output = $result;
                            
                        }
			$return = $output;
		} else
			//execution failed: return FALSE
			$return = FALSE;
		return $return;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
	}

    //SELECT USERNAME WITH ID - DB FUNCTION
    public function select_uname($uid) {
		$q = $this -> _odbc -> prepare("SELECT username FROM user WHERE id = :uid AND deleted = 0");
        $q -> bindValue(':uid', $uid);		
		$result = $q -> fetch(PDO::FETCH_ASSOC);
		if ($q -> execute()) {
			//execution successfull: return DB data
			$result = $q -> fetch();
            $return = $result[0];
		} else
			//execution failed: return FALSE
			$return = FALSE;
		return $return;
    }
    
    public function select_by_id($id) {
        $q = $this -> _odbc -> prepare('SELECT * FROM user WHERE id = :id AND deleted = 0');
        $q -> bindValue(':id', $id);		
        $result = $q -> fetch(PDO::FETCH_ASSOC);
        if ($q -> execute()) {
                //execution successfull: return DB data
                $result = $q -> fetchAll();
                $return = $result[0];
        } else
                //execution failed: return FALSE
                $return = FALSE;
        return $return;
    }

    //SOFT DELETE ELEMENT FUNCTION
    public function soft_delete(User $user) {
		//update table deleted attr.
		$q = $this -> _odbc -> prepare('UPDATE user SET deleted=1 WHERE id=:id)');
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
	public function setodbc(PDO $odbc) {
		$this -> _odbc = $odbc;
	}
}

?>