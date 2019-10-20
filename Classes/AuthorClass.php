<?php


class Author
{
    /**
     * @var string
     */
private $authorName;

    /**
     * @var int
     */
private $birthdate;

    /**
     * @var int
     */
private $authorid;

    /**
     * @var int
     */
private $authorbookid;

    /**
     * AuthorClass constructor.
     * @param array $authordata
     */
public function __construct($authordata=array())
{
    $this->authorName=$authordata['authorName'];
    $this->birthdate=$authordata['birthdate'];
    $this->authorid=$authordata['authorid'];
    $this->authorbookid=$authordata['authorbookid'];

}

    /**
     * @return mixed
     */
    public function getAuthorName()
    {
        if (!isset($this->authorName))
        {
            $authorService = new AuthorService();
            if (!empty($this -> authorid))
            {
                $this->authorName = $authorService->getAuthorNameByAuthorId($this->authorid);
            }
        }
        return $this->authorName;
    }

    /**'
     * @param $authorName
     * @return string
     */
    public function setAuthorName($authorName)
    {
        if (is_string($authorName))
        {
            $this->authorName = $authorName;
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
     * @return int|mixed
     */
    public function getAuthorBirthDate()
    {
        if (!isset($this->birthdate))
        {
            $authorService = new AuthorService();
            if (!empty($this -> authorid))
            {
                $this->birthdate = $authorService->getAuthorBirthDateByAuthorId($this->authorid);
            }
        }
        return $this->birthdate;
    }

    /**
     * @param $birthdate
     * @return mixed
     */
    public function setBirthDate($birthdate)
    {
        if ( preg_match("[0-9]{4}", $birthdate))
        {
            $this->birthdate = $birthdate;
            $result['status'] = true;
            $result['message'] = 'Успешно';
            return $result;
        }
        else
        {
            $result['status'] = false;
            $result['message'] = 'Некорректно введен год рождения автора';
            return $result;
        }
    }

    /**
     * @return int
     */
    public function getAuthorId()
    {
        return $this->authorid;
    }

}