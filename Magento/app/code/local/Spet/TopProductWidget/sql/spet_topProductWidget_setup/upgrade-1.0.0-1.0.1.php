<?php
$installer = $this;

$installer->startSetup();

$widgetParameters = array(
    'widget_title' => 'Top 3 Widget',
    'widget_number' => '3',
    'template' => 'spet_blog/topProductWidget/widget.phtml'
);

$instance = Mage::getModel('widget/widget_instance')->setData(array(
    'type' => 'topProductWidget/topProducts',
    'package_theme' => 'Spet/blog',
    'title' => 'Top products',
    'store_ids' => '0, 1, 2, 3',
    'widget_parameters' => serialize($widgetParameters),
    'page_groups' => array(array(
        'page_group' => 'all_pages',
        'all_pages' => array(
            'page_id' => null,
            'group' => 'all_pages',
            'layout_handle' => 'default',
            'block' => 'left',
            'for' => 'all',
            'template' => $widgetParameters['template'],
        )
    ))
))->save();

$installer->endSetup();