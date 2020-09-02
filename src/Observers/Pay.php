<?php

namespace Chelsymooy\Deposit\Observers;

use Eloquent as Model;
use Chelsymooy\Deposit\Models\History;

class Pay
{
    /**
     * Handle the Account "saved" event.
     *
     * @param  \Chelsymooy\Deposit\Models\Account  $account
     * @return void
     */
    public function saved(Model $trs)
    {
        if(in_array($trs->method, config()->get('deposit.pay_method')) && $trs->user && $trs->user->account && !$trs->cancelled_at){
            $account    = $trs->user->account;
            
            /*CATAT HISTORY*/
            History::create(['account_id' => $account->id, 'date' => $trs->date, 'description' => 'Balance reduced from transaction #'.$trs->no, 'amount' => 0 - $trs->total]); 
            /*WHEN PAYMENT HAPPEND, REDUCE BALANCE*/

            $account->balance = $account->balance - $trs->total;
            $account->save();
        }
    }

    /**
     * Handle the Account "updating" event.
     *
     * @param  \Chelsymooy\Deposit\Models\Account  $account
     * @return void
     */
    public function updating(Model $trs)
    {
        if(in_array($trs->method, config()->get('deposit.pay_method')) && $trs->user && $trs->user->account && $trs->getDirty('total')){
            $account    = $trs->user->account;
            
            /*CATAT HISTORY*/
            History::create(['account_id' => $account->id, 'date' => $trs->date, 'description' => 'Correction balance from transaction #'.$trs->no, 'amount' => $trs->getOriginal('total')]); 
            /*WHEN PAYMENT HAPPEND, REDUCE BALANCE*/

            $account->balance = $account->balance + $trs->getOriginal('total');
            $account->save();
        }
    }

    /**
     * Handle the Account "updated" event.
     *
     * @param  \Chelsymooy\Deposit\Models\Account  $account
     * @return void
     */
    public function updated(Model $trs)
    {
        if(in_array($trs->method, config()->get('deposit.pay_method')) && $trs->user && $trs->user->account && $trs->cancelled_at){
            $account    = $trs->user->account;
            
            /*CATAT HISTORY*/
            History::create(['account_id' => $account->id, 'date' => $trs->date, 'description' => 'Balance added from transaction void #'.$trs->no, 'amount' => $trs->total]); 
            /*WHEN PAYMENT HAPPEND, REDUCE BALANCE*/

            $account->balance = $account->balance + $trs->total;
            $account->save();
        }
    }
}
