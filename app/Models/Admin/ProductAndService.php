<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAndService extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class,'id','added_by');
    }
}
