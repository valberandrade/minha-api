<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    /**
     * @var Store
     */
    private Store $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = $this->store->paginate(10);
        return response()->json($stores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->store->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return $store;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        $data = $request->all();
        $store->update($data);
        return $store;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return $store;
    }
}
