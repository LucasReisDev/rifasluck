<?php

namespace App\Http\Controllers;
use App\Models\Rifa;
use Illuminate\Support\Facades\Auth;
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
        // Verificar se o usuário está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Exibir a view de criação de rifa
        return view('rifas.create');
    }

    public function store(Request $request)
{
    // Validar e armazenar os dados da rifa
    $request->validate([
        'titulo' => 'required',
        'descricao' => 'required',
        'cotas_disponiveis' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Obter o usuário autenticado
    $user = Auth::user();

    // Criar a rifa associada ao usuário
    $rifa = new Rifa([
        'titulo' => $request->input('titulo'),
        'descricao' => $request->input('descricao'),
        'cotas_disponiveis' => $request->input('cotas_disponiveis'),

    ]);
    if($request->hasFile('image') && $request->file('image')->isvalid()) {
        $requestImage = $request->image;
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path("img"), $imageName);
        $rifa->image = $imageName;  
    }

    // Associar a rifa ao usuário
    $user->rifas()->save($rifa);

    // Redirecionar ou realizar outras ações necessárias
    return redirect()->route('dashboard')->with('success', 'Rifa criada com sucesso!');
}
}
