<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageLinkRequest;
use App\Services\PageLinkService;
use App\Traits\ResponseTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageLinkController extends Controller
{
    use ResponseTrait;

    protected array $status = [400, 500];

    public function __construct(
        protected PageLinkService $service
    )
    {
    }

    public function index(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $response= $this->service->getDataApi($request->contract);

        if(in_array($response->status(), $this->status)) {
            return view('pages.not-found');
        }

        $data = $response->json();
        $data['hash'] = $request->contract;

        return view('pages.page-link', compact('data'));
    }

    public function store(PageLinkRequest $request): JsonResponse
    {
        $response = $this->service->saveCard($request->all());

        return $this->responseJson($response->status(), $response->json());
    }
}
