<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->user()->role === 0) {
            abort(403);
        }
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->user()->role === 0) {
            abort(403);
        }
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->role === 0) {
            abort(403);
        }
        $car = new Car();
        $car->name = $request->name;
        $car->save();
        return redirect()->route('cars.show', $car->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        if ($request->user()->role === 0) {
            abort(403);
        }

        $car = Car::find($id);
        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        if ($request->user()->role === 0) {
            abort(403);
        }
        $car = Car::find($id);
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->user()->role === 0) {
            abort(403);
        }

        $car = Car::find($id);
        $car->name = $request->name;
        $car->save();

        return redirect()->route('cars.show', $car->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        if ($request->user()->role === 0) {
            abort(403);
        }

        $car = Car::find($id);
        $car->delete();
        return redirect()->route('cars.index');
    }
}
