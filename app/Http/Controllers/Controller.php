<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use KeithBrink\AmazonMws\AmazonInventoryList;
use KeithBrink\AmazonMws\AmazonOrderList;
use KeithBrink\AmazonMws\AmazonProduct;
use KeithBrink\AmazonMws\AmazonProductList;
use KeithBrink\AmazonMws\AmazonProductSearch;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        return view('index');
    }
    public function test(){
        $amz = new AmazonOrderList("myStore"); //store name matches the array key in the config file
//        $amz->setLimits('Modified', "- 3600 days");
//        $amz->setFulfillmentChannelFilter("MFN"); //no Amazon-fulfilled orders
//        $amz->setOrderStatusFilter(
//            array("Unshipped", "PartiallyShipped", "Canceled", "Unfulfillable")
//        ); //no shipped or pending
        $amz->setUseToken(); //Amazon sends orders 100 at a time, but we want them all
        dd($amz->fetchOrders());
        dd($amz->getList());
        $orders = [];
        foreach($amz->getList() as $order) {
            $orders = $order->getData();
        }
        return $orders;

        $amz = new AmazonInventoryList("myStore"); //store name matches the array key in the config file
        $amz->setUseToken(); //tells the object to automatically use tokens right away
        $amz->setStartTime("- 3000 days");
        $amz->fetchInventoryList(); //this is what actually sends the request

        dd($amz->getSupply());


        $amz = new AmazonOrderList("myStore"); //store name matches the array key in the config file
        $amz = new AmazonInventoryList("myStore"); //store name matches the array key in the config file
        dd($amz->fetchInventoryList());
        $amz->fetchInventoryList('Modified', "- 24 hours");
        $amz->setFulfillmentChannelFilter("MFN"); //no Amazon-fulfilled orders
        $amz->setOrderStatusFilter(
            array("Unshipped", "PartiallyShipped", "Canceled", "Unfulfillable")
        ); //no shipped or pending
        $amz->setUseToken(); //Amazon sends orders 100 at a time, but we want them all
        $amz->fetchOrders();
        return $amz->getList();
    }
}
