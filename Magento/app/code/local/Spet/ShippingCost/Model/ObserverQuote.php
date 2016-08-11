<?php

class Spet_ShippingCost_Model_ObserverQuote
{
    /**
     * Get quote item from cart and set it additional shipping cost.
     *
     * @param $observer
     */
    public function salesQuoteItemSetCustomAttribute($observer)
    {
        $quoteItem = $observer->getQuoteItem();
        $parentItemId = $quoteItem->getParentItemId();
        if($parentItemId == null) {
            $product = $observer->getProduct();
            $quoteItem->setAdditionalShippingCost($product->getAdditionalShippingCost());
        }
    }
}