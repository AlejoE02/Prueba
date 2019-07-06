<?php



namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\RolUsuario;
use App\User;
use App\Inventario;
use App\Carro_de_Compras;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function Inventario()
	{

		$inventario = Inventario::all();
		return view('Inventario',[
			'inventario'=>$inventario,
		]);
	}

	public function InventarioStore(Request $request)
	{
		$inventario = Inventario::where('nombre_producto',$request['Nombre'])->first();
		if($inventario == null){
			Inventario::insert([
				'nombre_producto' => $request['Nombre'],
			]);

			return back()->with('msjcreado','eliminado');

		}else{
			return back()->with('msjerror','eliminado');
		}
	}

	public function AgregarProducto(Request $request, $id){

		$inventario = Inventario::where('id',$id)->first();
		return view('AgregarInventario',[
			'inventario'=>$inventario,
		]);
	}

	public function AgregarProductos(Request $request)
	{
        
        $inventario=Inventario::where('id',$request['Id'])->first();
        $inventario -> nombre_producto = $request->get('Nombre');
        $inventario -> cantidad = $request->get('Cantidad');
        $inventario -> codigo_lote = $request->get('Codigo');
        $inventario -> fecha_de_vencimiento = $request->get('Fecha');
        $inventario->save();

		return back()->with('msjeditado','eliminado');
        
    }

    //Controladores para el cliente

    public function VistaCliente()
	{
		return view('VistaCliente');
	}

	public function Productos()
	{
		$inventario = Inventario::all();
		return view('InventarioCliente',[
			'inventario'=>$inventario,
		]);
	}

	public function VerProductos()
	{
		$inventario = Inventario::all();
		return view('VerProductos',[
			'inventario'=>$inventario,
		]);
	}

	public function Carrito(Request $request, $id){

		$inventario = Inventario::where('id',$id)->first();
		return view('AñadirACarro',[
			'inventario'=>$inventario,
		]);
	}

	public function AnadirProducto(Request $request){
		
		$user = Auth::user();
		$userid = $user->id;
		$inventario = Inventario::where('id',$request['Id'])->first();
		if($inventario->cantidad >= $request['Cantidad']){
			Carro_de_Compras::insert([
				'id_producto' => $request['Id'],
				'id_usuario' => $userid,
				'cantidad' => $request['Cantidad'],
				'estado' => 1,
			]);
			$inventario->cantidad = $inventario->cantidad - $request['Cantidad'];
			$inventario->save();
			return back()->with('msjeditado', 'eliminado');
		}else{
			return back()->with('msjerror','eliminado');
		}
	}

	public function GestionarFactura(Request $request){

		$user = Auth::user();
		$userid = $user->id;
		$total = 0;
		$carro = Carro_de_Compras::where('id_usuario', $userid)->get();
		foreach($carro as $car){
			if($car->estado == 1){
				$total += ($car->relacionCarroInventario->precio*$car->cantidad);
			}	
		}
		return view('GestionarFactura',[
			'lista'=>$carro,
			'total'=>$total,
		]);
	}

	public function FinalizarCompra(){

		$user = Auth::user();
		$userid = $user->id;
		$carro = Carro_de_Compras::where('id_usuario', $userid)->get();
		foreach($carro as $car){
			if($car->estado == 1){
				$car->estado = 2;
				$car->save();
			}
		}
		return back()->with('msjeditado', 'eliminado');
	}

	public function CancelarCompra(){
		$user = Auth::user();
		$userid = $user->id;
		$carro = Carro_de_Compras::where('id_usuario', $userid)->get();
		foreach($carro as $car){
			if($car->estado == 1){
				$car->estado = 3;
				$car->save();
				$inventario = Inventario::where('id',$car->id_producto)->first();
				$inventario->cantidad = $inventario->cantidad + $car->cantidad;
				$inventario->save();
			}
		}
		return back()->with('msjeditado2', 'eliminado');
	}
}
