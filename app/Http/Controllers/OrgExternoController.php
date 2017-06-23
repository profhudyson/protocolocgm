<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrgExternoRequest;
use App\Http\Requests\UpdateOrgExternoRequest;
use App\Repositories\OrgExternoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrgExternoController extends AppBaseController
{
    /** @var  OrgExternoRepository */
    private $orgExternoRepository;

    public function __construct(OrgExternoRepository $orgExternoRepo)
    {
        $this->orgExternoRepository = $orgExternoRepo;
    }

    /**
     * Display a listing of the OrgExterno.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orgExternoRepository->pushCriteria(new RequestCriteria($request));
        $orgExternos = $this->orgExternoRepository->all();

        return view('org_externos.index')
            ->with('orgExternos', $orgExternos);
    }

    /**
     * Show the form for creating a new OrgExterno.
     *
     * @return Response
     */
    public function create()
    {
        return view('org_externos.create');
    }

    /**
     * Store a newly created OrgExterno in storage.
     *
     * @param CreateOrgExternoRequest $request
     *
     * @return Response
     */
    public function store(CreateOrgExternoRequest $request)
    {
        $input = $request->all();

        $orgExterno = $this->orgExternoRepository->create($input);

        Flash::success('Org Externo saved successfully.');

        return redirect(route('orgExternos.index'));
    }

    /**
     * Display the specified OrgExterno.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orgExterno = $this->orgExternoRepository->findWithoutFail($id);

        if (empty($orgExterno)) {
            Flash::error('Org Externo not found');

            return redirect(route('orgExternos.index'));
        }

        return view('org_externos.show')->with('orgExterno', $orgExterno);
    }

    /**
     * Show the form for editing the specified OrgExterno.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orgExterno = $this->orgExternoRepository->findWithoutFail($id);

        if (empty($orgExterno)) {
            Flash::error('Org Externo not found');

            return redirect(route('orgExternos.index'));
        }

        return view('org_externos.edit')->with('orgExterno', $orgExterno);
    }

    /**
     * Update the specified OrgExterno in storage.
     *
     * @param  int              $id
     * @param UpdateOrgExternoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrgExternoRequest $request)
    {
        $orgExterno = $this->orgExternoRepository->findWithoutFail($id);

        if (empty($orgExterno)) {
            Flash::error('Org Externo not found');

            return redirect(route('orgExternos.index'));
        }

        $orgExterno = $this->orgExternoRepository->update($request->all(), $id);

        Flash::success('Org Externo updated successfully.');

        return redirect(route('orgExternos.index'));
    }

    /**
     * Remove the specified OrgExterno from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orgExterno = $this->orgExternoRepository->findWithoutFail($id);

        if (empty($orgExterno)) {
            Flash::error('Org Externo not found');

            return redirect(route('orgExternos.index'));
        }

        $this->orgExternoRepository->delete($id);

        Flash::success('Org Externo deleted successfully.');

        return redirect(route('orgExternos.index'));
    }
}
