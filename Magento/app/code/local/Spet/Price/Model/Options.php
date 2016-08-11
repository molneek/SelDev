<?php

class Spet_Price_Model_Options extends Mage_Core_Model_Abstract
{
    /**
     * Get array of options to change price.
     *
     * @return array $options.
     */
    public function getOptionArray()
    {
        $optionsFromConfig = $this->_getOptionsFromConfig();
        foreach ($optionsFromConfig as $key => $value) {
            $options[$key] = $value['label'];
        }
        return $options;
    }

    /**
     * Get model name.
     *
     * @return string.
     */
    public function getModelName($expression)
    {
        $optionsFromConfig = $this->_getOptionsFromConfig();
        return $optionsFromConfig[$expression]['class'];
    }

    /**
     * Get options array from config.xml.
     *
     * @return array.
     */
    protected function _getOptionsFromConfig()
    {
        return Mage::getConfig()
            ->getNode('global/price_mass_update/operations')
            ->asArray();
    }
}