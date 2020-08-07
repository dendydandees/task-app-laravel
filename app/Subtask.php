<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    protected $fillable = [
      'title'
    ];

    public function task() {
      return $this->belongsTo(Task::class);
    }
}
