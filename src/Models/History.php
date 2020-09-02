<?php

namespace Chelsymooy\Deposit\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class History
 * @package Chelsymooy\Deposit\Models
 * @version May 2, 2020, 1:26 pm UTC
 *
 */
class History extends Model
{
    use SoftDeletes;

    public $fillable = [
        'account_id',
        'date',
        'description',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'account_id'        => 'integer',
        'date'              => 'date',
        'description'       => 'string',
        'amount'            => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'account_id'        => 'required|exists:cld_accounts,id',
        'date'              => 'required|date',
        'description'       => 'required|string',
        'amount'            => 'nullable|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function account() {
        return $this->belongsTo(Account::class);
    }
}
