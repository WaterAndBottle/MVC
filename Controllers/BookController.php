<?php

require_once ROOT.'/Classes/BookClass.php';
require_once ROOT.'/Service/BookService.php';
require_once ROOT.'/Adapters/BookAdapter.php';

class BookController
{
    /**
     * @return mixed
     */
    public function AddBookAction()
    {
        $title = $_GET['title'];
        $author = $_GET['author'];
        $price = $_GET['price'];
            $book = new Book
            ([
                'title' => $title,
                'author' => $author,
                'price' => $price,
            ]);
            $BookService = new BookService();
            return $BookService->addBook($book);
    }

    /**
     * @return mixed
     */
    public function EditBookAction()
    {
        $title = $_GET['title'];
        $author = $_GET['author'];
        $year = $_GET['year'];
        $language = $_GET['language'];
        $isbn = $_GET['isbn'];
        $genre = $_GET['genre'];
        $price = (integer) $_GET['price'];
        $bookid = (integer) $_GET["bookid"];
        $book = new Book
            ([
            'title' => $title,
            'author' => $author,
            'year' => $year,
            'language' => $language,
            'isbn' => $isbn,
            'genre' => $genre,
            'price' => $price,
            'bookid' => $bookid,
            ]);
            $BookService = new BookService();
            return $BookService->EditBook($book);
    }

    /**
     * @return mixed
     */
    public function ShowBookInfoAction()
    {
        $bookid = (integer) $_GET["bookid"];
        $book = new Book
            ([
                'bookid' => $bookid,
            ]);
            $BookService = new BookService();
            return $BookService->ShowBookInfo($book);
    }

    /**
     * @return mixed
     */
    public function GroupByPriceAction()
    {
        $MaxPrice = (integer) $_GET['MaxPrice'];
        $MinPrice = (integer) $_GET['MinPrice'];
            $BookService = new BookService();
            return $BookService->GroupByPrice($MaxPrice,$MinPrice);
    }

    /**
     *
     */
    public function BindBookAuthorAction()
    {
            $bookid = $_GET['bookid'];
            $authorid = $_GET['authorid'];
            $book = new Book
            ([
                'bookid' => $bookid,
                'authorid' => $authorid,
            ]);
            $BookService = new BookService();
            return $BookService->BindBook($book);
    }
}