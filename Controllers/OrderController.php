<?php

require_once ROOT.'/Classes/OrderClass.php';
require_once ROOT.'/Classes/BookClass.php';
require_once ROOT.'/Classes/BuyerClass.php';
require_once ROOT.'/Service/OrderService.php';
require_once ROOT.'/Adapters/OrderAdapter.php';

class OrderController
{
    public function MakeOrderAction()
    {
        $summ =(int) $_GET['summ'];
        $time = $_GET['time'];
        $deliverylocation = (string) $_GET['deliverylocation'];
        $order = new Order
        ([
            'summ' => $summ,
            'time' => $time,
            'deliverylocation' => $deliverylocation,
        ]);
        $orderService = new OrderService();
        return $orderService->MakeOrder($order);
    }

    public function BindOrderToBook()
    {
        $orderid = $_GET['orderid'];
        $bookid = $_GET['bookid'];
        $order = new Order
        ([
            'orderid' => $orderid,
        ]);
        $book=new Book
        ([
            'bookid' => $bookid,
        ]);
        $orderService = new OrderService();
        return $orderService->BindOrderToBook($order,$book);
    }

    public function BindOrderToBuyerAction()
    {
        $orderid = $_GET['orderid'];
        $id = $_GET['id'];
        $order = new Order
        ([
            'orderid' => $orderid,
        ]);
        $buyer=new Buyer
        ([
            'id' => $id,
        ]);
        $orderService = new OrderService();
        return $orderService->BindOrderToBuyer($order,$buyer);
    }
}