<?php
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}

//Database connection
require_once ($_SERVER['DOCUMENT_ROOT'] . "/config/db_connection.php");

class CommentManager {
    //Construction
	public function __construct() {
		global $db;
		$this -> setDb($db);
	}

    //INSERT DB FUNCTION
	public function insert(Comment $comment) {
            $q = $this -> _db -> prepare('INSERT INTO t_comment
            (user, comment, status, FK_book, creation_date, deleted) VALUES(:user, :comment, :status, :FK_book, :creation_date, :deleted)');
            $q -> bindValue(':comment', $comment -> getcomment());
            $q -> bindValue(':user', $comment -> getuser());
            $q -> bindValue(':status', $comment -> getstatus());
            $q -> bindValue(':FK_book', $comment -> getFK_book());
            $q -> bindValue(':creation_date', $comment -> getcreation_date());
            $q -> bindValue(':deleted', $comment -> getdeleted());
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
	public function select($book_id) {
		$output = array();
		$q = $this -> _db -> prepare("SELECT id, comment, `user` as userid, status, FK_book, creation_date, validation_date, deleted FROM t_comment
        WHERE FK_book = :FK_book AND deleted = 0 AND status = 1");
        $q -> bindValue(':FK_book', $book_id);
		$result = $q -> fetch(PDO::FETCH_ASSOC);
		if ($q -> execute()) {
			//execution successfull: return DB data
			while ($result = $q -> fetch()) {
				array_push($output, array($result['id'], $result['comment'], $result['userid'], $result['creation_date'], $result['validation_date']));
			}
			$return = $output;
		} else
			//execution failed: return FALSE
			$return = FALSE;
		return $return;
	}

	//SELECT DB FUNCTION - all comments
	public function select_all() {
		$output = array();
		$q = $this -> _db -> prepare("SELECT id, comment, `user` as userid, status, FK_book, creation_date, validation_date, deleted FROM t_comment 
		WHERE deleted = 0");
		$result = $q -> fetch(PDO::FETCH_ASSOC);
		if ($q -> execute()) {
			//execution successfull: return DB data
			while ($result = $q -> fetch()) {
				array_push($output, array($result['id'], $result['comment'], $result['userid'], $result['creation_date'], $result['status'], $result['FK_book'], $result['validation_date']));
			}
			$return = $output;
		} else
			//execution failed: return FALSE
			$return = FALSE;
		return $return;
	}

	//SELECT DB FUNCTION - user comments
	public function select_user_comments($uid) {
		$output = array();
		$q = $this -> _db -> prepare("SELECT c.id as cid, c.comment as ccomment, c.status as cstatus, c.FK_book as cFK_book, c.creation_date as ccreation_date, b.title as btitle FROM t_comment as c
		INNER JOIN t_book AS b ON c.FK_book = b.id
		WHERE c.deleted = 0 AND c.user = :user");
        $q -> bindValue(':user', $uid);
		$result = $q -> fetch(PDO::FETCH_ASSOC);
		if ($q -> execute()) {
			//execution successfull: return DB data
			while ($result = $q -> fetch()) {
				array_push($output, array($result['cid'], $result['ccomment'], $result['ccreation_date'], $result['cstatus'], $result['cFK_book'], $result['btitle']));
			}
			$return = $output;
		} else
			//execution failed: return FALSE
			$return = FALSE;
		return $return;
	}

	//UPDATE DB FUNCTION
    public function update_status(Comment $comment) {
		//update table deleted attr.
		$q = $this -> _db -> prepare('UPDATE t_comment SET status=:status, validation_date=:validation_date WHERE id=:id');
		$q -> bindValue(':id', $comment -> getid());
		$q -> bindValue(':status', $comment -> getstatus());
		$q -> bindValue(':validation_date', $comment -> getvalidation_date());
		
		if ($q -> execute()) {
            //execution successfull: return TRUE
			$return = TRUE;
		} else {
            //execution failed: return FALSE
			$return = FALSE;
		}
		return $return;
	}

	//UPDATE DB FUNCTION
    public function soft_delete(Comment $comment) {
		//update table deleted attr.
		$q = $this -> _db -> prepare('UPDATE t_comment SET deleted = 1 WHERE id=:id');
		$q -> bindValue(':id', $comment -> getid());
		if ($q -> execute()) {
            //execution successfull: return TRUE
			$return = TRUE;
		} else {
            //execution failed: return FALSE
			$return = FALSE;
		}
		return $return;
	}

	//UPDATE DB FUNCTION
    public function soft_delete_user(Comment $comment) {
		//update table deleted attr.
		$q = $this -> _db -> prepare('UPDATE t_comment SET deleted = 1 WHERE id=:id AND user=:uid');
		$q -> bindValue(':id', $comment -> getid());
		$q -> bindValue(':uid', $comment -> getuser());
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
	public function setDb(PDO $db) {
		$this -> _db = $db;
	}
}

?>