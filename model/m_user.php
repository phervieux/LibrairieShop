<?php
    if (!defined('INCLUDE_CHECK')) {
        http_response_code(404); die;
    }
    
    class User{
        private $id;
        private $username;
        private $name;
        private $surname;
        private $email;
        private $right;
        private $deleted;
        private $password;
        
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
    }