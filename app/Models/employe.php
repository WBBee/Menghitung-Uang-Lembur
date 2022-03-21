<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class employe extends Model
{
    use HasFactory;
    use SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    // relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function overtime()
    {
        return $this->hasOne(overtime::class)->latestOfMany();
    }

    public function overtimes()
    {
        return $this->hasMany(overtime::class)->latest();
    }

    public function reference()
    {
        return $this->belongsTo(reference::class, 'status_id', 'id');;
    }


}
