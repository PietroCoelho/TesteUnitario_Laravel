<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Parametros passado para o serviço
     */
    protected array $param = [];

    public function __construct()
    {
        $this->params = request()->all();
    }

    protected function index($document = []): array
    {
        $product = new Mod;
        $r = $this->product->getList($this->param);

        return $product;
    }
}
