<?php

class Spet_ShippingCost_Model_Total_Quote_AdditionalShippingCostInvoice
    extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    /**
     * @var float $_amount total additional shipping cost.
     */
    protected $_amount;

    /**
     * Collect totals information for Invoice
     *
     * @param Mage_Sales_Model_Order_Invoice $invoice
     * @return $this|Mage_Sales_Model_Quote_Address_Total_Abstract
     */
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {

        $order = $invoice->getOrder()->getData();

        $this->_amount = Mage::getModel('spet_shippingCost/total_order_additionalShippingCostOrder')
            ->getAdditionalShippingCostForOrder($order['entity_id']);

        if ($this->_amount) {
            $invoice->setGrandTotal($invoice->getGrandTotal() + $this->_amount);
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $this->_amount);
        }

        return $this;
    }
}