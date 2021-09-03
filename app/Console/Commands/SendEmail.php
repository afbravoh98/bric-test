<?php

namespace App\Console\Commands;

use App\Bric\Repositories\ProductRepository;
use App\Mail\ProductCount;
use App\Mail\ProductUpdated;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    private $products;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send and email hourly of count products';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $products)
    {
        parent::__construct();
        $this->products = $products;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = $this->products->all()->count();
        Mail::to('product@manager.com')->send(new ProductCount($count));
    }
}
