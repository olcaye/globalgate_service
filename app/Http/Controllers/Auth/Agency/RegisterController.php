<?php

namespace App\Http\Controllers\Auth\Agency;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Country;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/unverified';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[a-zA-Z0-9 ]+$/', 'unique:agencies'],
            'phone' => ['required', 'unique:agencies'],
            'address' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:agencies'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['required'],
            'state' => ['required'],
            'city' => ['required']
        ],[
            'name.unique' => 'This agent name is in use. Try different name.',
            'country.required'=> 'Country is required',
            'state.required'=> 'State is required',
            'city.required'=> 'City/District is required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Agency
     */
    protected function create(array $data)
    {
        $agencyName = $data['name'];
        $firstLetter =  substr($agencyName,0,1);
        $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
        $agencyName = str_replace($vowels, "", $agencyName);

        if(strlen($agencyName) >= 10) {
            $agencyName = substr($agencyName, 0, 8) . rand(100,999);
        }
        if (in_array($firstLetter, $vowels)) {
            $agencyName = $firstLetter . $agencyName;
        }

        return Agency::create([
            'name' => $data['name'],
            'name_abbrev' => strtoupper($agencyName),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country_id' => $data['country'],
            'state_id' => $data['state'],
            'city_id' => $data['city']
        ]);
    }

    public function showAgencyRegistrationForm()
    {
        $data['countries'] = Country::get(["name", "id"]);
        return view('auth.agency.register', $data);
    }
}
