<?php

class Spet_Price_Model_Observer
{
    /**
     * Observer executed at the event when opened catalog product page.
     *    Adds new mass action, and redirects to executable controller.
     *
     * @param resource $observer
     */
    public function addMassActionToCatalogProduct($observer)
    {
        $block = $observer->getEvent()->getBlock();
        if(get_class($block) =='Mage_Adminhtml_Block_Widget_Grid_Massaction'
            && $block->getRequest()->getControllerName() == 'catalog_product')
        {
<<<<<<< HEAD
            $statuses = Mage::Helper('spet_price/options')->getOptionArray();
=======
            $statuses = Mage::getModel('spet_price/options')->getOptionArray();
>>>>>>> 6c2d23d9a9b01b8d22e0696ffddfe7dce13e4eca

            $block->addItem('price', array(
                'label' => 'Change price',
                'url' => Mage::app()->getStore()->getUrl('adminhtml/price/index'),
                'additional' => array(
                    'expression' => array(
                        'name'   => 'expression',
                        'type'   => 'select',
                        'class'  => 'required-entry',
                        'label'  => 'Expression',
                        'values' => $statuses
                    ),
                    'number' => array(
                        'name'  => 'changeValue',
                        'type'  => 'text',
                        'class' => 'required-entry',
                        'label' => 'Value'
                    )
            )));
        }

    }
}
