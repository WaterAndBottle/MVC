<?php


class AuthorAdapter
{

    public function getAuthorNameByAuthorId($authorid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT AuthorName FROM author WHERE id='.$authorid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['authorName'];
        return $data;
    }

    public function getAuthorBirthDateByAuthorId($authorid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT BirthDate FROM author WHERE id='.$authorid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['birthdate'];
        return $data;
    }

    public function getAuthorIdByName($authorName)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT AuthorId FROM author WHERE AuthorName='.$authorName;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['authorid'];
        return $data;
    }

    public function AddAuthor($authorInfo)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $result['status'] = false;
        $result['message'] = '';
        $sql = 'INSERT INTO author ';
        $sqlInsertColumns = array();
        $sqlInsertValue=array();
        foreach ($authorInfo as $value => $columns)
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

    public function EditAuthor($authoredittedInfo)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $result['status'] = false;
        $result['message'] = '';
        $authorid = $authoredittedInfo['authorid'];
        unset($authoredittedInfo['authorid']);
        var_dump($authoredittedInfo);
        $sql = 'UPDATE author SET ';
        $sqlInsert = array();
        foreach ($authoredittedInfo as $columns => $value) {
            if (!empty($value)) {
                $sqlInsert[] = ucfirst($columns).'='."'".$value."'";
            }
        }
        $sqlInsert = implode(',', $sqlInsert);
        if (!empty($sqlInsert)) {
            $dbdata = $mysqli->query($sql .$sqlInsert." "."WHERE AuthorId=".$authorid);
            $result=mysqli_fetch_assoc($dbdata);
        }
        return $result;
    }

    public function ShowAuthorInfo($authorid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT * FROM author WHERE AuthorId='.$authorid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        return $data;
    }

    public function ShowAuthorAndHisBooksInfo($authorid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT * FROM authorbook ab INNER JOIN author ON ab.Authorid=author.AuthorId INNER JOIN books ON ab.bookid=books.id WHERE ab.Authorid='.$authorid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        var_dump($data);
        return $data;
    }
}