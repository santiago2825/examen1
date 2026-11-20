<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MedicoController extends Controller
{
    private function fecthDataFromApi($url){
        $response = Http::get($url);
        $data = $response->json();
        return is_array($data) ? $data : [];
    }

    public function index(){
        $url = env('URL_SERVE_API');
        $medicos = $this->fecthDataFromApi($url.'/medico');
        return view('medicos.index',compact('medicos'));
    }
    public function create(){
        return view("medicos.create");
    }
    public function store(Request $request)
    {
        $url = env('URL_SERVE_API');
        $response = Http::post($url . '/medico', $request->validate([
            'codigo_medico' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]));

        if ($response->failed()) {
            return back()->withInput()->withErrors(
                $response->json('errors') ?? ['api' => $response->json('message') ?? 'No se pudo registrar el medico.']
            );
        }

        return redirect()->route('medicos.index');
    }
    public function show($id)
    {
        $url = env('URL_SERVE_API');
        $medico = $this->fecthDataFromApi($url.'/medico/'. $id);
        return view('medicos.show', compact('medico'));
    }
    public function edit($id)
    {
        $url = env('URL_SERVE_API');
        $medico = $this->fecthDataFromApi($url . '/medico/' . $id);
        return view('medicos.edit', compact('medico'));
    }
    public function update(Request $request, $id)
    {
        $url = env('URL_SERVE_API');
        Http::put($url . '/medico/' . $id, $request->all());
        return redirect()->route('medicos.index');
    }
    public function destroy($id)
    {
        $url = env('URL_SERVE_API');
        Http::delete($url . '/medico/' . $id);
        return redirect()->route('medicos.index');
    }
}
