<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTramitacaoRequest;
use App\Http\Requests\UpdateTramitacaoRequest;
use App\Repositories\TramitacaoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TramitacaoController extends AppBaseController
{
    /** @var  TramitacaoRepository */
    private $tramitacaoRepository;

    public function __construct(TramitacaoRepository $tramitacaoRepo)
    {
        $this->tramitacaoRepository = $tramitacaoRepo;
    }

    /**
     * Display a listing of the Tramitacao.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tramitacaoRepository->pushCriteria(new RequestCriteria($request));
        $tramitacaos = $this->tramitacaoRepository->all();

        return view('tramitacaos.index')
            ->with('tramitacaos', $tramitacaos);
    }

    /**
     * Show the form for creating a new Tramitacao.
     *
     * @return Response
     */
    public function create()
    {
        return view('tramitacaos.create');
    }

    /**
     * Store a newly created Tramitacao in storage.
     *
     * @param CreateTramitacaoRequest $request
     *
     * @return Response
     */
    public function store(CreateTramitacaoRequest $request)
    {
        $input = $request->all();

        $tramitacao = $this->tramitacaoRepository->create($input);

        Flash::success('Tramitacao saved successfully.');

        return redirect(route('tramitacaos.index'));
    }

    /**
     * Display the specified Tramitacao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tramitacao = $this->tramitacaoRepository->findWithoutFail($id);

        if (empty($tramitacao)) {
            Flash::error('Tramitacao not found');

            return redirect(route('tramitacaos.index'));
        }

        return view('tramitacaos.show')->with('tramitacao', $tramitacao);
    }

    /**
     * Show the form for editing the specified Tramitacao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tramitacao = $this->tramitacaoRepository->findWithoutFail($id);

        if (empty($tramitacao)) {
            Flash::error('Tramitacao not found');

            return redirect(route('tramitacaos.index'));
        }

        return view('tramitacaos.edit')->with('tramitacao', $tramitacao);
    }

    /**
     * Update the specified Tramitacao in storage.
     *
     * @param  int              $id
     * @param UpdateTramitacaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTramitacaoRequest $request)
    {
        $tramitacao = $this->tramitacaoRepository->findWithoutFail($id);

        if (empty($tramitacao)) {
            Flash::error('Tramitacao not found');

            return redirect(route('tramitacaos.index'));
        }

        $tramitacao = $this->tramitacaoRepository->update($request->all(), $id);

        Flash::success('Tramitacao updated successfully.');

        return redirect(route('tramitacaos.index'));
    }

    /**
     * Remove the specified Tramitacao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tramitacao = $this->tramitacaoRepository->findWithoutFail($id);

        if (empty($tramitacao)) {
            Flash::error('Tramitacao not found');

            return redirect(route('tramitacaos.index'));
        }

        $this->tramitacaoRepository->delete($id);

        Flash::success('Tramitacao deleted successfully.');

        return redirect(route('tramitacaos.index'));
    }
}
