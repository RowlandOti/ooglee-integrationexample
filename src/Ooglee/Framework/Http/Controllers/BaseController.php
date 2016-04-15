<?php namespace Ooglee\Framework\Http\Controllers;

use Ooglee\Framework\Http\Controllers\Controller;
use Ooglee\Domain\Contracts\IBaseService;

class BaseController extends Controller {

	protected $modelService;

    public function __construct(IBaseService $modelService)
    {
        $this->modelService = $modelService;
    }

	/**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {   
        $response = $this->modelService->getAll();

    	return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $response = $this->modelService->getBy($id);

        return  $response;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}