<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Notifications\Messages\MailMessage;



class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    // // use ResetsPasswords;
    //     public static $createUrlCallback;

    // *
    //  * The callback that should be used to build the mail message.
    //  *
    //  * @var \Closure|null
     
    // public static $toMailCallback;
    //  public $token;

    //    public function __construct($token)
    // {
    //     $this->token = $token;
    // }


    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;


    // public function showResetForm(Request $request, $token = null)
    // {
    //     return view('auth.passwords.reset')->with(
    //         ['email' => $request->email]
    //     );
    // }

    //  public function toMail($notifiable)
    // {
      
    //         $url = url(route('reset_password', [
    //             // 'token' => $this->token,
    //             'email' => $notifiable->getEmailForPasswordReset(),
    //         ], false));


    //     return (new MailMessage)
    //         ->subject(Lang::get('Reset Password Notification'))
    //         ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
    //         ->action(Lang::get('Reset Password'), $url)
    //         ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
    //         ->line(Lang::get('If you did not request a password reset, no further action is required.'));
    // }




    public function reset(Request $request)
    {
        $user=User::where('email',$request->input('email'))->first();
        if ($user != null) {
           
            

            flashMessage('success','Send Email');
            return redirect()->back();
                    
        }else{
            $errors="";
        $msg ="Email Does Not Exist.";
        flashMessage('danger',$msg);
        return redirect()->route('home');
        }
    }


}
