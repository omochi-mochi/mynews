<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Profile;


use App\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    
    public function add()
    {
        $user_id = Auth::id();
        return view('admin.profile.create', ['user_id' => $user_id]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        unset($form['_token']);
        
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $request)
    {
        $profile = Profile::where('user_id',$request->user()->id)->first();
        if (empty($profile)) {
            abort(404);
        }
        
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::where('user_id',$request->user()->id)->first();
        $profile_form = $request->all();
        unset($profile_form['_token']);
        
        $profile->fill($profile_form)->save();
        
        $history = new ProfileHistory;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile/edit');
    }
}
