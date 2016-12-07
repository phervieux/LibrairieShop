<?php
/*
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}
 
 */

class Book {
    protected $_id;
    protected $_title;
    protected $_overview;
    protected $_author_sex;
    protected $_author_name;
    protected $_author_fname;
    protected $_year;
    protected $_price;
    protected $_img_cover;
    protected $_edition;
    protected $_logistic_qnt;
    protected $_FK_genre;
    protected $_creation_date;
    protected $_modif_date;
    protected $_deleted;

	//Construction
	public function __construct(array $data) {
		$this -> hydrate($data);
	}

	//Hydrate
	public function hydrate($data) {
		foreach ($data as $key => $value) {
			//method = function name with given attr.
            $method = 'set' . $key;
            //if set exists: call the set function
			if (method_exists($this, $method)) {
				$this -> $method($value);
			}
		}
	}

	//Gets
	public function getid() {
        return $this -> _id;
    }
    public function gettitle() {
        return $this -> _title;
    }
    public function getoverview() {
        return $this -> _overview;
    }
    public function getauthor_sex() {
        return $this -> _author_sex;
    }
    public function getauthor_name() {
        return $this -> _author_name;
    }
    public function getauthor_fname() {
        return $this -> _author_fname;
    }
    public function getyear() {
        return $this -> _year;
    }
    public function getprice() {
        return $this -> _price;
    }
    public function getimg_cover() {
        return $this -> _img_cover;
    }
    public function getedition() {
        return $this -> _edition;
    }
    public function getlogistic_qnt() {
        return $this -> _logistic_status;
    }
    public function getFK_genre() {
        return $this -> _FK_genre;
    }
    public function getcreation_date() {
        return $this -> _creation_date;
    }
    public function getmodif_date() {
        return $this -> _modif_date;
    }
    public function getdeleted() {
        return $this -> _deleted;
    }

	//Sets
	public function setid($id) {
        $this -> _id = $id;
    }
    public function settitle($title) {
        $this -> _title = $title;
    }
    public function setoverview($overview) {
        $this -> _overview = $overview;
    }
    public function setauthor_sex($author_sex) {
        $this -> _author_sex = $author_sex;
    }
    public function setauthor_name($author_name) {
        $this -> _author_name = $author_name;
    }
    public function setauthor_fname($author_fname) {
        $this -> _author_fname = $author_fname;
    }
    public function setyear($year) {
        $this -> _year = $year;
    }
    public function setprice($price) {
        $this -> _price = $price;
    }
    public function setimg_cover($img_cover) {
        $this -> _img_cover = $img_cover;
    }
    public function setedition($edition) {
        $this -> _edition = $edition;
    }
    public function setlogistic_qnt($logistic_status) {
        $this -> _logistic_status = $logistic_status;
    }
    public function setFK_genre($FK_genre) {
        $this -> _FK_genre = $FK_genre;
    }
    public function setcreation_date($creation_date) {
        $this -> _creation_date = date("Y-m-d H:i:s");
    }
    public function setmodif_date($modif_date) {
        $this -> _modif_date = date("Y-m-d H:i:s");
    }
    public function setdeleted($deleted) {
        $this -> _deleted = $deleted;
    }
}
?>