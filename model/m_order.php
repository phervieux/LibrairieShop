<?php
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}

class Order {
    protected $_id;
    protected $_order_date;
    protected $_user;
    protected $_qnt;
    protected $_status;
    protected $_TVA;
    protected $_total_price;
    protected $_FK_book;
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
    public function getorder_date() {
        return $this -> _order_date;
    }
    public function getuser() {
        return $this -> _user;
    }
    public function getqnt() {
        return $this -> _qnt;
    }
    public function getstatus() {
        return $this -> _status;
    }
    public function getTVA() {
        return $this -> _TVA;
    }
    public function gettotal_price() {
        return $this -> _total_price;
    }
    public function getFK_book() {
        return $this -> _FK_book;
    }
    public function getdeleted() {
        return $this -> _deleted;
    }

	//Sets
	public function setid($id) {
        $this -> _id = $id;
    }
    public function setorder_date($order_date) {
        $this -> _order_date = date("Y-m-d H:i:s");
    }
    public function setuser($user) {
        $this -> _user = $user;
    }
    public function setqnt($qnt) {
        $this -> _qnt = $qnt;
    }
    public function setstatus($status) {
        $this -> _status = $status;
    }
    public function setTVA($TVA) {
        $this -> _TVA = $TVA;
    }
    public function settotal_price($total_price) {
        $this -> _total_price = $total_price;
    }
    public function setFK_book($FK_book) {
        $this -> _FK_book = $FK_book;
    }
    public function setdeleted($deleted) {
        $this -> _deleted = $deleted;
    }
}
?>