<?php

namespace Chelsymooy\Deposit\Models;

use DB, Carbon\Carbon;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Account
 * @package Chelsymooy\Deposit\Models
 * @version May 2, 2020, 1:26 pm UTC
 *
 */
class Account extends Model
{
    use SoftDeletes;

    protected $table = 'cld_accounts';

    public $fillable = [
        'user_id',
        'no',
        'name',
        'balance'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id'           => 'integer',
        'no'                => 'string',
        'name'              => 'string',
        'balance'            => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id'           => 'required|exists:users,id',
        'no'                => 'nullable|unique:cld_accounts,no',
        'name'              => 'required|string',
        'balance'           => 'nullable|min:0|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        $user  = config()->get('auth.providers.users.model');
        return $this->belongsTo(new $user());
    }
}
