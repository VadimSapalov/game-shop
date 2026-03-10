<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    //Метод для виведення списку всіх елементів таблиці software
    public function index()
    {
        $softwares = Software::all();
        
        return view('admin.software.index', ['softwares' => $softwares]);
    }

    //Метод для відкриття сторінки окремого елемента
    public function show(Software $software)
    {
        return view('admin.software.show', compact('software'));
    }

    //Метод для видалення елементу з бази даних
    public function destroy(Software $software)
    {
        $software->delete();

        return redirect()->route('admin.software.index')
                         ->with('success', 'Програму видалено');
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
                        ->with('success', 'Програму успішно додано до каталогу');
    }
}
