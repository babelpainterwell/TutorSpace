<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Hash;
use Auth;
use App\User;
use App\School_year;
use App\Major;


class signupController extends Controller
{
    public function show() {
        return view('authenticate.show_signup');
    }

    public function showStudent() {
        return view('authenticate.show_signup_student');
    }

    public function showStudent_2 () {

        return view('authenticate.show_signup_student_2');
    }

    public function showTutor() {
        return view('authenticate.show_signup_tutor');
    }



    public function signupStudent(Request $request) {
        // checking for empty inputs, different passwords, wrong email formats, and existed email
        $request->validate([
            'fullName' => ['
                required'
            ],
            'email' => [
                'required',
                'email:rfc',
                !Rule::exists('users,email')
            ],
            'password-check' => [
                'required',
                'same:password'
            ]
        ]);

        // $request->session()->put('email', $input['email']);
        // $request->session()->put('password', $input['password']);
        // $request->session()->put('fullName', $input['fullName']);

        return redirect()
                ->route('signup_2');



    }

    public function signupStudent_2(Request $request) {
        // TODO: check for profile image
        $request->validate([
            'schoolYear' => [
                'required', 
                'exists:school_years,school_year'
            ],
            'major' => [
                'required', 
                'exists:majors,major'
            ], 
            'minor' => [
                'nullable'
            ]
        ]);

        $email = $request->session()->get('email');
        $password = $request->session()->get('password');
        $fullName = $request->session()->get('fullName');
                
        if(!isset($email) || empty($email) || !isset($password) || empty($password) || !isset($fullName) || empty($fullName)) {
            return redirect()->route('signup');
        }

        $user = new User();        
        $user->minor = $request->input('minor');
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->full_name = $fullName;
        $user->is_tutor = false;

        $user->major_id = Major::where('major', '=', $request->input('major'))->first()->id;

        $user->school_year_id = School_year::where('school_year', '=', $request->input('schoolYear'))->first()->id;
        

        $user->save();

        
        

        Auth::login($user);
        $request->session()->flush();

        return redirect()->route('profile_student');
    }

}
