<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee  extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'company',
    ];
    protected $hidden = [
        'password',
    ];
    public function company():HasOne
    {
        return $this->hasOne(Company::class,'id','company');        
    }
    public function scopeGetEmployeesByCompany($query, $id){
        return $query->where('company',$id);
    }
}
