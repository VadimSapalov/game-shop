<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SoftwareController extends Controller
{
    //Метод для виведення списку всіх елементів таблиці software
    public function index()
    {
        return Inertia::render('Admin/Index', [
            'softwares' => Software::all(),
        ]);
    }

    //Метод для видалення елементу з бази даних
    public function destroy(Software $software)
    {
        $software->delete();

        return redirect()->route('index')
                         ->with('success', 'Item is deleted');
    }

    //Метод викликання сторінки створення
    public function create()
    {
        return Inertia::render('Admin/Create', [
            'genres' => Genre::all()
        ]);
    }

    //Метод збереження створеного елементу в БД
    public function store(Request $request)
    {
        //Валідація даних
        $validated = $request->validate([
            'Title' => 'required|string|max:255',
            'Description' => 'required|min:10',
            'Price' => 'required|numeric|min:0.01',
            'ReleaseDate' => 'required|date',
            'genre_id'    => 'required|exists:genres,id',
        ]);

        Software::create($validated);

        return redirect()->route('index')
                        ->with('success', 'Item has been added to list');
    }
    public function edit($id) 
    {
        $software = Software::findOrFail($id);

        return Inertia::render('Admin/Edit', [
            'software' => [
                'id' => $software->id,
                'Title' => $software->Title,
                'Description' => $software->Description,
                'Price' => $software->Price,
            ]
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = Software::findOrFail($id);
        $item->update($request->validate([
            'Title' => 'required|string|max:255',
            'Description' => 'required|string',
            'Price' => 'required|numeric|min:0',
        ]));
        
        return redirect()->route('index')->with('success', 'Item updated!');
    }

    public function purchase($id)
    {
        $userId = auth()->id();

        try {
            // Виклик процедури використовуючи $id
            DB::statement('CALL Purchase(?, ?)', [$userId, $id]);
            
            return redirect()->back()->with('success', 'Purchase successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'You already have this item or an error occurred.');
        }
    }
}