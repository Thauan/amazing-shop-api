<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CommodityRepository;

class CommodityController extends Controller
{

    public function __construct(CommodityRepository $commodity)
    {
        $this->commodity = $commodity;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commoditys = $this->commodity->list();

        if($commoditys->count() == 0) return response()->json(['message' => 'nenhuma mercadoria encontrada', 'error' => true], 200);

        return $commoditys;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commodity = $this->commodity->makeCommodity($request);

        if($request->brand_ids) $this->commodity->attachBrand($request, $commodity->id);

        if (!$commodity) return response()->json(['message' => 'Houve problema no registro da mercadoria', 'error' => true], 200);

        return response()->json(['message' => 'Mercadoria registrada'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function show(Commodity $commodity)
    {

        $commodity = $this->commodity->findById($commodity);

        if ($commodity->count() == 0) return response()->json(['message' => 'Esta mercadoria não foi encontrada', 'error' => true], 200);

        return $commodity;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function edit(Commodity $commodity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commodity $commodity)
    {
        //
    }


    public function associateBrands(Request $request, $ids)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commodity $commodity)
    {
        //
    }
}
