<?php

class Spet_Price_Helper_Validation extends Mage_Core_Helper_Abstract
{
    /**
     * Implements validation for entered value.
     *
     * @param $value
     * @return bool
     */
    public function validateChangeValue($value)
    {
        if(is_numeric($value) && $value >= 0.01) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Implements validation for expression.
     *
     * @param $value
     * @return bool
     */
    public function validateExpression($value)
    {
<<<<<<< HEAD
        $options = Mage::Helper('spet_price/options')->getOptionArray();
=======
        $options = Mage::getModel('spet_price/options')->getOptionArray();
>>>>>>> 6c2d23d9a9b01b8d22e0696ffddfe7dce13e4eca
        foreach ($options as $key => $label) {
            if($key == $value) {
                return true;
            }
        }
        return false;
    }
}
