<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;

class ProfileController extends Controller
{
    public function edit(User $user) {
      $user = Auth::user();
      return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
      $user = Auth::user();

      // validate the given request
      $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required',
          'avatar' => 'nullable|image|mimes:jpeg,jpg,png|max:2000|unique:users,avatar',
      ]);

      if ($validator->fails()) {
          return redirect('/tasks')->with('toast_error', $validator->messages()->all()[0])->withInput();
      }


      Auth::user()->update([
        'name' => $request->name,
        'email' => $request->email,
      ]);

      if ($request->hasFile('avatar')) {
        $exist = Storage::disk('avatar')->exists($user->avatar);
        if (isset($user->avatar) && $exist) {
          Storage::disk('avatar')->delete($user->avatar);
        }

        $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
        $user->avatar = $request->file('avatar')->getClientOriginalName();
        $user->save();
      }

      // redirect to tasks index
        return redirect('/tasks')->with('toast_success', 'Profile Updated!');
    }
}
