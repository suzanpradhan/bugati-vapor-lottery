<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "applicants";
    protected $guarded = [];

    public function lottery()
    {
        return $this->belongsTo(Lottery::class);
    }
}
