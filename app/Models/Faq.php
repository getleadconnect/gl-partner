<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    public function FaqCategory()
	{
		return $this->belongsTo(FaqCategory::class,'faq_category_id','id');
	}
}
