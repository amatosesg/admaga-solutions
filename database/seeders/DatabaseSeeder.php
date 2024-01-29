<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Image;
use App\Models\Cart;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(20)
            ->create()
            ->each(function($user){
                $image = Image::factory()
                            ->user()
                            ->make();
                $user->image()->save($image);
            });

        $orders = Order::factory(10)
            ->make()
            ->each(function($order) use ($users){
                $order->customer_id = $users->random()->id;
                $order->save();

                $payment = Payment::factory()->make();
                $payment->order_id = $order->id;
                $payment->save();
            });

        $carts = Cart::factory(20)->create();

        $services = Service::factory(50)
            ->create()
            ->each(function($service) use ($orders, $carts){
                $order = $orders->random();
                $order->services()->attach([
                    $service->id => ['quantity' => mt_rand(1,3)]
                ]);

                $cart = $carts->random();
                $cart->services()->attach([
                    $service->id => ['quantity' => mt_rand(1,3)]
                ]);
            });
    }
}
