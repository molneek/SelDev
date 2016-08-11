<?php

class Spet_Price_Model_Adminhtml_ProductPrice_MultiplyPrice extends Spet_Price_Model_Adminhtml_ChangeValueAbstract
{
    /**
     * Method implements multiplication price.
     *
     * @param $changingValue
     * @param $oldValue
     * @return float
     */
    public function changeValue($changingValue, $oldValue)
    {
        return $oldValue * $changingValue;
    }
}