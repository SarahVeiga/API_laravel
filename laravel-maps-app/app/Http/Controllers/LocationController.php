<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Exibir uma lista dos recursos.
     */
    public function index()
    {
        $locations = Location::all();
        return view('location.index', compact('locations'));
    }

    /**
     * Mostrar o formulário para criar um novo recurso.
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Armazene um recurso recém-criado no armazenamento.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'address' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100'
        ]);

        Location::create($request->all());

        return redirect()->route('locations.index')
            ->with('success', 'Local criado com sucesso!');
    }

    /**
     * Exibir o recurso especificado.
     */
    public function show(string $id)
    {
        $location = Location::findOrFail($id);
        return view('locations.show', compact('location'));
    }

    /**
     * Mostrar o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        $location = Location::findOFail($id);
        return view('locations.edit', compact('location'));
    }

    /**
     * Atualize o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'address' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100'
        ]);

        $location = Location::findOrFail($id);
        $location->update($request->all());

        return redirect()->route('locations.index')
            ->with('success', 'Local atualizado com sucesso!');
    }

    /**
     * Remova o recurso especificado do armazenamento.
     */
    public function destroy(string $id)
    {
        $location = Location::findOFail($id);
        $location->delete();

        return redirect()->route('locations.index')
            ->with('success', 'Local excluído com sucesso!');
    }
}
