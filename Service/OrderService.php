<?php

require_once ROOT.'/Classes/OrderClass.php';

class OrderService
{
    public function getSummById($orderid)
    {
        $result = false;
        if (!empty($orderid)) {
            $orderAdapter = new OrderAdapter();
            $result = $orderAdapter->getSummById($orderid);
        }
        return $result;
    }

    public function getTimeById($orderid)
    {
        $result = false;
        if (!empty($orderid)) {
            $orderAdapter = new OrderAdapter();
            $result = $orderAdapter->getTimeById($orderid);
        }
        return $result;
    }

    public function getDeliverylocationById($orderid)
    {
        $result = false;
        if (!empty($orderid)) {
            $orderAdapter = new OrderAdapter();
            $result = $orderAdapter->getDeliverylocationById($orderid);
        }
        return $result;
    }

    public function MakeOrder($order)
    {
        $summ = $order->getSummById();
        $time = $order->getTimeById();
        $deliverylocation = $order->getDeliverylocationById();
        $result=false;
        if (!empty($summ)&&!empty($deliverylocation))
        {
            $orderInfo=array
            (
                $summ=>'summ',
                $time=>'time',
                $deliverylocation=>'deliverylocation',
            );
            $orderAdapter = new OrderAdapter();
            $result = $orderAdapter->MakeOrder($orderInfo);
        }
        return $result;
    }

    public function BindOrderToBook($order,$book)
    {
        $bookid = $book->getBookId();
        $bookids = explode(',', $bookid);;
        $orderid = $order->getOrderId();
        $result = false;
        if (!empty($orderid) && !empty($bookid)) {
            $orderAdapter = new OrderAdapter();
            $result = $orderAdapter->BindOrderToBook($orderid, $bookids);
        }
        return $result;
    }
        public function BindOrderToBuyer($order,$buyer)
    {
        $orderid = $order->getOrderId();
        $orders=explode(',',$order);
        $buyerid = $buyer->getBuyerid();
        $result=false;
        if (!empty($orderid)&&!empty($buyerid))
        {
            $orderAdapter = new OrderAdapter();
            $result = $orderAdapter->BindOrderToBuyer($orders,$buyerid);
        }
        return $result;
    }
}