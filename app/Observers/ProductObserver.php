<?php

namespace App\Observers;

use App\Mail\ProductCreated;
use App\Mail\ProductUpdated;
use App\product;
use Illuminate\Support\Facades\Mail;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param product $product
     * @return void
     */
    public function created(product $product)
    {
        Mail::to('product@manager.com')->send(new ProductCreated($product));
    }

    /**
     * Handle the product "updated" event.
     *
     * @param product $product
     * @return void
     */
    public function updated(product $product)
    {
        Mail::to('product@manager.com')->send(new ProductUpdated($product));

    }

    /**
     * Handle the product "deleted" event.
     *
     * @param product $product
     * @return void
     */
    public function deleted(product $product)
    {
        //
    }

    /**
     * Handle the product "restored" event.
     *
     * @param product $product
     * @return void
     */
    public function restored(product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param product $product
     * @return void
     */
    public function forceDeleted(product $product)
    {
        //
    }
}
