<?php

namespace Mpwar\Potter;


class Calculator
{

    const BOOK_1 = 0;//'Harry Potter and the Philosopher\'s Stone';
    const BOOK_2 = 5;//'Harry Potter and the Chamber of Secrets';
    const BOOK_3 = 10;//'Harry Potter and the Prisoner of Azkaban';
    const BOOK_4 = 15;//'Harry Potter and the Goblet of Fire';
    const BOOK_5 = 25;//'Harry Potter and the Order of the Phoenix';
    const BOOK_6 = 30;//'Harry Potter and the Half-Blood Prince';
    const BOOK_7 = 35;//'Harry Potter and the Deathly Hallows';
    const BOOK_PRICE = 8.00;
    private $booksCollection = [];


    public function buyBook($book)
    {

        return $this->addToCart($book);

    }

    private function addToCart($book)
    {
        $this->booksCollection[] = $book;
        if ($amountAllDuplicated = $this->oneOrAllDuplicated($this->booksCollection)) {
            return $amountAllDuplicated;
        }

        $amountOfEachBook = $this->amountOfEachBook();
        return $this->priceByBestDiscount($amountOfEachBook);

    }

    private function priceByBestDiscount(Array $amountOfEachBook)
    {

        $result = 0;
        while (count(array_filter($amountOfEachBook, function ($n) {
            return $n > 1;
        }))) {

            $orderLine = $this->newOrderLine($amountOfEachBook);
            $this->changeBooksOfOrderLine($orderLine, $amountOfEachBook);
            $result += $this->calculateAmount($orderLine);

        }

        $result += $this->calculateAmount($amountOfEachBook);

        return $result;
    }

    private function newOrderLine(Array &$booksCollection)
    {
        $orderLine = [];

        foreach ($booksCollection as $book => $occurrences) {
            if ($occurrences > 0) {
                $booksCollection[$book] = $occurrences - 1;
                $orderLine[$book] = 1;
            } else {
                $booksCollection[$book] = $occurrences;
                $orderLine[$book] = $occurrences;
            }
        }
        return $orderLine;
    }

    private function changeBooksOfOrderLine(Array &$orderLine, Array &$booksCollection)
    {
        if (array_sum($orderLine) > 5) {
            $books = array_sum($orderLine) - 5;

            while ($books > 0) {
                if (($book = array_search(0, $booksCollection)) !== false) {
                    $booksCollection[$book] = 1;
                } else {
                    reset($booksCollection);
                    $booksCollection[key($booksCollection)] += 1;
                }
                $books -= 1;
            }
            $orderLine = array_slice($orderLine, 0, 5);
        }
    }

    private function amountOfEachBook()
    {
        return array_count_values($this->booksCollection);
    }

    private function calculateAmount(Array $booksCollection)
    {
        $constantNumber = array_sum($booksCollection);
        $percent = 1 - (constant("self::BOOK_$constantNumber") / 100);

        return (array_sum($booksCollection) * self::BOOK_PRICE * $percent);
    }


    private function oneOrAllDuplicated($booksCollection)
    {

        $amountOfEachBook = $this->amountOfEachBook();

        if (count(array_unique($amountOfEachBook)) == 1) {
            reset($amountOfEachBook);
            return $this->calculateAmount(array(count(array_unique($booksCollection)))) * $amountOfEachBook[key($amountOfEachBook)];
        }
        return false;

    }


}