<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'empresa' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'telefono' => 'required|string|max:255',
                'tamaño_flota' => 'nullable|string|max:255',
            ]);

            $lead = Lead::create($validated);

            return response()->json([
                'success' => true,
                'message' => '¡Gracias! Hemos recibido tu solicitud. Un especialista te contactará pronto.',
                'lead' => $lead,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Por favor, completa todos los campos requeridos.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error al crear lead: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al procesar tu solicitud. Por favor, intenta nuevamente.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
