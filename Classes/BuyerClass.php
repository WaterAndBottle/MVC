<?php

Class Buyer
{

    /**
     * @var string
     **/
    Private $buyerName;

    /**
     * @var string
     **/
    Private $buyerEmail;

    /**
     * @var
     */
    Public $id;

    /**
     * Buyer constructor.
     * @param array $data
     */
    public function __construct($data = array())
    {
        $this->buyerName = $data['buyerName'];
        $this->buyerEmail = $data['buyerEmail'];
        $this->id = $data['id'];
    }

    /**
     * @return mixed|string
     */
    public function getBuyerName()
    {
        if (!isset($this->buyerName)) {
            $buyerService = new BuyerService();
            if (!empty($this -> id)) {
                $this->buyerName = $buyerService->getBuyerNameByBuyerId($this->id);
            }
        }
        return $this->buyerName;
    }

    /**
     * @return mixed|string
     */
    public function getBuyerEmail()
    {
        if (!isset($this->buyerEmail)) {
            $buyerService = new BuyerService();
            if (!empty($this -> id)) {
                $this->buyerEmail = $buyerService->getBuyerEmailByBuyerId($this->id);
            }
        }
        return $this->buyerEmail;
    }

    /**
     * @return mixed|string
     */
    public function getBuyerid()
    {
        return $this->id;
    }

    /**
     * @param $buyerName
     * @return mixed
     */
    Public function setBuyerName($buyerName)
    {
        $this->buyerName = $buyerName;
        return $buyerName;
    }

    /**
     * @param $buyerEmail
     * @return string
     */
    Public function setBuyerEmail($buyerEmail)
    {
        if ($buyerEmail !== '' || preg_match("/@/", $buyerEmail))
        {
            $this->buyerEmail = $buyerEmail;
            $result['status'] = true;
            $result['message'] = 'Успешно';
            return $result;

        }
        else
            {
                $result['status'] = false;
                return $result['message'] = "Введите корректный email";
            }

    }
}
