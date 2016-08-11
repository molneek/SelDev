<?php

class Spet_Price_Model_Adminhtml_ProductPrice_UpdatePrice extends Mage_Core_Model_Abstract
{
    /**
     * @var array of products id.
     */
    protected $_productsIds;

    /**
     * @var int|float its value to change price.
     */
    protected $_changeValue;

    /**
     * @var object used of class.
     */
    protected $_modelInstance;

    /**
     * @var array get zero or negative prices.
     */
    protected $_falsePrices = array();

    /**
     * Retrieves data from product grid.
     *
     * @return array|bool $status
     */
    public function setDataFromProductGrid($changeValue, $products, $modelInstance)
    {
        $this->_productsIds = $products;
        $this->_changeValue = $changeValue;
        $this->_modelInstance = $modelInstance;
        $this->_updatePrice();
    }

    /**
     * @return array $_falsePrices if some price were negative.
     */
    public function getFalseProductId()
    {
        return $this->_falsePrices;
    }

    /**
     * Load price from database, call method for updating price and save it.
     *
     * @return bool|array $falsePrice.
     */
    protected function _updatePrice()
    {
        $validation = Mage::Helper('spet_price/validation');
        $productCollection = $this->_getProductCollection();

        foreach($productCollection as $product) {
            $oldPrice = $product->getPrice();
            $priceToSave = $this->_modelInstance->changeValue($this->_changeValue, $oldPrice);

            if(!$validation->validateChangeValue($priceToSave)) {
                $this->_falsePrices = [
                    'sku'   => $product->getSku(),
                    'price' => $priceToSave
                ];
                break;
            }

            $product->setPrice($priceToSave);
        }
        $productCollection->save();
    }

    /**
     * @return mixed get $productCollection.
     */
    protected function _getProductCollection()
    {
        $productCollection = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToFilter('entity_id', ['in' => $this->_productsIds])
            ->addAttributeToSelect('price', 'sku');

        return $productCollection;
    }
}
