<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = "question";

    public function creator(){
        return $this->belongsTo(
            User::class,
            'created_by'
        );
    }
}
