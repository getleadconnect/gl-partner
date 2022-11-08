<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\ProductAndService;

class PlansAndServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan_arr = ['Gl-Scratch','Gl-Verify','SMS','IVR','GL Promo	','Campaigns','Missed Call'];

        foreach($plan_arr as $value)
        {
            $service = new ProductAndService;
            $service->plan_name = $value;
            $service->type = 2;
            $service->users = 5 ;
            $service->month = 1;
            $service->pricing = 250;
            $service->added_by = 1;
            $service->save();
        }
    }
}
