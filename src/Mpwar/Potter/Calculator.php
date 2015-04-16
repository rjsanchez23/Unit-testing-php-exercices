<?php

namespace Mpwar\Potter;


class Calculator {

    const BOOK_1 = 'Harry Potter and the Philosopher\'s Stone';
    const BOOK_2 = 'Harry Potter and the Chamber of Secrets';
    const BOOK_3 = 'Harry Potter and the Prisoner of Azkaban';
    const BOOK_4 = 'Harry Potter and the Goblet of Fire';
    const BOOK_5 = 'Harry Potter and the Order of the Phoenix';
    const BOOK_6 = 'Harry Potter and the Half-Blood Prince';
    const BOOK_7 = 'Harry Potter and the Deathly Hallows';
    const BOOK_PRICE = 8;
    private $booksCollection = [];



    public function buyBook($book){

        $this->booksCollection[] = $book;

        if(count($this->booksCollection) == 1){
            return self::BOOK_PRICE;
        }

        if(!$this->collectionHasDuplicates($this->booksCollection)){
            return $this->calculateDifferentBooks($this->booksCollection);
        }

    }
    private function collectionHasDuplicates(Array $booksCollection){

        return count(array_unique($booksCollection))<count($booksCollection);

    }
    private function calculateDifferentBooks($temporalBooksCollection){

        $percent = 1-(((count($temporalBooksCollection)-1) * 5)/100);
        return ( count($temporalBooksCollection) * self::BOOK_PRICE * $percent );

    }

}