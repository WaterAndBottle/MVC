<?php

require_once ROOT.'/Classes/AuthorClass.php';

class AuthorService
{

    public function getAuthorNameByAuthorId($authorid)
    {
        $result=false;
        if (!empty($authorid))
        {
            $authorAdapter=new AuthorAdapter();
            $result=$authorAdapter->getAuthorNameByAuthorId($authorid);
        }
        return $result;
    }



    public function getAuthorIdByName($authorName)
    {
        $result=false;
        if (!empty($authorName))
        {
            $authorAdapter=new AuthorAdapter();
            $result=$authorAdapter->getAuthorIdByName($authorName);
        }
        return $result;
    }


    /*    public function getAuthorBooksByAuthorId($authorid)
        {
            $result=false;
            if (!empty($authorid))
            {
                $authorAdapter=new AuthorAdapter();
                $result=$authorAdapter->getAuthorBooksByAuthorId($authorid);
            }
            return $result;
        }
    */
    public function getAuthorBirthDateByAuthorId($authorid)
    {
        $result=false;
        if (!empty($authorid))
        {
            $authorAdapter=new AuthorAdapter();
            $result=$authorAdapter->getAuthorBirthDateByAuthorId($authorid);
        }
        return $result;
    }

    public function AddAuthor($author)
    {
        $authorName = $author->getAuthorName();
        $birthdate=$author->getAuthorBirthDate();
        $result=false;
        if (!empty($authorName))
        {
            $authorInfo=array
            (
                $authorName=>'authorName',
                $birthdate=>'birthdate',
            );
            $authorAdapter = new AuthorAdapter();
            $result = $authorAdapter->AddAuthor($authorInfo);
        }
        return $result;
    }

    public function EditAuthor($author)
    {
        $authorName = $author->getAuthorName();
        $birthdate = $author->getAuthorBirthDate();
        $authorid = $author->getAuthorId();
        $result=false;
        if (!empty($authorid))
        {
            $authoredittedInfo=array
            (
                'authorName'=>$authorName,
                'birthdate'=>$birthdate,
                'authorid'=>$authorid,
            );
            $authorAdapter = new AuthorAdapter();
            $result = $authorAdapter->EditAuthor($authoredittedInfo);
        }
        return $result;
    }

    public function ShowAuthorInfo($author)
    {
        $authorid = $author->getAuthorId();
        $result=false;
        if (!empty($authorid))
        {
            $authorAdapter = new AuthorAdapter();
            $result = $authorAdapter->ShowAuthorInfo($authorid);
        }
        return $result;
    }
}