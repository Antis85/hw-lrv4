<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Http\Requests\CarsRequest;
use Illuminate\Http\Response;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Cars::paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CarsRequest $request
     * @return Response
     */
    public function store(CarsRequest $request)
    {
        return Cars::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        return Cars::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CarsRequest $request
     * @param Cars $cars
     * @return bool
     */
    public function update(CarsRequest $request, Cars $cars)
    {
        $cars->fill($request->validated());
        return $cars->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cars $cars
     * @return Response|null
     */
    public function destroy(Cars $cars)
    {
        if ($cars->delete()) {
            return response(null, Response::HTTP_NO_CONTENT);
        }
        return null;
    }
}
