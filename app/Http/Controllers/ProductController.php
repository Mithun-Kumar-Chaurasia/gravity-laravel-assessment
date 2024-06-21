<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct() {

    }

    public function offer(Request $request) {
        $rule = $request->rule;
        $products = $request->products;

        
        $discountedItems = [];
        $payableItems = [];
        
        // Sort prices in descending order for compare
        rsort($products);

        switch ($rule) {
            case 1:
                // Rule 1 Buy one get one free (free item <= first item)
                while (count($products) > 1) {
                    $payableItem = array_shift($products);
                    foreach ($products as $key => $price) {
                        if ($price <= $payableItem) {
                            $discountedItems[] = $price;
                            unset($products[$key]);
                            $products = array_values($products);
                            break;
                        }
                    }
                    $payableItems[] = $payableItem;
                }
                break;

            case 2:
                // Rule 2 Buy one get one free (free item < first item)
                while (count($products) > 1) {
                    $payableItem = array_shift($products);
                    foreach ($products as $key => $price) {
                        if ($price < $payableItem) {
                            $discountedItems[] = $price;
                            unset($products[$key]);
                            $products = array_values($products);
                            break;
                        }
                    }
                    $payableItems[] = $payableItem;
                }
                break;

            case 3:
                // Rule 3 Buy two get two free (free item < first item)
                while (count($products) > 1) {
                    $payableItem = array_shift($products);
                    foreach ($products as $key => $price) {
                        if ($price < $payableItem) {
                            $discountedItems[] = $price;
                            unset($products[$key]);
                            $products = array_values($products);
                            break;
                        }
                    }
                    $payableItems[] = $payableItem;
                }
                break;
        }

        return json_encode([
            'Discounted Items' => $discountedItems,
            'Payable Items' => $payableItems
        ]);
    }
    
}
