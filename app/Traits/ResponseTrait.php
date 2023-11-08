<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    public function responseJson(int $status, array|null $message = []): JsonResponse
    {
        $title = data_get($message, 'resposta');

        if($status === 400) {
            return response()->json([
               'type' => 'warning',
               'message' => '',
               'title' => $title ?? 'Cartão Não Validado'
            ], $status);
        }

        if($status == 500) {
            return response()->json([
                'type' => 'error',
                'message' => 'Ocorreu um erro ao salvar os dados',
                'title' => 'Entre em contato com o suporte'
            ], $status);
        }

        return response()->json([
            'type' => 'success',
            'message' => 'Dados do Cartão Confirmados com Sucesso!',
            'title' => ''
        ]);
    }
}
