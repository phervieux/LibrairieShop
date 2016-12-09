<?php
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}

//Database connection
require_once ($_SERVER['DOCUMENT_ROOT'] . "/config/db_connection.php");

class BookManager {
    //Construction
	public function __construct() {
		global $db;
		$this -> setDb($db);
	}

    //INSERT DB FUNCTION
	public function insert(Book $book) {
		$q = $this -> _db -> prepare('INSERT INTO t_book (title, overview, author_sex, author_name, author_fname, `year`, price, img_cover, edition, logistic_qnt, FK_genre, creation_date, modif_date, deleted)
		    VALUES(:title, :overview, :author_sex, :author_name, :author_fname, :year, :price, :img_cover, :edition, :logistic_qnt, :FK_genre, :creation_date, :modif_date, :deleted)');
        print_r($book);
		$q -> bindValue(':title', $book -> gettitle());
        $q -> bindValue(':overview', $book -> getoverview());
        $q -> bindValue(':author_sex', $book -> getauthor_sex());
        $q -> bindValue(':author_name', $book -> getauthor_name());
        $q -> bindValue(':author_fname', $book -> getauthor_fname());
        $q -> bindValue(':year', $book -> getyear());
        $q -> bindValue(':price', $book -> getprice());
        $q -> bindValue(':img_cover', $book -> getimg_cover());
        $q -> bindValue(':edition', $book -> getedition());
        $q -> bindValue(':logistic_qnt', $book -> getlogistic_qnt());
        $q -> bindValue(':FK_genre', $book -> getFK_genre());
        $q -> bindValue(':creation_date', $book -> getcreation_date());
        $q -> bindValue(':modif_date', $book -> getmodif_date());
        $q -> bindValue(':deleted', $book -> getdeleted());
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
	public function select() {
		$output = array();
		$q = $this -> _db -> prepare("SELECT b.id as bid, b.title as btitle, b.overview as boverview, b.author_sex bauthor_sex, b.author_name as bauthor_name, b.author_fname as bauthor_fname, b.`year` as byear, b.price as bprice, b.img_cover as bimg_cover, b.edition as bedition, b.logistic_qnt as 			blogistic_qnt, b.deleted as bdeleted, g.name as gname FROM t_book as b INNER JOIN t_genre as g on b.FK_genre = g.id WHERE b.deleted = 0");
		$result = $q -> fetch(PDO::FETCH_ASSOC);
		if ($q -> execute()) {
			//execution successfull: return DB data
			while ($result = $q -> fetch()) {
				array_push($output, array($result['bid'], $result['btitle'], $result['boverview'], $result['bauthor_sex'], $result['bauthor_name'], $result['bauthor_fname'], $result['byear'], $result['bprice'], $result['bimg_cover'], $result['bedition'], $result['blogistic_qnt'], $result['gname']));
			}
			$return = $output;
		} else
			//execution failed: return FALSE
			$return = FALSE;
		return $return;
	}

    //SOFT DELETE ELEMENT FUNCTION
    public function soft_delete(Book $book) {
		//update table deleted attr.
		$q = $this -> _db -> prepare('UPDATE t_book SET deleted=1 WHERE id=:id)');
		$q -> bindValue(':id', $book -> getid());
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