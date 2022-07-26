<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Member extends Model
{
    use HasFactory;

    // protected $fillable = ['group_id','name','address','phone','email','profile'];
    protected $fillable = ['member_id','group','nama','alamat','hp','email','profile'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
