<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pedido;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.users.index')->with(['users' => $user]);
    }

    public function destroy($id)
    {
        $user = User::find($id); // buscar el usuario dada su id
        $user->delete(); // méto para eliminar usuario
        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente');
    }

    public function show($id)
    {
        $user = User::find($id);
        // Dame el numero de pedidos dado un el id del usuario
        $pedidosCount = Pedido::where('user_id', $user->id)->count();
        return view('admin.users.show')->with(['user' => $user, 'pedidosCount' => $pedidosCount]);
    }

    public function crear(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'Usuario creado correctamente');
    }

    public function editar($id)
    {
        $user = User::find($id); // buscar el usuario dado su id
        return view('admin.users.edit')->with(['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id); // buscar el usuario dado su id
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente');
    }

}
