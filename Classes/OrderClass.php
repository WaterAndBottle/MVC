<?php


class Order
{
    /**
     * @var int
     */
    private $summ;

    /**
     * @var mixed
     */
    private $time;

    /**
     * @var string
     */
    private $deliverylocation;
    /**
     * @var int
     */
    private $orderid;

    public function __construct($data = array())
    {
        $this->summ = $data['summ'];
        $this->time = $data['time'];
        $this->deliverylocation = $data['deliverylocation'];
        $this->orderid = $data['orderid'];
    }

    /**
     * @return int
     */
    public function getSummById()
    {
        if (!isset($this->summ)) {
            $orderService = new OrderService();
            if (!empty($this->orderid)) {
                $this->summ = $orderService->getSummById($this->orderid);
            }
        }
        return $this->summ;
    }

    /**
     * @param $summ
     * @return int/string
     */
    public function setSumm($summ)
    {
        if (is_integer($summ)) {
            $this->summ = $summ;
            $result['status'] = true;
            $result['message'] = 'Успешно';
            return $result;
        } else {
            $result['status'] = false;
            return $result['message'] = 'Некорректный тип данных';
        }
    }

    /**
     * @return mixed
     */
    public function getTimeById()
    {
        if (!isset($this->time)) {
            $orderService = new OrderService();
            if (!empty($this->orderid)) {
                $this->time = $orderService->getTimeById($this->orderid);
            }
        }
        return $this->time;
    }

    /**
     * @param $time
     * @return mixed
     */
    public function setTime($time)
    {
        if ( preg_match("[0-9]{2},[0-9]{2},[0-9]{2}", $time))
        {
            $this->time = $time;
            $result['status'] = true;
            $result['message'] = 'Успешно';
            return $result;
        }
        else
        {
            $result['status'] = false;
            $result['message'] = 'Некорректно введено время осуществления заказа';
            return $result;
        }
    }

    /**
     * @return string
     */
    public function DeliveryLocation()
    {
        if (!isset($this->deliverylocation)) {
            $orderService = new OrderService();
            if (!empty($this->orderid)) {
                $this->deliverylocation = $orderService->getDeliverylocationById($this->orderid);
            }
        }
        return $this->deliverylocation;
    }

    /**
     * @param $deliverylocation
     * @return string
     */
    public function setDeliveryLocation($deliverylocation)
    {
        if (is_string($deliverylocation))
        {
            $this->deliverylocation = $deliverylocation;
            $result['status'] = true;
            $result['message'] = 'Успешно';
            return $result;
        }
        else
        {
            $result['status'] = false;
            $result['message'] = 'Некорректно введен адресс';
            return $result;
        }
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderid;
    }
}