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
        $cars = Car::with(['brand', 'type'])->get();

        return response()->json([
            'success' => true,
            'data' => $cars
        ]);

        /*    $types = Type::all();
           $brands = Brand::all();
           $cars = Car::all();

           return view('cars.index', compact('cars', 'brands', 'types')); */
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
        // 1. Validiamo tutti i campi necessari, inclusi brand_id e type_id
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'type_id' => 'required|exists:types,id',
            'customer_id' => 'nullable|exists:customers,id',
            'km' => 'required|integer',
            'price' => 'required|numeric',
            'registration_date' => 'required|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Validazione file immagine
        ]);

        // 2. Creiamo l'istanza del modello
        $car = new Car();
        $car->name = $request->name;
        $car->brand_id = $request->brand_id;
        $car->type_id = $request->type_id;
        $car->customer_id = $request->customer_id;
        $car->price = $request->price;
        $car->km = $request->km;
        $car->registration_date = $request->registration_date;
        $car->description = $request->description;

        // 3. Gestione dell'immagine se viene inviata come file
        if ($request->hasFile('image')) {
            $img_path = Storage::disk('public')->putFile('cars', $request->file('image'));
            $car->img = $img_path;
        }

        $car->save();

        // 4. Ricarichiamo le relazioni prima di mandare la risposta JSON (così il frontend riceve subito il brand e il type completi)
        $car->load(['brand', 'type']);

        return response()->json([
            'message' => 'Auto creata con successo!',
            'car' => $car
        ], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        // Carica le relazioni (brand, type, customer) per averle pronte nella vista
        /*    $customers = Customer::all();
           $brands = Brand::all();
           $types = Type::all();

           return view('cars.show', compact('car', 'customers', 'brands', 'types')); */


        $car->load(['brand', 'type']);

        return response()->json([
            'data' => $car
        ], 200);
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'type_id' => 'required|exists:types,id',
            'price' => 'required|numeric',
            'km' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $car->name = $request->name;
        $car->brand_id = $request->brand_id;
        $car->type_id = $request->type_id;
        $car->price = $request->price;
        $car->km = $request->km;
        $car->description = $request->description;

        if ($request->hasFile('image')) {
            // Eliminiamo la vecchia foto da storage se presente
            if ($car->img && Storage::disk('public')->exists($car->img)) {
                Storage::disk('public')->delete($car->img);
            }
            $car->img = Storage::disk('public')->putFile('cars', $request->file('image'));
        }

        $car->save();

        return response()->json([
            'message' => 'Auto aggiornata con successo!',
            'car' => $car
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        // Se l'immagine è salvata nello storage (e non è un'immagine di base in public/images/), la eliminiamo fisicamente
        /*   if ($car->img && !Str::startsWith($car->img, ['http://', 'https://', 'images/'])) {
              if (Storage::disk('public')->exists($car->img)) {
                  Storage::disk('public')->delete($car->img);
              }
          }

          // Elimina il record dal database
          $car->delete();

          // Reindirizza alla lista con un messaggio di successo
          return redirect()->route('cars.index')->with('success', 'Auto eliminata con successo!'); */

        $car->delete();

        return response()->json([
            'message' => 'Auto eliminata con successo'
        ], 200);
    }
}
