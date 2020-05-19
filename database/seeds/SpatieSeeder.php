<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

use App\User;

class SpatieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ---------------------------------------------------------------------------------

        $datosPago = array(
            array('tipo' => 'tarjeta de credito o debito', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('tipo' => 'paypal', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('tipo' => 'efecty', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('tipo' => 'pago contra-entrega', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
        );

        DB::table('metodos_de_pago')->insert($datosPago);

    	// ---------------------------------------------------------------------------------

    	// ---------------------------------------------------------------------------------

        $datosEstadoPedido = array(
            array('estado' => 'Pendiente', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('estado' => 'Aceptado', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('estado' => 'Proceso de preparacion', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('estado' => 'Enviado', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('estado' => 'Entregado', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('estado' => 'Cancelado', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('estado' => 'Reembolsado', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('estado' => 'Pago mediante transferencia bancaria pendiente', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('estado' => 'Pago mediante paypal pendiente', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),

        );

        DB::table('estado_pedido')->insert($datosEstadoPedido);

    	// ---------------------------------------------------------------------------------

      // ---------------------------------------------------------------------------------

        $datosDetalle = array(
            array('tipo' => 'peso', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('tipo' => 'color', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('tipo' => 'dimension', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('tipo' => 'genero', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('tipo' => 'modelo', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('tipo' => 'material', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('tipo' => 'dimension', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('tipo' => 'garantia', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('tipo' => 'numero de referencia', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('tipo' => 'condicion', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
            array('tipo' => 'pais de produccion', 
                  'created_at'=> Carbon::now(), 
                  'updated_at'=> Carbon::now()),
        );

        DB::table('caracteristicas')->insert($datosDetalle);

      // ---------------------------------------------------------------------------------

      // ---------------------------------------------------------------------------------

        Role::create(['name' => 'usuario']);
        Role::create(['name' => 'cliente']);
        Role::create(['name' => 'administrador']);

      // ---------------------------------------------------------------------------------


      // ---------------------------------------------------------------------------------

        User::create([
          'nombre' => 'admin',
          'apellidos' => 'administrador',
          'email' => 'administrador@sistema.com',
          'password' => bcrypt('1234+Qwer'),
        ]);

        $usuario = User::find(1); // ADSI - Desarrollo
        $usuario->assignRole('administrador');

      // ---------------------------------------------------------------------------------


    }
}
