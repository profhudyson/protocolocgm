<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrgExternoAPIRequest;
use App\Http\Requests\API\UpdateOrgExternoAPIRequest;
use App\Models\OrgExterno;
use App\Repositories\OrgExternoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OrgExternoController
 * @package App\Http\Controllers\API
 */

class OrgExternoAPIController extends AppBaseController
{
    /** @var  OrgExternoRepository */
    private $orgExternoRepository;

    public function __construct(OrgExternoRepository $orgExternoRepo)
    {
        $this->orgExternoRepository = $orgExternoRepo;
    }

    /**
     * Display a listing of the OrgExterno.
     * GET|HEAD /orgExternos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orgExternoRepository->pushCriteria(new RequestCriteria($request));
        $this->orgExternoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $orgExternos = $this->orgExternoRepository->all();

        return $this->sendResponse($orgExternos->toArray(), 'Org Externos retrieved successfully');
    }

    /**
     * Store a newly created OrgExterno in storage.
     * POST /orgExternos
     *
     * @param CreateOrgExternoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrgExternoAPIRequest $request)
    {
        $input = $request->all();

        $orgExternos = $this->orgExternoRepository->create($input);

        return $this->sendResponse($orgExternos->toArray(), 'Org Externo saved successfully');
    }

    /**
     * Display the specified OrgExterno.
     * GET|HEAD /orgExternos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OrgExterno $orgExterno */
        $orgExterno = $this->orgExternoRepository->findWithoutFail($id);

        if (empty($orgExterno)) {
            return $this->sendError('Org Externo not found');
        }

        return $this->sendResponse($orgExterno->toArray(), 'Org Externo retrieved successfully');
    }

    /**
     * Update the specified OrgExterno in storage.
     * PUT/PATCH /orgExternos/{id}
     *
     * @param  int $id
     * @param UpdateOrgExternoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrgExternoAPIRequest $request)
    {
        $input = $request->all();

        /** @var OrgExterno $orgExterno */
        $orgExterno = $this->orgExternoRepository->findWithoutFail($id);

        if (empty($orgExterno)) {
            return $this->sendError('Org Externo not found');
        }

        $orgExterno = $this->orgExternoRepository->update($input, $id);

        return $this->sendResponse($orgExterno->toArray(), 'OrgExterno updated successfully');
    }

    /**
     * Remove the specified OrgExterno from storage.
     * DELETE /orgExternos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OrgExterno $orgExterno */
        $orgExterno = $this->orgExternoRepository->findWithoutFail($id);

        if (empty($orgExterno)) {
            return $this->sendError('Org Externo not found');
        }

        $orgExterno->delete();

        return $this->sendResponse($id, 'Org Externo deleted successfully');
    }
}
