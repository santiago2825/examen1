<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IngresoController extends Controller
{
    private function fecthDataFromApi($url){
        $response = Http::get($url);
        $data = $response->json();
        return is_array($data) ? $data : [];
    }
    public function index(){
        $url = env('URL_SERVE_API');
        $ingresos = $this->fecthDataFromApi($url.'/ingreso');
        return view('ingresos.index',compact('ingresos'));
    }
    public function create()
    {
        $url = env('URL_SERVE_API');
        $pacientes = Http::get($url .'/paciente')->json() ?: [];
        $medicos = Http::get($url .'/medico')->json() ?: [];
        return view('ingresos.create',compact('pacientes','medicos'));
    }
    public function store(Request $request)
    {
        $url = env('URL_SERVE_API');
        $data = $request->validate([
            'codigo_ingreso' => 'required|string|max:255',
            'habitacion' => 'required|string|max:255',
            'fecha' => 'required|date',
            'paciente_id' => 'required|integer',
            'medico_id' => 'required|integer',
        ]);

        $response = Http::post($url . '/ingreso', $data);
        if ($response->failed()) {
            return back()->withInput()->withErrors(
                $response->json('errors') ?? ['api' => $response->json('message') ?? 'No se pudo registrar el ingreso.']
            );
        }

        return redirect()->route('ingresos.index');
    }
    public function show($id)
    {
        $url = env('URL_SERVE_API');
        $ingreso = $this->fecthDataFromApi($url . '/ingreso/' . $id);
        return view('ingresos.show', compact('ingreso'));
    }
    public function edit($id)
    {
        $url = env('URL_SERVE_API');
        $ingresos = $this->fecthDataFromApi($url . '/ingreso/' . $id);
        $pacientes = Http::get($url . '/paciente')->json() ?: [];
        $medicos = Http::get($url . '/medico')->json() ?: [];
        return view('ingresos.edit', [
            'ingreso' => $ingresos,
            'pacientes' => $pacientes,
            'medicos' => $medicos,
        ]);
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVE_API');
        Http::put($url . '/ingreso/' . $id, $request->all());
        return redirect()->route('ingresos.index');
    }
    public function destroy($id)
    {
        $url = env('URL_SERVE_API');
        Http::delete($url . '/ingreso/' . $id);
        return redirect()->route('ingresos.index');
    }
}
