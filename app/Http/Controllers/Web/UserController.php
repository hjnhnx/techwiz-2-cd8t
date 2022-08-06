<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Http\Requests\UpdateLicenseRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UserRequest;
use App\Models\Ride;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function updateLicense()
    {
        $data_user = User::find(Auth::id());
        return view('web/update_license', ['data_user' => $data_user]);
    }

    public function profile()
    {
        $user = User::find(Auth::id());
        $request = \App\Models\Request::query()->where('user_id', Auth::id())->get();

        $cars = Car::query()->where('user_id', Auth::id())->with('model')->get();

        $rides = Ride::query()->whereHas('car', function (Builder $query) {
                $query->where('user_id',Auth::id());})->get();
        return view('web/user_profile', [
            'data_user' => $user,
            'requests' => $request,
            'cars' => $cars,
            'rides'=>$rides
        ]);
    }

    public function update_profile()
    {
        $user = User::find(Auth::id());
        return view('web/update_profile', [
            'data_user' => $user
        ]);
    }

    public function form_comfim_password()
    {
        return view('web/comfrim_delete_user');
    }
    public function delete_user(Request $request)
    {
        $user = User::find(Auth::id());
        $password = $user->password;
        if (Hash::check($request['password'], $password)) {
            $user->delete();
            return redirect()->intended('/');
        } else {
            return back()->with( 'error-password','Password. Please check and try again.');
        }

    }

    public function saveuser(UpdateProfileRequest $request)
    {
        $user = User::find(Auth::id());
        $data = $request->validated();
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        $user->save();
        return redirect()->route('profile_user')->with(['status' => 'Update profile success']);


    }

    public function saveLicense(UpdateLicenseRequest $request)
    {
        $user = User::find(Auth::id());
        $data = $request->validated();
        $data['is_driving_license_certified'] = 0;
        $user->update($data);
        $user->save();
        return redirect()->route('createRide');
    }

    public function createCar()
    {
        $model = Model::all();
        return view('web/create_car', ['listModel' => $model]);
    }

    public function storeCar(CarRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $car = new Car();
        $car->fill($data);
        $car->save();
        return redirect()->route('createRide');
    }
}
