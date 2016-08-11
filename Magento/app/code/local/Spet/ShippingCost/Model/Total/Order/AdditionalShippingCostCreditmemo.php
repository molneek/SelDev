<?php

class Spet_ShippingCost_Model_Total_Quote_AdditionalShippingCostCreditmemo
    extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
    /**
     * @var float $_amount total additional shipping cost.
     */
    protected $_amount;

    /**
     * Collect totals information for credit memo
     *
     * @param Mage_Sales_Model_Order_Creditmemo $creditmemo
     * @return $this|Mage_Sales_Model_Quote_Address_Total_Abstract
     */
    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {
        $order = $creditmemo->getOrder()->getData();

        $this->_amount = Mage::getModel('spet_shippingCost/total_order_additionalShippingCostOrder')
            ->getAdditionalShippingCostForOrder($order['entity_id']);

        if ($this->_amount) {
            $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $this->_amount);
            $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $this->_amount);
        }

        return $this;
    }
}