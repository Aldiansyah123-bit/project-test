<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city'];

    public function member()
    {
        return $this->hasMany(Member::class);
    }
}
