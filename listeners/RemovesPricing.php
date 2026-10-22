<?php

namespace App\Listeners;

trait RemovesPricing
{
    /**
     * Drop elements marked data-pricing, so search results never show prices
     * in App Store mode (see the layout and main.js).
     */
    protected function withoutPricing(string $html): string
    {
        return preg_replace('/<(\w+)\b[^>]*\bdata-pricing\b[^>]*>.*?<\/\1>/s', '', $html);
    }
}
