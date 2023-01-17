<?php
  
namespace App\Http\Controllers\Auth;
  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle($provider)
    {
        return Socialite::driver($provider)
        ->redirect();
    }
          
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback($provider)
    {

        try {
        
            $user = Socialite::driver('google')->user();

            $finduser = User::where('provider_id', $user->id)->first();

         
            if($finduser){
                Auth::login($finduser);
                if ($finduser->role == 'admin') {
                    return redirect()->route('admin.dashboard');
                }
                return redirect('/');

         
            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'role' => 'user',
                        'email_verified_at' => now(),
                        'provider_id'=> $user->id,
                        'provider'=> $provider,

                    ]);

         
                Auth::login($newUser);
                return redirect('/dashboard');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    
}