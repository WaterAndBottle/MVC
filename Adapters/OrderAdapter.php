<?php


class OrderAdapter
{

    public function getSummById($orderid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT Summ FROM order WHERE id='.$orderid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['orderid'];
        return $data;
    }
    public function getTimeById($orderid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT Time FROM order WHERE id='.$orderid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['time'];
        return $data;
    }
    public function getDeliverylocationById($orderid)
    {
        $mysqli=new mysqli('localhost','root','','myfirst');
        $query='SELECT DeliveryLocation FROM order WHERE id='.$orderid;
        $result=$mysqli->query($query);
        $data=mysqli_fetch_assoc($result);
        $data=$data['deliverylocation'];
        return $data;
    }
}