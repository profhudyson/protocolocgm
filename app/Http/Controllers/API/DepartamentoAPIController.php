<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDepartamentoAPIRequest;
use App\Http\Requests\API\UpdateDepartamentoAPIRequest;
use App\Models\Departamento;
use App\Repositories\DepartamentoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DepartamentoController
 * @package App\Http\Controllers\API
 */

class DepartamentoAPIController extends AppBaseController
{
    /** @var  DepartamentoRepository */
    private $departamentoRepository;

    public function __construct(DepartamentoRepository $departamentoRepo)
    {
        $this->departamentoRepository = $departamentoRepo;
    }

    /**
     * Display a listing of the Departamento.
     * GET|HEAD /departamentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->departamentoRepository->pushCriteria(new RequestCriteria($request));
        $this->departamentoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $departamentos = $this->departamentoRepository->all();

        return $this->sendResponse($departamentos->toArray(), 'Departamentos retrieved successfully');
    }

    /**
     * Store a newly created Departamento in storage.
     * POST /departamentos
     *
     * @param CreateDepartamentoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartamentoAPIRequest $request)
    {
        $input = $request->all();

        $departamentos = $this->departamentoRepository->create($input);

        return $this->sendResponse($departamentos->toArray(), 'Departamento saved successfully');
    }

    /**
     * Display the specified Departamento.
     * GET|HEAD /departamentos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Departamento $departamento */
        $departamento = $this->departamentoRepository->findWithoutFail($id);

        if (empty($departamento)) {
            return $this->sendError('Departamento not found');
        }

        return $this->sendResponse($departamento->toArray(), 'Departamento retrieved successfully');
    }

    /**
     * Update the specified Departamento in storage.
     * PUT/PATCH /departamentos/{id}
     *
     * @param  int $id
     * @param UpdateDepartamentoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartamentoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Departamento $departamento */
        $departamento = $this->departamentoRepository->findWithoutFail($id);

        if (empty($departamento)) {
            return $this->sendError('Departamento not found');
        }

        $departamento = $this->departamentoRepository->update($input, $id);

        return $this->sendResponse($departamento->toArray(), 'Departamento updated successfully');
    }

    /**
     * Remove the specified Departamento from storage.
     * DELETE /departamentos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Departamento $departamento */
        $departamento = $this->departamentoRepository->findWithoutFail($id);

        if (empty($departamento)) {
            return $this->sendError('Departamento not found');
        }

        $departamento->delete();

        return $this->sendResponse($id, 'Departamento deleted successfully');
    }
}
