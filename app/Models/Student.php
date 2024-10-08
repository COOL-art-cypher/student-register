<?php

namespace App\Models;

use App\Models\Grading;
use App\Models\PITMark;
use App\Models\EnglishMark;
use App\Models\MyanmarMark;
use App\Models\PhysicsMark;
use App\Models\MathematicMark;
use App\Models\MicrosoftOfficeMark;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function EnglishMark()
    {
        return $this->hasMany(EnglishMark::class);
    }

    public function MathematicMark()
    {
        return $this->hasMany(MathematicMark::class);
    }

    public function MyanmarMark()
    {
        return $this->hasMany(MyanmarMark::class);
    }

    public function PITMark()
    {
        return $this->hasMany(PITMark::class);
    }

    public function PhysicsMark()
    {
        return $this->hasMany(PhysicsMark::class);
    }

    public function MicrosoftOfficeMark()
    {
        return $this->hasMany(MicrosoftOfficeMark::class);
    }

    public function Grading()
    {
        return $this->hasMany(Grading::class);
    }
}
