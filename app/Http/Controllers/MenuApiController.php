<?php

// app/Http/Controllers/MenuApiController.php
namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MenuApiController extends Controller
{
    public function index() {
        return response()->json(Menu::all());
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'image_url' => 'nullable|url',
        ]);

        $menu = Menu::create($data);
        return response()->json($menu, 201);
    }

    public function update(Request $request, Menu $menu) {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'image_url' => 'nullable|url',
        ]);

        $menu->update($data);
        return response()->json($menu);
    }

    public function destroy(Menu $menu) {
        $menu->delete();
        return response()->json(['message' => 'Menu deleted']);
    }
}

