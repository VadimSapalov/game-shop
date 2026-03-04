<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    public function index()
    {
        $softwares = Software::all();
        
        return view('admin.software.index', ['softwares' => $softwares]);
    }

    public function show(Software $software)
    {
        return view('admin.software.show', compact('software'));
    }

    public function destroy(Software $software)
    {
        $software->delete();

        return redirect()->route('admin.software.index')
                         ->with('success', 'Програму видалено');
    }
}