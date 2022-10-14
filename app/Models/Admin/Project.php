<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

   public function ProjectOwner()
    {
        return $this->belongsTo(ProjectOwner::class,'project_owner');
    }

       public function ProjectStatus()
    {
        return $this->belongsTo(ProjectStatus::class,'project_status');
    }

       public function ProjectType()
    {
        return $this->belongsTo(ProjectType::class,'project_type');
    }



}
