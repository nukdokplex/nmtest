<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    protected $table = "group";

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'user_has_groups',
            'group',
            'user');

    }

    public function setUsers($users){
        $this->users()->detach();
        $this->users()->saveMany($users);
    }

    public function creator(){
        return $this->belongsTo(
            User::class,
            'created_by'
        );
    }
}
