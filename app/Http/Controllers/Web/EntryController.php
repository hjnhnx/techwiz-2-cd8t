<?php

namespace App\Http\Controllers\Web;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function Symfony\Component\String\u;

class EntryController extends Controller
{
    public function register()
    {
        $user = User::all();
        return view('web/entry', ['dataUser' => $user]);
    }

    public function login()
    {
        $user = User::all();
        return view('web/entry', ['dataUser' => $user]);
    }

    public function processRegister(UserRequest $request)
    {
        $data = $request->validated();
        $data['role'] = Role::USER;
        $data['password'] = Hash::make($data['password']);
        $user = new User();
        $user->fill($data);
        $user->save();
        $this->seed($user);
        return redirect()->route('loginUser')->with(['status' => 'Account created successfully. Please login to continue.']);
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::find(Auth::id());
            $user->device_token = $request['device_token'];
            $user->save();
            return redirect()->intended('/');
        } else {
            return back()->with('error-login', 'Invalid account and/or password. Please check and try again.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
    public function seed($data)
    {
        Mail::send('email.welcome', ['user'=>$data,], function ($message) use ($data) {
            $message->to($data->email, $data->username)
                ->subject('Welcome to CarShare');
            $message->from(env('MAIL_FROM_ADDRESS'), 'CarShare');
        });

    }
}
