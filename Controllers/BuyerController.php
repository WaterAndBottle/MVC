<?php

require_once ROOT.'/Classes/BuyerClass.php';
require_once ROOT.'/Service/BuyerService.php';
require_once ROOT.'/Adapters/BuyerAdapter.php';


class BuyerController
{
    /**
     * @var string
     */

    protected $controller='Buyer';

    /**
     * @var string
     */

    protected $method='index';

    /**
     * BuyerController constructor.
     */
    public function __construct()
    {
        require_once ROOT.'/Controllers/'.$this->controller.'Controller.php';
    }

    /**
     * @return bool
     */
    public function AddBuyerAction()
    {
        $buyerName = $_GET['buyerName'];
        $buyerEmail = $_GET['buyerEmail'];
        $buyer = new Buyer([
            'buyerName'=>$buyerName,
            'buyerEmail' => $buyerEmail,
        ]);
        $buyerService = new BuyerService();
        return $buyerService->addBuyerInfo($buyer);
    }

    /**
     * @return mixed
     */
    public function editProfileInfoAction()
    {
        $buyerName = $_GET['buyerName'];
        $buyerEmail = $_GET['buyerEmail'];
        $id = $_GET['id'];
        $buyer = new Buyer
        ([
            'buyerName' => $buyerName,
            'buyerEmail' => $buyerEmail,
            'id' => $id
        ]);
        $buyerService = new BuyerService();
        return $buyerService->editBuyerInfo($buyer);

    }

}