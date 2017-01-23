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
            (user, comment, status, FK_book, deleted) VALUES(:user, :comment, :status, :FK_book, :deleted)');
            $q -> bindValue(':comment', $comment -> getcomment());
            $q -> bindValue(':user', $comment -> getuser());
            $q -> bindValue(':status', $comment -> getstatus());
            $q -> bindValue(':FK_book', $comment -> getFK_book());
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

    //setDB
	public function setDb(PDO $db) {
		$this -> _db = $db;
	}
}

?>