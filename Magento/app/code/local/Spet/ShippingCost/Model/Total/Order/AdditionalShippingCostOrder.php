<?php

class Spet_ShippingCost_Model_Total_Order_AdditionalShippingCostOrder extends Mage_Core_Model_Abstract
{
    /**
     * @var float $_amount total additional shipping cost.
     */
    protected $_amount;

    /**
     * Method return additional shipping cost for current order.
     *
     * @param $orderId
     * @return float $_amount
     */
    public function getAdditionalShippingCostForOrder($orderId)
    {
        $orderCollection= Mage::getModel('sales/order_item')
            ->getCollection()
            ->addFieldToFilter('order_id', array('eq' => $orderId));
        foreach ($orderCollection as $item) {
            $this->_amount += $item->getAdditionalShippingCost();
        }
        return $this->_amount;
    }
}