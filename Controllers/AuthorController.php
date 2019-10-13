<?php

require_once ROOT.'/Classes/AuthorClass.php';
require_once ROOT.'/Service/AuthorService.php';
require_once ROOT.'/Adapters/AuthorAdapter.php';

class AuthorController
{


    public function AddAuthorAction()
    {
        $authorName = $_GET['authorName'];
        $birthdate = (integer) $_GET['birthdate'];
        $author = new Author
        ([
            'authorName' => $authorName,
            'birthdate' => $birthdate,
        ]);
        $authorService = new AuthorService();
        return $authorService->AddAuthor($author);
    }


    public function EditAuthorAction()
    {
        $authorName = $_GET['authorName'];
        $birthdate = (integer) $_GET['birthdate'];
        $authorid=(integer) $_GET['authorid'];
        $author = new Author
        ([
            'authorName' => $authorName,
            'birthdate' => $birthdate,
            'authorid' => $authorid,
        ]);
        $authorService = new AuthorService();
        return $authorService->EditAuthor($author);
    }

    public function ShowAuthorInfoAction()
    {
        $authorid=(integer) $_GET['authorid'];
        $author = new Author
        ([
            'authorid' => $authorid,
        ]);
        $authorService = new AuthorService();
        return $authorService->ShowAuthorInfo($author);
    }
}