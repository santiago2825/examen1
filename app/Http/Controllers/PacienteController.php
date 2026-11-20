<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PacienteController extends Controller
{
    private function fecthDataFromApi($url){
        $response = Http::get($url);
        $data = $response->json();
        return is_array($data) ? $data : [];
    }
    public function index(){
        $url = env('URL_SERVE_API');
        $pacientes = $this->fecthDataFromApi($url.'/paciente');
        return view('pacientes.index',compact('pacientes'));
    }
    public function create()
    {
        return view('pacientes.create');
    }
    public function store(Request $request)
    {
        $url = env('URL_SERVE_API');
        $file = $request->file('imagen');

        $request->validate([
            'codigo_paciente' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $response = Http::attach(
            'imagen',
            file_get_contents($file->getRealPath()),
            $file->getClientOriginalName()
        )->post($url . '/paciente', [
            'codigo_paciente' => $request->codigo_paciente,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
        ]);


        return redirect()->route('pacientes.index');
    }
    public function show($id)
    {
        $url = env('URL_SERVE_API');
        $paciente = $this->fecthDataFromApi($url . '/paciente/' . $id);
        return view('pacientes.show', compact('paciente'));
    }
    public function edit($id)
    {
        $url = env('URL_SERVE_API');
        $paciente = $this->fecthDataFromApi($url . '/paciente/' . $id);
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVE_API');

        $data = [
            'codigo_paciente' => $request->codigo_paciente,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
        ];

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');

            $response = Http::attach(
                'imagen',
                file_get_contents($file->getRealPath()),
                $file->getClientOriginalName()
            )->post($url . '/paciente/' . $id, $data + ['_method' => 'PUT']);
            $response->throw();
        } else {
            $response = Http::put($url . '/paciente/' . $id, $data);
            $response->throw();
        }

        return redirect()->route('pacientes.index');
    }
}
