<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.usuarios.index');
    }

    public function curriculum()
    {
        $user = auth()->user();

        dd($user->profile_applicant());
        return view('profiles.curriculum', compact('user'));
    }

    public function savecurriculum(Request $request, User $user){

        $request->validate([
            'address' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'name_contact' => 'required|min:15',
            'phone_contact' => 'required',
            'file' => 'required|mimes:pdf|max:10000'
        ]);

        $url = Storage::put('public/resources', $request->file('file'));

        Profile::create([
            'address' => $request->address,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'name_contact' => $request->name_contact,
            'phone_contact' => $request->phone_contact,
            'user_id' => auth()->user()->id,
            'cv' => $url
        ]);

        return redirect()->route('profiles.curriculum');
    }

    public function editcv(Profile $profile){
        return view('profiles.editcv', compact('profile'));
    }

    public function updatecv(Profile $profile, Request $request){
        $request->validate([
            'address' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'name_contact' => 'required',
            'phone_contact' => 'required'
        ]);

        $profile->update([
            'address' => $request->address,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'name_contact' => $request->name_contact,
            'phone_contact' => $request->phone_contact,
        ]);

        return redirect()->route('profiles.curriculum', $profile);
    }
}
