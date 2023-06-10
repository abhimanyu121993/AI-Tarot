<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission;

class PermissionName extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'perm_id');
    }
}
