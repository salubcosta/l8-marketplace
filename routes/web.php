<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $helloWorld = 'Hello World.';
    return view('welcome', compact('helloWorld'));
});

Route::get('/model', function(){
    
    /*  
        Utilizando o recurso chamado Active Record
        $user = new \App\Models\User();
        $user->name = 'Salumao';
        $user->email= 'salubcosta@gmail.com';
        $user->password= bcrypt('123');
        return \App\Models\User::all();
    */

    /*
        $user = \App\Models\User::find(81);
        $user->name = 'Salumão Editado';
        $user->save();
        return \App\Models\User::all();
    */

    /**
     * Retorna todos os usuários
     * return \App\Models\User::All(); 
     * 
     * Retorna usuários específico
     * return \App\Models\User::find(81);
     * 
     * Retorno com where: 
     *             +get     - retorna array
     *             +first   - retorna um objeto
     * return \App\Models\User::where('name', 'Salumao Editado')->get();   # collation
     * return \App\Models\User::where('name', 'Salumao Editado')->first(); # object
     * 
     * Paginação
     * return \App\Models\User::paginate(10);
    */
    
    /*
        Mass assignment - Atribuição em massa
        $user = \App\Models\User::create([
            'name'  => 'Salumão Barbosa',
            'email' => 'salu.tj@hotmail.com',
            'password' => bcrypt('123')
        ]);

        Mass update - Atualização em massa
        $user = \App\Models\User::find(83);
        $returnAction  = $user->update([
            'name'  => 'Salumão BC',
            'email' => 'salubcosta@outlook.com',
            'password' => bcrypt('123')
        ]);
        dd($returnAction); # true or false
    */
    
    return \App\Models\User::paginate(10);
});