<?php


namespace Blx32\LaravelPagHiper;

use GuzzleHttp\Client;
use WebMaster\PagHiper\Core\Bank\Banking;
use WebMaster\PagHiper\Core\Payment\Billet;
use WebMaster\PagHiper\Core\Payment\Notification;
use WebMaster\PagHiper\PagHiper as PagHiperService;

class PagHiper extends PagHiperService
{
    /**
     * @var  WebMaster\PagHiper\Core\Payment\Billet;
     */
    private $billet;

    /**
     * @var WebMaster\PagHiper\Core\Payment\Notification;
     */
    private $notification;

    /**
     * @var WebMaster\PagHiper\Core\Bank\Banking;
     */
    private $banking;

    /**
     * @var array PagHiper credentials
     */
    private $credentials;

    /**
     * @var GuzzleHttp\Client;
     */
    private $client;

    protected $model;

    public function __construct(Model $model = null)
    {
        $this->model = $model;
        $this->credentials = [
            'apiKey' => config('pagihiper.apikey'),
            'token' => config('pagihiper.token')
        ];

        $this->client = new Client([
            'base_uri' => 'https://api.paghiper.com',
            'defaults' => [
                'headers' => [
                    'Accept' => 'application/json',
                    'Accept-Charset' => 'UTF-8',
                    'Accept-Encoding' => 'application/json',
                    'Content-Type' => 'application/json'
                ],
            ],
        ]);


        $this->billet = new Billet($this);
        $this->banking = new Banking($this);
        $this->notification = new Notification($this);
    }
}