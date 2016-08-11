<?php

$installer = $this;

$installer->startSetup();

$installer->getConnection()->addColumn($this->getTable('sales_flat_quote_item'),
    'additional_shipping_cost', 'decimal(12,4) NULL');
$installer->getConnection()->addColumn($this->getTable('sales_flat_order_item'),
    'additional_shipping_cost', 'decimal(12,4) NULL');

$installer->addAttribute('catalog_product', 'additional_shipping_cost', array(
    'group'         => 'Education',
    'type'          => 'decimal',
    'backend'       => '',
    'frontend'      => '',
    'label'         => 'Additional shipping cost',
    'input'         => 'text',
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible'       => true,
    'required'      => false,
    'user_defined'  => true,
    'default'       => 0,
    'visible_on_front' => false,
    'used_in_product_listing' => true,
    'apply_to' => '',
    'sort_order'    => 11,
    'is_configurable' => 1,
));

$installer->endSetup();