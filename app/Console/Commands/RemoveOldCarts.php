<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cart;

class RemoveOldCarts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'carts:remove-old {--days=14 : The days after which the carts will be removed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove old carts from a given set of days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deadline = now()->subDays($this->option('days'));

        $counter = Cart::whereDate('updated_at', '<=', $deadline)->delete();

        $this->info("{$counter} carts were removed");
    }
}
