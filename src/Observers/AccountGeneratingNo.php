<?php

namespace Chelsymooy\Deposit\Observers;

use Chelsymooy\Deposit\Models\Account;

class AccountGeneratingNo
{
    /**
     * Handle the Account "saving" event.
     *
     * @param  \Chelsymooy\Deposit\Models\Account  $account
     * @return void
     */
    public function creating(Account $account)
    {
        //
        if(is_null($account->no)){
            $counter_char_length = 5;

            /////////////////
            // Generate No //
            /////////////////
            $no = $account->issued_at->format('ym.');

            ///////////////////
            // Get latest no //
            ///////////////////
            $latest_no = Account::where('no', 'like', $no . '%')->orderBy('no', 'desc')->first();
            if (!$latest_no)
            {
                $latest_no = 0;
            }
            else
            {
                $latest_no = intval(substr($latest_no->no,-1 * $counter_char_length,$counter_char_length));
            }
            $no = $no . str_pad($latest_no + 1, $counter_char_length, "0", STR_PAD_LEFT);

            ///////////////
            // Assign NO //
            ///////////////
            $account->no       = $no;
        }
    }
}
