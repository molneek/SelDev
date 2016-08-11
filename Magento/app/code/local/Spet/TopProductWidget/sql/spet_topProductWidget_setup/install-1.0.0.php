<?php

$installer = $this;

$installer->startSetup();

$installer->addAttribute('catalog_product', 'is_top', array(
    'group'         => 'Education',
    'type'          => 'int',
    'backend'       => '',
    'frontend'      => '',
    'label'         => 'Is Top',
    'input'         => 'boolean',
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible'       => true,
    'required'      => false,
    'user_defined'  => true,
    'default'       => 0,
    'visible_on_front' => false,
    'used_in_product_listing' => true,
    'apply_to' => '',
    'sort_order'    => 10,
    'is_configurable' => 1,
));

$attrData = array(
    'is_top'=> '0',
);
$storeId = 0;
$productIds = Mage::getModel('catalog/product')->getCollection()->getAllIds();
Mage::getModel("catalog/product_action")->updateAttributes(
    $productIds,
    $attrData,
    $storeId
);

$installer->endSetup();