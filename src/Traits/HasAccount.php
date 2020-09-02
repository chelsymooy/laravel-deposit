<?php

namespace Chelsymooy\Deposit\Traits;

use Chelsymooy\Deposit\Models\Account;
use Illuminate\Validation\ValidationException;

trait HasAccount
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function account() {
        return $this->hasOne(Account::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function accounts() {
        return $this->hasMany(Account::class)->withTrashed();
    }

    public function open_account(){
        return Account::create(['user_id' => $this->user, 'name' => config()->get('deposit.default_account')])
    }

    public function close_account(){
        if($this->account->balance <> 0){
            throw ValidationException::withMessages(['account' => 'notempty']);
        }
        return $this->account->delete();
    }
}
