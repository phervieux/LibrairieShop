<?php
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}

class Comment {
	protected $_id;
	protected $_comment;
	protected $_user;
	protected $_status;
	protected $_FK_book;
	protected $_creation_date;
	protected $_validation_date;
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
	public function getcomment() {
		return $this -> _comment;
	}
	public function getuser() {
		return $this -> _user;
	}
	public function getstatus() {
		return $this -> _status;
	}
	public function getFK_book() {
		return $this -> _FK_book;
	}
	public function getcreation_date() {
        return $this -> _creation_date;
    }
	public function getvalidation_date() {
        return $this -> _validation_date;
    }
	public function getdeleted() {
		return $this -> _deleted;
	}

	//Sets
	public function setid($id) {
		$this -> _id = $id;
	}
	public function setcomment($comment) {
		$this -> _comment = $comment;
	}
	public function setuser($user) {
		$this -> _user = $user;
	}
	public function setstatus($status) {
		$this -> _status = $status;
	}
	public function setFK_book($FK_book) {
		$this -> _FK_book = $FK_book;
	}
	public function setcreation_date($creation_date) {
        $this -> _creation_date = date("Y-m-d H:i:s");
    }
	public function setvalidation_date($validation_date) {
        $this -> _validation_date = date("Y-m-d H:i:s");
    }
	public function setdeleted($deleted) {
		$this -> _deleted = $deleted;
	}
}
?>