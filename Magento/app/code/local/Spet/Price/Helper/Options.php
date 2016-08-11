<?php

class Spet_Price_Helper_Options extends Mage_Core_Helper_Abstract
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
            ->loadModulesConfiguration('config.xml')
            ->getNode('global/price_mass_update/operations')
            ->asArray();
    }
}