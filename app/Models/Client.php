<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable=[ 'email ', 'user_id', 'designation', 'company_name', 'business_category_id', 'country', 'state',
                            'area', 'pincode', 'address', 'plan_type' , 'plan_id', 'remarks', 'amount_collected',
                            'payment_date', 'partner_id', 'commission_amount', 'total_amount', 'duration', 'payment_status'
];


    use HasFactory;

      public function BusinessCategory()
    {
        return $this->belongsTo(BusinessCategory::class,'business_category_id');
    }
        public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
