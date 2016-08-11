<?php

class Spet_TopProductWidget_Model_Observer {

    /**
     * Moved to Block class
     * @param Varien_Event_Observer $observer
     */
    public function addIsTopColumn(Varien_Event_Observer $observer)
    {
        /** @var $block Mage_Core_Block_Abstract */
        $block = $observer->getEvent()->getBlock();
        if ($block->getId() == 'productGrid') {

            $block->addColumnAfter('is_top',
                array(
                    'header'  => Mage::helper('catalog')->__('Is top'),
                    'width'   => '80px',
                    'type'    => 'options',
                    'options' => $this->getOptionArray(),
                    'index'   => 'is_top',
                ), 'name');

            $block->sortColumnsByOrder();
        }
    }

    /**
     * Get collection from database and add 'is_top' attribute to select.
     *
     * @param Varien_Event_Observer $observer
     */
    public function getProductCollection(Varien_Event_Observer $observer)
    {
        $observer->getCollection()->addAttributeToSelect('is_top');
    }

    /**
     * Get array of options to change price.
     *
     * @return array $options.
     */
    public function getOptionArray()
    {
        $options = [
            0  => 'No',
            1  => 'Yes'
        ];

        return $options;
    }
}

