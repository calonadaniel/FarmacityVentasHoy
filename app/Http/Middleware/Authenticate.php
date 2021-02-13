<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {   

        //Aplicar hash a nuevas contraseñas ya que la tabla HQuser del RMS no encripta contraseñas y este es un requerimiento de Laravel. 
        $users = User::chunk(50, function ($users) {
            foreach ($users as $user) {
                if(Hash::needsRehash($user->password) ){  //Verificar si contraseña ocupa oseasi es un nuevo usuario 
                    $user->password = Hash::make($user->password);//Aplicar hash a la contraseña 
                    $user->save(); 
                  
                }else{
                    $alreadyhashed; //No necesita
                }
            }
        });

        if (! $request->expectsJson()) {
            return route('login');

        }
    }
}
