<?php
    namespace model;
    class Book{
        private $id;
        private $title;
        private $overview;
        private $author;
        private $year;
        private $deleted;
        private $price;
        private $book_cover;
        private $genre;
        private $edition;
        private $status;
        
        function __construct($id, $title, $overview, $author, $year, $deleted, $price, $book_cover, $genre, $edition, $status) {
            $this->id = $id;
            $this->title = $title;
            $this->overview = $overview;
            $this->author = $author;
            $this->year = $year;
            $this->deleted = $deleted;
            $this->price = $price;
            $this->book_cover = $book_cover;
            $this->genre = $genre;
            $this->edition = $edition;
            $this->status = $status;
        }
        
        public function getId() {
            return $this->id;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getOverview() {
            return $this->overview;
        }

        public function getAuthor() {
            return $this->author;
        }

        public function getYear() {
            return $this->year;
        }

        public function getDeleted() {
            return $this->deleted;
        }

        public function getPrice() {
            return $this->price;
        }

        public function getBook_cover() {
            return $this->book_cover;
        }

        public function getGenre() {
            return $this->genre;
        }

        public function getEdition() {
            return $this->edition;
        }

        public function getStatus() {
            return $this->status;
        }
    }