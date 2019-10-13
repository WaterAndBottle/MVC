<?php


class Book
{
    /**
     * @var string
     */

private $title;

    /**
     * @var string
     */

private $author;

    /**
     * @var integer
     */
private $year;

    /**
     * @var string
     */
private $language;

    /**
     * @var mixed
     */

private $isbn;

    /**
     * @var string
     */

private $genre;

    /**
     * @var integer
     */
private $price;

    /**
     * @var integer
     */

private $bookid;

    /**
     * @var integer
     */
private $bindid;

public function __construct($bookdata=array())
{
    $this->title=$bookdata['title'];
    $this->author=$bookdata['author'];
    $this->year=$bookdata['year'];
    $this->language=$bookdata['language'];
    $this->isbn=$bookdata['isbn'];
    $this->genre=$bookdata['genre'];
    $this->price=$bookdata['price'];
    $this->bookid=$bookdata['bookid'];
    $this->bindid=$bookdata['bindid'];
}

    /**
     * @return string
     */
    public function getBookTitle()
    {
        if (!isset($this->title)) {
            $BookService = new BookService();
            if (!empty($this -> bookid)) {
                $this->title = $BookService->getBookTitleByBookId($this->bookid);
            }
        }
        return $this->title;
    }

    /**
     * @param $title
     * @return string
     */
    public function setBookTitle($title)
    {
        if (is_string($title))
        {
            $this->title = $title;
            $result['status'] = true;
            $result['message'] = 'Успешно';
            return $result;
        }
        else
        {
            $result['status'] = false;
            return $result['message'] = 'Некорректно введено название книги';
        }
    }

    /**
     * @return string
     */
    public function getBookAuthor()
    {
        if (!isset($this->author)) {
            $BookService = new BookService();
            if (!empty($this -> bookid)) {
                $this->author = $BookService->getBookAuthorByBookId($this->bookid);
            }
        }
        return $this->author;
    }

    /**
     * @param $author
     * @return string
     */
    public function setBookAuthor($author)
    {
        if (is_string($author))
        {
            $this->author = $author;
            $result['status'] = true;
            $result['message'] = 'Успешно';
            return $result;
        }
        else
        {
            $result['status'] = false;
            return $result['message'] = 'Некорректно введен автор книги';
        }
    }

    /**
     * @return integer
     */
    public function getBookYear()
    {
        if (!isset($this->year)) {
            $BookService = new BookService();
            if (!empty($this -> bookid)) {
                $this->year = $BookService->getBookYearByBookId($this->bookid);
            }
        }
        return $this->year;
    }

    /**
     * @param $year
     * @return integer
     */
    public function setBookYear($year)
    {
        if ( preg_match("[0-9][4]", $year))
        {
            $this->year = $year;
            $result['status'] = true;
            $result['message'] = 'Успешно';
            return $result;
        }
        else
        {
            $result['status'] = false;
            $result['message'] = 'Некорректно введен год издания';
            return $result;
        }
    }

    /**
     * @return string
     */
    public function getBookLanguage()
    {
        if (!isset($this->language)) {
            $BookService = new BookService();
            if (!empty($this -> bookid)) {
                $this->language = $BookService->getBookLanguageByBookId($this->bookid);
            }
        }
        return $this->language;
    }

    /**
     * @param $language
     * @return string
     */
    public function setBookLanguage($language)
    {
        if (is_string($language))
        {
            $this->language = $language;
            $result['status'] = true;
            $result['message'] = 'Успешно';
            return $result;
        }
        else
        {
            $result['status'] = false;
            $result['message'] = 'Некорректно введен язык';
            return $result;
        }
    }

    /**
     * @return mixed
     */
    public function getBookIsbn()
    {
        if (!isset($this->isbn)) {
            $BookService = new BookService();
            if (!empty($this -> bookid)) {
                $this->isbn = $BookService->getBookISBNByBookId($this->bookid);
            }
        }
        return $this->isbn;
    }

    /**
     * @param $isbn
     * @return mixed
     */
    public function setBookIsbn($isbn)
    {
        if ( preg_match("/([0-9]+)-([0-9]+)-([0-9]+)/", $isbn))
        {
            $this->isbn = $isbn;
            $result['status'] = true;
            $result['message'] = 'Успешно';
            return $result;
        }
        else
        {
            $result['status'] = false;
            $result['message'] = 'Некорректно введен isbn книги';
            return $result;
        }
    }

    /**
     * @return string
     */
    public function getBookGenre()
    {
        if (!isset($this->genre)) {
            $BookService = new BookService();
            if (!empty($this -> bookid)) {
                $this->genre = $BookService->getBookGenreByBookId($this->bookid);
            }
        }
        return $this->genre;
    }

    /**
     * @param $genre
     * @return string
     */
    public function setBookGenre($genre)
    {
        if (is_string($genre))
        {
            $this->genre = $genre;
            $result['status'] = true;
            $result['message'] = 'Успешно';
            return $result;
        }
        else
        {
            $result['status'] = false;
            $result['message'] = 'Некорректно введен жанр книги';
            return $result;
        }
    }

    /**
     * @return integer
     */
    public function getBookPrice()
    {
        if (!isset($this->price)) {
            $BookService = new BookService();
            if (!empty($this -> bookid)) {
                $this->price = $BookService->getBookPriceByBookId($this->bookid);
            }
        }
        return $this->price;
    }

    /**
     * @param $price
     * @return integer
     */
    public function setBookPrice($price)
    {
        if (is_integer($price))
        {
            $this->price = $price;
            $result['status'] = true;
            $result['message'] = 'Успешно';
            return $result;
        }
        else
        {
            $result['status'] = false;
            $result['message'] = 'Некорректно введена стоимость книги';
            return $result;
        }
    }

    /**
     * @return integer
     */
    public function getBookId()
    {
        return $this->bookid;
    }

    /**
     * @return integer
     */
    public function getBindId()
    {
        return $this->bindid;
    }

    /**
     * @return int|mixed
     */
    public function getBookIdByBookName()
    {
        if (!isset($this->bookid))
        {
            $BookService = new BookService();
            if (!empty($this -> title)) {
                $this->bookid = $BookService->getBookIdByBookName($this->title);
            }
        }
        return $this->bookid;
    }
}