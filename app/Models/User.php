<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name', 'last_name', 'email','phone_code','phone','role','password',
        'image','manager_id','salary','department_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserTypeEnum::class,
        ];
    }

    public function fullName():Attribute{
        return Attribute::make(
            get: fn (mixed $value) => "$this?->first_name $this?->last_name",
        );
    }
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class,'user_id');
    }

    public function scopeOfRole($query,$role)
    {
        if(empty($role))
            return $query;

        return $query->where('role',$role);
    }

    public function scopeOfName($query,$value)
    {
        if(empty($value))
            return $query;

        return $query->whereRaw("CONCAT(first_name,' ',last_name) like '%{$value}%'");
    }

    public function scopeOfManager($query,$manager)
    {
        if(empty($manager))
            return $query;
        return $query->whereRelation('department','manager_id',$manager);
    }

    public function scopeOfDepartment($query,$department){
        if(empty($department))
            return $query;
        return $query->whereRelation('department','id',$department);
    }

    public function scopeOfUser($query,$user){
       if($user->role->value == UserTypeEnum::EMPLOYEE->value){
           $query->where('id',$user->id);
       }
       elseif ($user->role->value == UserTypeEnum::MANAGER->value){
           $query->whereHas('department',fn($q)=>$q->ofManager($user));
       }
       else{
           return $query;
       }
    }


}
