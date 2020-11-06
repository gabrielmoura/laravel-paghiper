<?php

namespace Blx32\Http\Controllers;

use Blx32\LaravelPagHiper\PagHiper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WebhookController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Handle a Paddle webhook call.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function __invoke(Request $request)
    {
        $payload = $request->all();
        return (new PagHiper())->notification()->response($request->notification_id,$request->idTransacao);
    }
}