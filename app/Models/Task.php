<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\UserTypeEnum;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'title','description','status','user_id',
    ];

    protected function casts(): array
    {
        return [
            'status' => StatusEnum::class
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeOfUser($query,$user)
    {
        if($user->role->value == UserTypeEnum::EMPLOYEE->value){
            $query->where('user_id',$user->id);
        }
        elseif ($user->role->value == UserTypeEnum::MANAGER->value){
            $query->whereHas('user',fn($q)=>$q->ofUser($user));
        }
        else{
            return $query;
        }
    }


}
