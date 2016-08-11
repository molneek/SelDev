<?php

class Spet_Price_Helper_PriceFactory extends Mage_Core_Helper_Abstract
{
<<<<<<< HEAD
    public function getChangeValueInstance($expression)
    {
        $className = Mage::Helper('spet_price/options')->getModelName($expression);
=======
    /**
     * Get model instance.
     *
     * @param $expression
     * @return false|Mage_Core_Model_Abstract
     */
    public function getChangeValueInstance($expression)
    {
        $className = Mage::getModel('spet_price/options')->getModelName($expression);
>>>>>>> 6c2d23d9a9b01b8d22e0696ffddfe7dce13e4eca
        return Mage::getModel($className);
    }
}