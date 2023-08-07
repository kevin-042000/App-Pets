<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
   
    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->password_confirmation = Hash::make($request->password_confirmation);
        $user->save();
    
        // Crear un perfil de usuario vacío
        $userProfile = new UserProfile();
        $userProfile->user_id = $user->id;
        $userProfile->save();
    
        Log::debug('Perfil de usuario creado: ', ['userProfile' => $userProfile]);
    
        Auth::login($user);
    
        return redirect()->route('home.index');
    }
    public function login(Request $request){

        $credentials =[
            'email' => $request->email,
            'password' => $request->password,

            // $remember = ($request->has('remember') ? true : false);
        ]; 

            if(Auth::attempt($credentials)){

                $request->session()->regenerate();

                return redirect()->intended();

            }else{
                return redirect()->route('login');
            }
    }    
    
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
