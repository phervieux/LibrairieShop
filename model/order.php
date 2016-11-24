<?php
    namespace model;
    class Order{
        private $id;
        private $order_date;
        private $book;
        private $user;
        private $status;
        private $deleted;
        private $total_price;
        
        function __construct($id, $order_date, $book, $user, $status, $deleted, $total_price) {
            $this->id = $id;
            $this->order_date = $order_date;
            $this->book = $book;
            $this->user = $user;
            $this->status = $status;
            $this->deleted = $deleted;
            $this->total_price = $total_price;
        }

        public function getId() {
            return $this->id;
        }

        public function getOrder_date() {
            return $this->order_date;
        }

        public function getBook() {
            return $this->book;
        }

        public function getUser() {
            return $this->user;
        }

        public function getStatus() {
            return $this->status;
        }

        public function getDeleted() {
            return $this->deleted;
        }

        public function getTotal_price() {
            return $this->total_price;
        }
    }