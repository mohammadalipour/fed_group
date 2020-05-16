<?php

namespace App\Http\Controllers\Api\V1\Panel\Page;

use App\Contracts\Responses\Panel\PageListResponse;
use App\Contracts\Responses\Panel\UpdatePageResponse;
use App\Entities\PageEntity;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\PageRequest;
use App\Http\Requests\Panel\UpdatePageRequest;
use App\Repositories\PageRepository;
use Exception;

class PageController extends ApiController
{
    protected $page;

    /**
     * PageController constructor.
     * @param PageEntity $repository
     */
    public function __construct(PageRepository $repository)
    {
        $this->page = $repository;
    }

    public function list()
    {
        try {
            $ventures = $this->page->paginate();
            $response = new PageListResponse();
            $response->setItems($ventures);
            $response->setData();

            return $this->successResponse($response);
        } catch (Exception $exception) {
            return $this->FailResponse(trans('api.action_is_fail'), 400);
        }
    }

    public function index(PageRequest $request)
    {

    }

    public function update(UpdatePageRequest $request)
    {
        $request->validated();
        $pageId = $request->get('page_id');
        try {
            $page = $this->page->get($pageId);
            $content = $request->get('content') ?? $page->content;
            $this->page->update($page->id, ['content' => $content]);

            $response = new UpdatePageResponse();
            $response->setData();

            return $this->successResponse($response, trans('api.action_is_success'));
        } catch (Exception $exception) {
            return $this->FailResponse(trans('api.action_is_fail'), 400);
        }
    }
}
