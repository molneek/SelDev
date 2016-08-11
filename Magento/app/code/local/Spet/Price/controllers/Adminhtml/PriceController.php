<?php

class Spet_Price_Adminhtml_PriceController extends Mage_Adminhtml_Controller_Action
{

    /**
     * Implement change price, save it in database
     *     and redirect to the catalog product page.
     */
    public function indexAction()
    {
        $data = $this->getRequest()->getParams();
        if(!empty($data)) {
            $validator = Mage::Helper('spet_price/validation');

            if($validator->validateChangeValue($data['changeValue'])
                && $validator->validateExpression($data['expression'])) {
                $modelInstance = Mage::Helper('spet_price/priceFactory')
                    ->getChangeValueInstance($data['expression']);
                $priceUpdateMassaction = Mage::getModel('spet_price/adminhtml_productPrice_updatePrice');
                $priceUpdateMassaction->setDataFromProductGrid(
                    $data['changeValue'],
                    $data['product'],
                    $modelInstance
                );

                $falseProductId = $priceUpdateMassaction->getFalseProductId();

                if(!empty($falseProductId)) {
                    $this->_somePricesWasFalse($falseProductId);
                } else {
                    $this->_allPricesChanged($data['product']);
                }
            } else {
                $this->_falseValidation();
            }
        }

        $this->_redirect('*/catalog_product/index');
    }

    /**
     * Return error message if entered value got false validation.
     */
    protected function _falseValidation()
    {
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('spet_blog')
            ->__('Please enter valid value. Only positive numbers allowed. And no less than 0.01.'));
    }

    /**
     * Return success message if entered value change all prices normally.
     *
     * @param array $products
     */
    protected function _allPricesChanged($products)
    {
        Mage::getSingleton('adminhtml/session')->addSuccess(
            Mage::helper('spet_blog')->__('Price of %d record(s) were changed.', count($products))
        );
    }

    /**
     * Return success message about false changed prices.
     *
     * @param array $falsePrice
     */
    protected function _somePricesWasFalse($falsePrice)
    {
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('spet_blog')
            ->__('Price of %s weren\'t correct, it equal %s.', $falsePrice['sku'], $falsePrice['price']));
    }
}
