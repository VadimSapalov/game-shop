<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoftwareController extends Controller
{
    //Метод для виведення списку всіх елементів таблиці software
    public function index()
    {
        $softwares = Software::all();
        
        return view('admin.software.index', ['softwares' => $softwares]);
    }

    //Метод для видалення елементу з бази даних
    public function destroy(Software $software)
    {
        $software->delete();

        return redirect()->route('admin.software.index')
                         ->with('success', 'Item is deleted');
    }

    //Метод викликання сторінки створення
    public function create()
    {
        return view('admin.software.create');
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
        ]);

        Software::create($validated);

        return redirect()->route('admin.software.index')
                        ->with('success', 'Item has been added to list');
    }
    public function edit(Software $software)
    {
        return view('admin.software.edit', compact('software'));
    }

    public function update(Request $request, Software $software)
    {
        $validated = $request->validate([
            'Title' => 'required|string|max:255',
            'Description' => 'required|string',
            'Price' => 'required|numeric|min:0',
        ]);

        $software->update($validated);

        return redirect()->route('admin.software.index')->with('success', 'Item updated');
    }
    public function home()
    {
        $softwares = Software::all();
        
        return view('home', compact('softwares'));
    }

    public function purchase(Software $software)
    {
        $userId = auth()->id();

        try {
            DB::statement('CALL Purchase(?, ?)', [$userId, $software->id]);
            
            return redirect()->back()->with('success', 'Success!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'You already have item or an error occured.');
        }
    }
}
