<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{   
    public function get(Request $request) 
    {
        $name = $request->session()->get('name');
        $hobbies = $request->session()->get('hobbies');
        $gender = $request->session()->get('gender');
        $favourite = $request->session()->get('favourite');
        $maritalStatus = $request->session()->get('maritalStatus');

        return view('student-session', compact('name','hobbies', 'gender', 'favourite', 'maritalStatus'));
    }
    public function store(Request $request)
    {
        $request->session()->put('name', $request->name);
        $request->session()->put('hobbies', $request->hobbies);
        $request->session()->put('gender', $request->gender);
        $request->session()->put('favourite', $request->favourite);
        $request->session()->put('maritalStatus', $request->maritalStatus);
        
        return redirect()->route('student-session.show');
    }
    public function show(Request $request) 
    {
        $name = $request->session()->get('name');
        $hobbies = $request->session()->get('hobbies');
        $gender = $request->session()->get('gender');
        $favourite = $request->session()->get('favourite');
        $maritalStatus = $request->session()->get('maritalStatus');

        return view('student-session-show', compact('name','hobbies', 'gender', 'favourite', 'maritalStatus'));
    }
}
