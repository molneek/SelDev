<?php

class Spet_ShippingCost_Model_Total_Quote_AdditionalShippingCostQuote
    extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    /**
     * @var float $_amount total additional shipping cost.
     */
    protected $_amount;

    public function __construct()
    {
        $this->setCode('spet_shippingCost');
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return Mage::helper('spet_shippingCost')->__('Additional shipping cost');
    }

    /**
     * Collect totals information about insurance
     *
     * @param   Mage_Sales_Model_Quote_Address $address
     * @return $this|Mage_Sales_Model_Quote_Address_Total_Abstract
     */
    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);
        if (($address->getAddressType() == 'billing')) {
            return $this;
        }

        $cart = Mage::getModel('checkout/cart')->getQuote();
        foreach ($cart->getAllItems() as $item) {
            $this->_amount += $item->getAdditionalShippingCost();
        }

        if ($this->_amount) {
            $this->_addAmount($this->_amount);
            $this->_addBaseAmount($this->_amount);
        }

        return $this;
    }

    /**
     * Add gift card totals information to address object
     *
     * @param   Mage_Sales_Model_Quote_Address $address
     * @return $this|array
     */
    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        if (($address->getAddressType() == 'billing')) {

            if ($this->_amount != 0) {
                $address->addTotal(array(
                    'code'  => $this->getCode(),
                    'title' => $this->getLabel(),
                    'value' => $this->_amount
                ));
            }
        }

        return $this;
    }
}