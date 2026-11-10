<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Type;
use Illuminate\Http\Request;
use Storage;
use Str;

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
        $newCar->description = $data['description'];
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
    public function show(Car $car)
    {
        // Carica le relazioni (brand, type, customer) per averle pronte nella vista
        $customers = Customer::all();
        $brands = Brand::all();
        $types = Type::all();

        return view('cars.show', compact('car', 'customers', 'brands', 'types'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $customers = Customer::all();
        $brands = Brand::all();
        $types = Type::all();

        return view('cars.edit', compact('car', 'customers', 'brands', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    // 2. Salva le modifiche apportate
    public function update(Request $request, Car $car)
    {
        $data = $request->all();

        // Assegnazione manuale delle proprietà dell'auto
        $car->customer_id = $data['customer_id'];
        $car->name = $data['name'];
        $car->brand_id = $data['brand_id'];
        $car->type_id = $data['type_id'];
        $car->price = $data['price'];
        $car->km = $data['km'];
        $car->registration_date = $data['registration_date'];


        // Gestione aggiornamento dell'immagine se presente
        if ($request->hasFile('image')) {

            // Se c'era già un'immagine salvata in storage, la eliminiamo
            if ($car->img && Storage::disk('public')->exists($car->img)) {
                Storage::disk('public')->delete($car->img);
            }

            // Salviamo la nuova immagine e aggiorniamo la proprietà
            $img_path = Storage::disk('public')->putFile('cars', $request->file('image'));
            $car->img = $img_path;
        }

        // Salva le modifiche sul database
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Auto aggiornata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        // Se l'immagine è salvata nello storage (e non è un'immagine di base in public/images/), la eliminiamo fisicamente
        if ($car->img && !Str::startsWith($car->img, ['http://', 'https://', 'images/'])) {
            if (Storage::disk('public')->exists($car->img)) {
                Storage::disk('public')->delete($car->img);
            }
        }

        // Elimina il record dal database
        $car->delete();

        // Reindirizza alla lista con un messaggio di successo
        return redirect()->route('cars.index')->with('success', 'Auto eliminata con successo!');
    }
}
