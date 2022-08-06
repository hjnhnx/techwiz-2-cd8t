<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLicenseRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminUserController extends Controller
{
    public function list(Request $request)
    {
        $search = $request->query('search');

        if ($search != "") {
            $listUser = User::where(function ($query) use ($search) {
                $query->where('username', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })->get();
            $listUser->appends([
                'search' => $search,
            ]);
        } else {
            $listUser = User::all();
        }

        return view('admin/user/list', ['list_user' => $listUser,
        ]);
    }

    public function create()
    {
        return view('admin/user/form', ['data_user' => null]);
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->fill($request->validated());
        $hashed_password = Hash::make($request['password']);
        $user->password = $hashed_password;
        $user->save();
        $this->seed($user->email, $user,$user->username);

        return redirect()->route('listUser')->with(['status' => 'create admin success']);
    }

    public function update($id)
    {
        $user = User::find($id);
        return view('admin/user/form', ['data_user' => $user]);

    }

    public function save(UserRequest $request, $id)
    {
        $user = User::find($id);
        $data = $request->validated();
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        $user->save();
        return redirect()->route('listUser')->with(['status' => 'Update admin success', 'user' => $user->username]);;
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('listUser')->with(['status' => 'Delete admin success', 'user' => $user->username]);
    }
    public function show()
    {
        $dtuser = User::whereNotNull('is_driving_license_certified')->where('is_driving_license_certified', 0)->get();
        return view('admin/user/drive', [
            'dtuser' => $dtuser
        ]);
    }
    public function set($id)
    {
        $user = User::find($id);
        $user->is_driving_license_certified = 1;
        $user->update();
        $user->save();
        return redirect()->route('show_approve_drivers')->with(['status' => 'Update success']);
    }

    public function seed($user_email, $data, $to_name)
    {
        Mail::send('email.welcome', [$data], function ($message) use ($to_name, $user_email) {
            $message->to($user_email, $to_name)
                ->subject('Artisans Web Testing Mail');
            $message->from(env('MAIL_FROM_ADDRESS'), 'Artisans Web');
        });

    }
}
