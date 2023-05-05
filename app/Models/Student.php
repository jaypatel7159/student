<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Staf;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ["name", "sub", "div", "tname", "img"];

    public function getTeacherName()
    {
        return $this->hasOne(Staf::class, 'id', 'tname');
    }
}
