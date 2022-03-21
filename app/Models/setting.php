<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class setting extends Model
{
    use HasFactory;
    use SoftDeletes;

      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'key',
        'value',
        'expression',
    ];


    // connect without relation

    public function reference()
    {
        return $this->belongsTo(reference::class, 'value', 'id');;
    }
}
