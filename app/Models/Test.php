<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = "test";

    public function questions(){
        return $this->belongsToMany(
            Question::class,
            'test_has_questions',
            'test',
            'question'
        );
    }

    public function setQuestions($questions){
        $this->questions()->detach();
        $this->questions()->saveMany($questions);
    }

    public function creator(){
        return $this->belongsTo(
            User::class,
            'created_by'
        );
    }
}
