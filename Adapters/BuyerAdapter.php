<?php

require_once ROOT.'/Classes/Db.php';


class BuyerAdapter
{

    /**
     * @param $id
     * @return false|PDOStatement
     */

    public function getBuyerNameByBuyerId($id)
    {
        $db=Db::getConnection();
        $query='SELECT BuyerName FROM buyer WHERE  id='.$id;
        $result=$db->query($query);
        return $result;
    }

    /**
     * @param $id
     * @return false|PDOStatement
     */

    public function getBuyerEmailByBuyerId($id)
    {
        $db=Db::getConnection();
        $query='SELECT BuyerEmail FROM buyer WHERE id='.$id;
        $result=$db->query($query);
        return $result;
    }

    /**
     * @param $buyerName
     * @param $buyerEmail
     * @return array|bool|mysqli_result|null
     */

    public function addBuyerInfo($buyerName, $buyerEmail)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query="INSERT INTO buyer (Name,Email) VALUES ('$buyerName','$buyerEmail')";
        $arra=$mysqli->query($query);
        $result=$arra->fetch_assoc();
        return $result;
    }


    public function editBuyer($params)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $result['status'] = false;
        $result['message'] = '';
        $id = $params["id"];
        unset($params['id']);
        $sql = 'UPDATE buyer SET ';
        $sqlInsert = array();
        foreach ($params as $columns => $value) {
            if (!empty($value)) {
                $sqlInsert[] = $columns.'='."'".$value."'";
            }
        }
        $sqlInsert = implode(',', $sqlInsert);
        $sqlInsert=str_replace('buyer','',$sqlInsert);
        if (!empty($sqlInsert)) {
            $arra = $mysqli->query($sql .$sqlInsert. "WHERE id=".$id);
            $result=$arra->fetch_assoc();
        }
        return $result;
    }
}