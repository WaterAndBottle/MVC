<?php

require_once ROOT.'/Classes/BuyerClass.php';

class BuyerService
{
    /**
     * @param $id
     * @return bool|false|PDOStatement
     */

    public function getBuyerNameByBuyerId($id)
    {
        $result=false;
        if (!empty($id))
        {
            $buyerAdapter=new BuyerAdapter();
            $result=$buyerAdapter->getBuyerNameByBuyerId($id);
        }
        return $result;
    }

    /**
     * @param $id
     * @return bool|false|PDOStatement
     */

    public function getBuyerEmailByBuyerId($id)
    {
        $result=false;
        if (!empty($id))
        {
            $buyerAdapter=new BuyerAdapter();
            $result=$buyerAdapter->getBuyerEmailByBuyerId($id);
        }
        return $result;
    }

    /**
     * @param $buyer
     * @return bool
     */

    public function addBuyerInfo($buyer)
    {
        $buyerEmail = $buyer->getBuyerEmail();
        $buyerName = $buyer->getBuyerName();
        $result = false;
        if (!empty($buyerEmail) && !empty($buyerName))
        {
            $buyerAdapter = new BuyerAdapter();
            $result = $buyerAdapter->addBuyerInfo($buyerName, $buyerEmail);
        }
        return $result;
    }

    /**
     * @param $buyer
     * @return bool
     */
    public function editBuyerInfo($buyer)
    {
        $buyerEmail = $buyer->getBuyerEmail();
        $buyerName = $buyer->getBuyerName();
        $id=$buyer->getBuyerid();
        $result = false;
        if (!empty($buyerEmail) && !empty($buyerName)) {
            $buyerAdapter = new BuyerAdapter();
            $params=array("buyerName"=>$buyerName,"buyerEmail"=>$buyerEmail,"id"=>$id);
            $result = $buyerAdapter->editBuyer($params);
        }
        return $result;
    }
}