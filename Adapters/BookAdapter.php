<?php

require_once ROOT.'/Classes/Db.php';



class BookAdapter
{

    /**
     * @param $bookid
     * @return array|null
     */
    public function getBookTitleByBookId($bookid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT Title FROM books WHERE id='.$bookid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['Title'];
        return $data;
    }

    /**
     * @param $bookid
     * @return array|null
     */
    public function getBookAuthorByBookId($bookid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT Author FROM books WHERE id='.$bookid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['Author'];
        return $data;
    }

    /**
     * @param $bookid
     * @return array|null
     */
    public function getBookYearByBookId($bookid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT Year FROM books WHERE id='.$bookid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['Year'];
        return $data;
    }

    /**
     * @param $bookid
     * @return array|null
     */
    public function getBookLanguageByBookId($bookid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT Language FROM books WHERE id='.$bookid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['Language'];
        return $data;
    }

    /**
     * @param $bookid
     * @return array|null
     */
    public function getBookISBNByBookId($bookid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT ISBN FROM books WHERE id='.$bookid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['ISBN'];
        return $data;
    }

    /**
     * @param $bookid
     * @return array|null
     */
    public function getBookGenreByBookId($bookid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT Genre FROM books WHERE id='.$bookid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['Genre'];
        return $data;
    }

    /**
     * @param $bookid
     * @return array|null
     */
    public function getBookPriceByBookId($bookid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT Price FROM books WHERE id='.$bookid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['Price'];
        return $data;
    }

    /**
     * @param $title
     * @return array|null
     */
    public function getBookIdByBookName($title)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT id FROM books WHERE Title='.$title;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['bookid'];
        return $data;
    }

    /**
     * @param $bookinfo
     * @return array|null
     */
    public function AddBook($bookinfo)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $result['status'] = false;
        $result['message'] = '';
        $sql = 'INSERT INTO books ';
        $sqlInsertColumns = array();
        $sqlInsertValue=array();
        foreach ($bookinfo as $value => $columns)
        {
            if (!empty($value))
            {
                $sqlInsertColumns[] = ucfirst($columns);
                if (is_string($value))
                {
                    $sqlInsertValue[]="'".$value."'";
                }
                else
                {
                    $sqlInsertValue[]=$value;
                }

            }
        }
        $sqlInsertColumns = implode(',', $sqlInsertColumns);
        $sqlInsertValue = implode(',', $sqlInsertValue);
        if (!empty($sqlInsertColumns)&&!empty($sqlInsertValue))
        {
            $dbdata = $mysqli->query($sql ."(".$sqlInsertColumns.")"." "."VALUES".""."(".$sqlInsertValue.")");
            $result=mysqli_fetch_assoc($dbdata);
        }
        return $result;
    }

    /**
     * @param $edittedbookinfo
     * @return array|null
     */
    public function EditBook($edittedbookinfo)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $result['status'] = false;
        $result['message'] = '';
        $id = $edittedbookinfo['bookid'];
        unset($edittedbookinfo['bookid']);
        var_dump($edittedbookinfo);
        $sql = 'UPDATE books SET ';
        $sqlInsert = array();
        foreach ($edittedbookinfo as $columns => $value) {
            if (!empty($value)) {
                $sqlInsert[] = ucfirst($columns).'='."'".$value."'";
            }
        }
        $sqlInsert = implode(',', $sqlInsert);
        if (!empty($sqlInsert)) {
            $dbdata = $mysqli->query($sql .$sqlInsert." "."WHERE id=".$id);
            $result=mysqli_fetch_assoc($dbdata);
        }
        return $result;
    }

    /**
     * @param $bookid
     * @return array|null
     */
    public function ShowBookInfo($bookid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT * FROM books WHERE id='.$bookid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        return $data;
    }


    public function GroupByPrice($MaxPrice,$MinPrice)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT Author FROM books WHERE Price<'.$MaxPrice." ".'&&'." ".'Price>'.$MinPrice;
        $result=$mysqli->query($query);
        for ($data = array (); $row = $result->fetch_assoc(); $data[] = $row);
        return $data;
    }

    public function BindBook($bindinfo)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $result['status'] = false;
        $result['message'] = '';
        $sql = 'INSERT INTO authorbook ';
        $sqlInsertColumns = array();
        $sqlInsertValue=array();
        foreach ($bindinfo as $value => $columns)
        {
            if (!empty($value))
            {
                $sqlInsertColumns[] = ucfirst($columns);
                if (is_integer($value))
                {
                    $sqlInsertValue[]="'".$value."'";
                }
                else
                {
                    $sqlInsertValue[]=$value;
                }

            }
        }
        $sqlInsertColumns = implode(',', $sqlInsertColumns);
        $sqlInsertValue = implode(',', $sqlInsertValue);
        if (!empty($sqlInsertColumns)&&!empty($sqlInsertValue))
        {
            $dbdata = $mysqli->query($sql ."(".$sqlInsertColumns.")"." "."VALUES".""."(".$sqlInsertValue.")");
            var_dump($sql ."(".$sqlInsertColumns.")"." "."VALUES"." "."(".$sqlInsertValue.")");
            var_dump($mysqli);

            $result=mysqli_fetch_assoc($dbdata);
        }
        return $result;
    }
}