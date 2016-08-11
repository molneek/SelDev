<?php

class Spet_Price_Model_Adminhtml_ProductPrice_SumPercentPrice extends Spet_Price_Model_Adminhtml_ChangeValueAbstract
{
    /**
     * Method implements percent summing price.
     *
     * @param $changingValue
     * @param $oldValue
     * @return float
     */
    public function changeValue($changingValue, $oldValue)
    {
        return $oldValue + ($oldValue * $changingValue / 100);
    }
}