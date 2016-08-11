<?php

class Spet_TopProductWidget_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getParametersFromWidgetOptions()
    {
        $widgets = Mage::getModel('widget/widget_instance')->getCollection()
            ->addFieldToFilter('instance_type', 'topProductWidget/topProducts');

        return $params = $widgets->getData();
    }

}