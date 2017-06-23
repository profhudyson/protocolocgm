<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTramitacaoAPIRequest;
use App\Http\Requests\API\UpdateTramitacaoAPIRequest;
use App\Models\Tramitacao;
use App\Repositories\TramitacaoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TramitacaoController
 * @package App\Http\Controllers\API
 */

class TramitacaoAPIController extends AppBaseController
{
    /** @var  TramitacaoRepository */
    private $tramitacaoRepository;

    public function __construct(TramitacaoRepository $tramitacaoRepo)
    {
        $this->tramitacaoRepository = $tramitacaoRepo;
    }

    /**
     * Display a listing of the Tramitacao.
     * GET|HEAD /tramitacaos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tramitacaoRepository->pushCriteria(new RequestCriteria($request));
        $this->tramitacaoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tramitacaos = $this->tramitacaoRepository->all();

        return $this->sendResponse($tramitacaos->toArray(), 'Tramitacaos retrieved successfully');
    }

    /**
     * Store a newly created Tramitacao in storage.
     * POST /tramitacaos
     *
     * @param CreateTramitacaoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTramitacaoAPIRequest $request)
    {
        $input = $request->all();

        $tramitacaos = $this->tramitacaoRepository->create($input);

        return $this->sendResponse($tramitacaos->toArray(), 'Tramitacao saved successfully');
    }

    /**
     * Display the specified Tramitacao.
     * GET|HEAD /tramitacaos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tramitacao $tramitacao */
        $tramitacao = $this->tramitacaoRepository->findWithoutFail($id);

        if (empty($tramitacao)) {
            return $this->sendError('Tramitacao not found');
        }

        return $this->sendResponse($tramitacao->toArray(), 'Tramitacao retrieved successfully');
    }

    /**
     * Update the specified Tramitacao in storage.
     * PUT/PATCH /tramitacaos/{id}
     *
     * @param  int $id
     * @param UpdateTramitacaoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTramitacaoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tramitacao $tramitacao */
        $tramitacao = $this->tramitacaoRepository->findWithoutFail($id);

        if (empty($tramitacao)) {
            return $this->sendError('Tramitacao not found');
        }

        $tramitacao = $this->tramitacaoRepository->update($input, $id);

        return $this->sendResponse($tramitacao->toArray(), 'Tramitacao updated successfully');
    }

    /**
     * Remove the specified Tramitacao from storage.
     * DELETE /tramitacaos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tramitacao $tramitacao */
        $tramitacao = $this->tramitacaoRepository->findWithoutFail($id);

        if (empty($tramitacao)) {
            return $this->sendError('Tramitacao not found');
        }

        $tramitacao->delete();

        return $this->sendResponse($id, 'Tramitacao deleted successfully');
    }
}
