<?php

class Spet_Price_Model_Adminhtml_ProductPrice_SubPrice extends Spet_Price_Model_Adminhtml_ChangeValueAbstract
{
    /**
     * Method implements subtraction from price.
     *
     * @param $changingValue
     * @param $oldValue
     * @return float
     */
    public function changeValue($changingValue, $oldValue)
    {
        return $oldValue - $changingValue;
    }
}