<?php

require_once ROOT.'/Classes/BookClass.php';

class BookService
{
    /**
     * @param $bookid
     * @return bool
     */
    public function getBookTitleByBookId($bookid)
    {
        $result=false;
        if (!empty($bookid))
        {
            $bookAdapter=new BookAdapter();
            $result=$bookAdapter->getBookTitleByBookId($bookid);
        }
        return $result;
    }

    /**
     * @param $bookid
     * @return bool
     */
    public function getBookAuthorByBookId($bookid)
    {
        $result=false;
        if (!empty($bookid))
        {
            $bookAdapter=new BookAdapter();
            $result=$bookAdapter->getBookAuthorByBookId($bookid);
        }
        return $result;
    }

    /**
     * @param $bookid
     * @return bool
     */
    public function getBookYearByBookId($bookid)
    {
        $result=false;
        if (!empty($bookid))
        {
            $bookAdapter=new BookAdapter();
            $result=$bookAdapter->getBookYearByBookId($bookid);
        }
        return $result;
    }

    /**
     * @param $bookid
     * @return bool
     */
    public function getBookLanguageByBookId($bookid)
    {
        $result=false;
        if (!empty($bookid))
        {
            $bookAdapter=new BookAdapter();
            $result=$bookAdapter->getBookLanguageByBookId($bookid);
        }
        return $result;
    }

    /**
     * @param $bookid
     * @return bool
     */
    public function getBookISBNByBookId($bookid)
    {
        $result=false;
        if (!empty($bookid))
        {
            $bookAdapter=new BookAdapter();
            $result=$bookAdapter->getBookISBNByBookId($bookid);
        }
        return $result;
    }

    /**
     * @param $bookid
     * @return bool
     */
    public function getBookGenreByBookId($bookid)
    {
        $result=false;
        if (!empty($bookid))
        {
            $bookAdapter=new BookAdapter();
            $result=$bookAdapter->getBookGenreByBookId($bookid);
        }
        return $result;
    }

    /**
     * @param $bookid
     * @return bool
     */
    public function getBookPriceByBookId($bookid)
    {
        $result=false;
        if (!empty($bookid))
        {
            $bookAdapter=new BookAdapter();
            $result=$bookAdapter->getBookPriceByBookId($bookid);
        }
        return $result;
    }

    public function getBookIdByBookName($title)
    {
        $result=false;
        if (!empty($title))
        {
            $bookAdapter=new BookAdapter();
            $result=$bookAdapter->getBookIdByBookName($title);
        }
        return $result;
    }

    /**
     * @param $book
     * @return bool
     */
    public function AddBook($book)
    {
        $title = $book->getBookTitle();
        $author = $book->getBookAuthor();
        $year = $book->getBookYear();
        $language = $book->getBookLanguage();
        $isbn = $book->getBookIsbn();
        $genre = $book->getBookGenre();
        $price = $book->getBookPrice();
        $result=false;
        if (!empty($title) && !empty($price) && !empty($author))
        {
            $bookinfo=array
            (
                $title=>'title',
                $author=>'author',
                $year=>'year',
                $language=>'language',
                $isbn=>'isbn',
                $genre=>'$genre',
                $price=>'price'
            );
            $BookAdapter = new BookAdapter();
            $result = $BookAdapter->AddBook($bookinfo);
        }
        return $result;
    }

    /**
     * @param $book
     * @return bool
     */
    public function EditBook($book)
    {
        $title = $book->getBookTitle();
        $author = $book->getBookAuthor();
        $year = $book->getBookYear();
        $language = $book->getBookLanguage();
        $isbn = $book->getBookIsbn();
        $genre = $book->getBookGenre();
        $price = $book->getBookPrice();
        $bookid=$book->getBookId();
        $result=false;
        if (!empty($bookid))
        {
            $edittedbookinfo=array
            (
                "title" => $title,
                "author" => $author,
                "year" => $year,
                "language" => $language,
                "isbn" => $isbn,
                "genre" => $genre,
                "price" => $price,
                "bookid" => $bookid,
            );
            $BookAdapter = new BookAdapter();
            $result = $BookAdapter->EditBook($edittedbookinfo);
        }
        return $result;
    }

    /**
     * @param $book
     * @return bool
     */
    public function ShowBookInfo($book)
    {
        $bookid=$book->getBookId();
        $result=false;
        if (!empty($bookid))
        {
            $BookAdapter = new BookAdapter();
            $result = $BookAdapter->ShowBookInfo($bookid);
        }
        return $result;
    }

    /**
     * @param $MaxPrice
     * @param $MinPrice
     * @return bool
     */
    public function GroupByPrice($MaxPrice,$MinPrice)
    {
        $result=false;
        if (!empty($MaxPrice)&&!empty($MinPrice))
        {
            $BookAdapter = new BookAdapter();
            $result = $BookAdapter->GroupByPrice($MaxPrice,$MinPrice);
        }
        return $result;
    }


    public function BindBook($book)
    {
        $bookid = $book->getBookId();
        $authorid = $book->getAuthorId();
        $result=false;
        if (!empty($bookid)&&!empty($authorid))
        {
            $bindinfo=array
            (
                "bookid" => $bookid,
                "authorid" => $authorid,
            );
            $BookAdapter = new BookAdapter();
            $result = $BookAdapter->EditBook($bindinfo);
        }
        return $result;
    }
}