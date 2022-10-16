<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequests\StoreFoodRequest;
use App\Http\Requests\FoodRequests\UpdateFoodRequest;
use App\Models\Food;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food = Food::paginate(10);

        return view('food.index', [
            'food' => $food
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodRequest $request)
    {
        $data = $request->all();
        $request->validated();
        $data['picturePath'] = $request->file('picturePath')->store('assets/food', 'public');
        Food::create($data);
        return redirect()->route('food.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('food.edit', [
            'item' => $food
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {

        $data = $request->all();
        $request->validated();

        if ($request->file('picturePath')) {
            $this->_deleteOldPicturePath($food->picturePath);
            $data['picturePath'] = $request->file('picturePath')->store('assets/food', 'public');
        }

        $food->update($data);
        return redirect()->route('food.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        if ($food->picturePath) {
            $this->_deleteOldPicturePath($food->picturePath);
        }
        $food->delete();

        return redirect()->route('food.index');
    }

    private function _deleteOldPicturePath($oldPicturePath)
    {
        $fullPicturePath = explode('/', $oldPicturePath);
        $key = array_search('assets', $fullPicturePath);
        $picturePath = explode('/', $oldPicturePath, $key + 1);
        $picturePath = $picturePath[count($picturePath) - 1];
        Storage::disk('public')->delete($picturePath);
    }
}
