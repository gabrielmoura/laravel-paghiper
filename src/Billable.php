<?php

namespace Blx32\LaravelPagHiper;

/**
 * Class Billable
 * @package Blx32\LaravelPagHiper
 */
trait Billable
{
    /**
     * @param null $plan
     * @return Subscriber
     */
    public function subscription($plan = null)
    {
        return new Subscriber($this, $plan);
    }

    /**
     * @return mixed
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function charge(Item $item, string $payer_name, string $payer_email, int $payer_doc, $order_id = 'AAA-123')
    {
        $dataBillet = [
            'order_id' => $order_id,
            'payer_name' => $payer_name,
            'payer_email' => $payer_email,
            'payer_cpf_cnpj' => $payer_doc,
            'type_bank_slip' => config('paghiper.type_bank_slip'),
            'days_due_date' => config('paghiper.days_due_date'),
            'items' => $item
        ];
        return (new PagHiper())->billet()->create($dataBillet);
    }
    public function refund($transaction_id){
        return (new PagHiper())->billet()->cancel($transaction_id);
    }
    public function chargeStatus($transaction_id){
        return (new PagHiper())->billet()->status($transaction_id);
    }
}