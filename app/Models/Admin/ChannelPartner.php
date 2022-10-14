<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelPartner extends Model
{
    use HasFactory;
       public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
