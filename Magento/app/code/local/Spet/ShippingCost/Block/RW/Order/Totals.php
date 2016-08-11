<?php

class Spet_ShippingCost_Block_RW_Order_Totals extends Mage_Sales_Block_Order_Totals
{
    /**
     * @var float $_amount total additional shipping cost.
     */
    protected $_amount;

    /**
     * Initialize order totals array
     *
     * @return Mage_Sales_Block_Order_Totals
     */
    protected function _initTotals()
    {
        parent::_initTotals();

        $order = $this->getRequest()->getParams();
        $this->_amount = Mage::getModel('spet_shippingCost/total_order_additionalShippingCostOrder')
            ->getAdditionalShippingCostForOrder($order['order_id']);
        if ($this->_amount) {
            $this->addTotal(new Varien_Object(array(
                'code'      => 'spet_shippingCost',
                'value'     => $this->_amount,
                'base_value'=> $this->_amount,
                'label'     => $this->helper('spet_shippingCost')->__('Additional shipping cost'),
            )));
        }
        return $this;
    }
}