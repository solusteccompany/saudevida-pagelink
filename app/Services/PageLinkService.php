<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PageLinkService
{
    protected mixed $apiUrl;

    protected array $status = [400, 500];

    public function __construct()
    {
        $this->apiUrl = config('app.url_api');
    }

    public function getDataApi(string $contract): Response
    {
        return Http::get($this->apiUrl. $contract);
    }

    public function saveCard(array $data): Response
    {
        $data['cartao'] = $this->removeChars($data['cartao']);
        $data['validade'] = $this->valid($data['validade']);
        $data['cpf'] = str_replace(['.', '-'], '', $data['cpf']);

        return Http::post($this->apiUrl,$data);
    }

    public function valid(string $valid): string
    {
       return str_replace('/', '', $valid);
    }

    public function removeChars(string $card): string
    {
        return preg_replace('/\s+/', '', $card);
    }
}