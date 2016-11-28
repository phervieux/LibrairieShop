<?php
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}

class Genre {
    protected $_id;
    protected $_name;
    protected $_creation_date;
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
    public function getname() {
        return $this -> _name;
    }
    public function getcreation_date() {
        return $this -> _creation_date;
    }
    public function getdeleted() {
        return $this -> _deleted;
    }

	//Sets
	public function seid($id) {
        $this -> _id = $id;
    }
    public function sename($name) {
        $this -> _name = $name;
    }
    public function secreation_date($creation_date) {
        $this -> _creation_date = date("Y-m-d H:i:s");
    }
    public function sedeleted($deleted) {
        $this -> _deleted = $deleted;
    }
}
?>