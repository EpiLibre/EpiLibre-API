<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('RolesTableSeeder');
        $this->call('UsersTableSeeder');
        //$this->call('UnitsTableSeeder');
        //$this->call('CategoriesTableSeeder');
        //$this->call('ProductsTableSeeder');
        //$this->call('OrdersTableSeeder');
        //$this->call('OrdersProductsTableSeeder');
    }
}
