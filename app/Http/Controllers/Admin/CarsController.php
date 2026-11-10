<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Type;
use Illuminate\Http\Request;
use Storage;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        $brands = Brand::all();
        $cars = Car::all();
    
        return view('cars.index', compact('cars', 'brands', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $types = Type::all();
        $customers = Customer::all();

        return view('cars.create', compact('brands', 'types', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $data = $request->all();

        $newCar = new Car();
        $newCar->name = $data['name'];
        $newCar->brand_id = $data['brand_id'];
        $newCar->type_id = $data['type_id'];
        $newCar->price = $data['price'];
        $newCar->km = $data['km'];
        $newCar->registration_date = $data['registration_date'];
        $newCar->customer_id = $data['customer_id'];

        // Gestione dell'immagine con Storage::putFile
        if ($request->hasFile('image')) {
            // Specifica il disco 'public' e la cartella 'images/cars'
           $img_path = Storage::disk('public')->putFile('cars', $request->file('image'));
           
            $newCar->img = $img_path; // Salverà es. "images/cars/nomefilehashato.jpg"
        }
 
        $newCar->save();

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
