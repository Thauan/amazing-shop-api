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

        // $commoditys = Commodity::with(['variants', 'brands'])->get();
        $commoditys = $this->commodity->list();
        return $commoditys;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fill = $request->all();

        Commodity::create([
            'name' => $fill->name,
            'price' => $fill->price,
            'description' => $fill->description,
            'resume' => $fill->resume,
            'brief' => $fill->brief,
            'created_at' => Carbon::now(),
        ]);

        return response()->json(['Usuario registrado com sucesso', 200]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function show(Commodity $commodity)
    {
        //
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
