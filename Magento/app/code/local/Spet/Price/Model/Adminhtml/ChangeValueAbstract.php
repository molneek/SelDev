<?php

abstract class Spet_Price_Model_Adminhtml_ChangeValueAbstract
{
    /**
     * Retrieves change value.
     *
     * @param $changingValue
     * @param $oldValue
     * @return int|float
     */
    abstract public function changeValue($changingValue, $oldValue);
}