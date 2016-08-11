<?php

class Spet_TopProductWidget_Block_TopProducts extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{
    /**
     * Get oprions from widget config and get products from database
     *
     * @return mixed $products
     */
    public function getWidgetData()
    {
        $widgetOptions = Mage::Helper('spet_topProductWidget')->getParametersFromWidgetOptions();
        $options = unserialize($widgetOptions[0]['widget_parameters']);
        $products = Mage::getModel('topProductWidget/topProducts')->getTopProducts($options);
        $products['title'] = $options['widget_title'];
        return $products;
    }
}