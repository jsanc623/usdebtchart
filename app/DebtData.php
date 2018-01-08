<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DebtData extends Model
{
    use SoftDeletes;

    protected $table = "debt_data";

    public $timestamps = true;

    public $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public $maps = ['amount' => 'total_public_debt_outstanding'];

    public $fillable = [
        'date', 'total_public_debt_outstanding'
    ];
}
