<?php

namespace App\Http\Controllers;
use App\Models\Rifa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RifasController extends Controller
{
    public function index()
    {
        $rifas = Rifa::all();
        return view('rifas', ['rifas' => $rifas]);
    }

    public function show($id)
    {
        $rifa = Rifa::findOrFail($id);
        return view('rifa', ['rifa' => $rifa]);
    }

    public function create()
    {
    return view('create');
    }

    public function store(Request $request)
    {
    // Validação dos dados do formulário aqui, se necessário

    // Criação da nova rifa no banco de dados

    $rifa = new Rifa([
        'titulo' => $request->input('titulo'),
        'descricao' => $request->input('descricao'),
        'cotas_disponiveis' => $request->input('cotas_disponiveis'),
        // Adicione outros campos conforme necessário
    ]);
    if($request->hasFile('image') && $request->file('public/img')->isValid()){

        $requestImage = $request->image;
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . ".". $extension;
        $requestImage->move(public_path("img"), $imageName);
        $rifa->image = $imageName;
    }
    $rifa->save();

    // Redireciona para a página da rifa recém-criada ou para onde desejar
    return redirect()->route('rifa', ['id' => $rifa->id]);
    }
}
