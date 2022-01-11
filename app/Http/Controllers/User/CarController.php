<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\StoreCar;
use App\Models\Car;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $cars = Car::paginate();
        return view('car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $users = User::pluck('name', 'id')->all();
        return view('car.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCar $request)
    {
        $data = $request->all();
        if ($request->hasFile('thumbnail')) {
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("storage/{$folder}");
        }

        $car = Car::create($data);
        $car->users()->sync($request->user);
        return redirect()->route('cars.index')->with('success', 'Машина добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $users = User::pluck('name', 'id')->all();
        $car = Car::find($id);
        return view('car.edit', compact('car', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreCar $request, $id)
    {
        $car = Car::find($id);
        if ($request->hasFile('thumbnail')) {
            Storage::delete($car->thumbnail);
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("storage/{$folder}");
        }
        $car->update($request->all());
        return redirect()->route('cars.index')->with('success', 'Автомобиль изменён');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Car::destroy($id);
        return redirect()->route('cars.index')->with('success', 'Автомобиль удален');
    }
}
