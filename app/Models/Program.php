<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $hidden = ['updated_at', 'created_at'];

    public function edulevel(){
        return $this->belongsTo(Edulevel::class);
    }
}
