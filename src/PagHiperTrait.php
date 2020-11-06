<?php
namespace Blx32\LaravelPagHiper;

/**
 * Class Billable
 * @package Blx32\LaravelPagHiper
 */
trait PagHiperTrait
{

    public function billetCreate(Item $item, string $payer_name, string $payer_email, int $payer_doc, $order_id = 'AAA-123')
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
    public function billetStatus($transaction_id){
        return (new PagHiper())->billet()->cancel($transaction_id);
    }
    public function billetCancel($transaction_id){
        return (new PagHiper())->billet()->status($transaction_id);
    }
}