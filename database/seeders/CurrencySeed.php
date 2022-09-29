<?php


namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurrencySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'INR', 'symbol' => '₹', 'money_format_thousands' => ',', 'money_format_decimal' => '.'], 
            ['id' => 2, 'title' => 'USD', 'symbol' => '$', 'money_format_thousands' => '.', 'money_format_decimal' => ','],
            ['id' => 3, 'title' => 'EUR', 'symbol' => '€', 'money_format_thousands' => '.', 'money_format_decimal' => ','],

        ];

        

        foreach ($items as $item) {
            \App\Currency::create($item);
        }
    }
}