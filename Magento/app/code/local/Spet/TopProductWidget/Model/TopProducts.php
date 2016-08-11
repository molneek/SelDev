<?php

class Spet_TopProductWidget_Model_TopProducts extends Mage_Core_Model_Abstract
{
    /**
     * Get random products from database for widget.
     *
     * @param  array $options
     * @return array $data
     */
    public function getTopProducts($options)
    {
        $searchCollection = Mage::getModel('catalog/product')->getCollection()
            ->addFieldToFilter('is_top', array('eq' => 1))
            ->addAttributeToSelect(['name', 'thumbnail', 'product_url']);
        $searchCollection->getSelect()->order('RAND()')
                                      ->limit($options['widget_number']);


        foreach ($searchCollection as $product) {
            $data[] = [ 'name'  => $product->getName(),
                        'image' => $product->getThumbnail(),
                        'url'   => $product->getProductUrl()
                      ];
        }
        return $data;
    }
}