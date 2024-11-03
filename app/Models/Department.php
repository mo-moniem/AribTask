<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\UserTypeEnum;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

    protected $fillable = [
        'title','manager_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class,'department_id');
    }

    public function manager()
    {
        return $this->belongsTo(User::class,'manager_id');
    }

    public function scopeOfTitle($query, $title)
    {
        if(empty($title))
            return $query;
        return $query->where('title', 'like', '%'.$title.'%');
    }

    public function scopeOfManager($query, $user)
    {
        if($user->role->value == UserTypeEnum::MANAGER->value){
            $query->where('manager_id', $user->id);
        }
        elseif ($user->role->value == UserTypeEnum::EMPLOYEE->value){
            $query->whereHas('users',fn($q)=>$q->where('id',$user->id));
        }
        else{
            return $query;
        }
    }
}
