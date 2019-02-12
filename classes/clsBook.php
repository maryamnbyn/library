<?php
class book
{
    private $book_id;
    private $writerID;
    private $Name;
    private $dateOfPrint;
    private $title;
    private $numOfPrint;
    private $categoryID;
    private $objDB;
    private $dbError;



    public function __construct($bookID,$writerID,$Name,$dateOfPrint,$title,$numOfPrint,$categoryID,$bookImage
        ,PDO $db )
    {
        $this->book_id=$bookID;
        $this->writerID=$writerID;
        $this->Name=$Name;
        $this->dateOfPrint=$dateOfPrint;
        $this->title=$title;
        $this->numOfPrint=(int)$numOfPrint;
        $this->categoryID=$categoryID;
        $this->bookImage=$bookImage;

        $this->objDB=$db;


    }


    public function addThisbook()
    {
        $writerID=$this->writerID;
        $Name=$this->Name;
        $title=$this->title;
        $dateOfPrint=$this->dateOfPrint;
        $numOfPrint=$this->numOfPrint;
        $categoryID=$this->categoryID;



        if($this->checkbookExist()<1) {

            $insertQuery = "INSERT INTO `book`(
`writerID`,
`name`, 
`title`,
`date_of_print`,
`num_of_print`, 
`categoryID`) 
VALUES 
($writerID,
'$Name',
'$title',
'$dateOfPrint',
$numOfPrint,
$categoryID,
);
";
            $insertResult = $this->objDB->query($insertQuery);

            if ($insertResult) {

                $this->dbError="";
                $this->book_id=$this->objDB->insert_id;

                $this->setThisbookFromDB();
                return $this->book_id ;
            } else {
                $this->dbError = $this->objDB->error;
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }

    public function updateThisbook()
    {

        $writerID=$this->writerID;
        $Name=$this->Name;
        $title=$this->title;
        $dateOfPrint=$this->dateOfPrint;
        $numOfPrint=$this->numOfPrint;
        $categoryID=$this->categoryID;
        $book_ID=$this->book_id;

        $query="UPDATE 
`book` 
SET 
`writerID`=$writerID,
`name`=$Name,
`title`=$title,
`date_of_print`=$dateOfPrint,

`num_of_print`=$numOfPrint,
`categoryID`=$categoryID 
WHERE `id` = $book_ID";

        //echo $query."<hr>";

        $result_update=$this->objDB->query($query);

        if($result_update)
        {
            return true;
        }
        else
        {
            $this->dbError=$this->objDB->error;
            return false;
        }

        $this->setThisBookFromDB();

    }

    private function checkBookExist()
    {
        $Book_writerID=$this->writerID;
        $book_name=$this->name;

        $cgd6="SELECT * FROM tbl_book where writerID=$Book_writerID
 AND name=\"$book_name\"";

        $result=$this->objDB->query($cgd6);
        if($result)
        {
            $this->dbError="";
            return $result->num_rows;
        }
        else
        {
            $this->dbError=$this->objDB->error;
            return 1;
        }

    }

    public function getDbError()
    {
        return $this->dbError;
    }


    public function deleteThisBook()
    {
        $query="delete from tbl_book where id=".$this->book_id;
        $this->objDB->query($query);
        $this->book_id=-1;
    }


    public function getBookId()
    {
        return $this->book_id;
    }


    public function setBookId($book_id)
    {
        $this->book_id = $book_id;
    }

    public function getwriterID()
    {
        return $this->writerID;
    }


    public function setwriterID($writerID)
    {
        $this->brandID = $writerID;
    }


    public function getName()
    {
        return $this->Name;
    }


    public function setName($Name)
    {
        $this->Name = $Name;
    }


    public function getdateOfPrint()
    {
        return $this->dateOfPrint;
    }


    public function setdateOfPrint($dateOfPrint)
    {
        $this->model = $dateOfPrint;
    }


    public function getTitle()
    {
        return $this->title;
    }


    public function setTitle($title)
    {
        $this->price = $title;
    }


    public function getnumOfPrint()
    {
        return $this->camera;
    }

    public function setnumOfPrint($numOfPrint)
    {
        $this->camera = $numOfPrint;
    }


    public function getCategoryID()
    {
        return $this->categoryID;
    }


    public function setCategoryID($categoryID)
    {
        $this->off = $categoryID;
    }

    public function getPriceOff()
    {
        return $this->priceOff;
    }


    public function setPriceOff($priceOff)
    {
        $this->priceOff = $priceOff;
    }













}