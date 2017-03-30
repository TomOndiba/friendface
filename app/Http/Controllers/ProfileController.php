<?php


namespace Friendface\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Friendface\Models\User;


class ProfileController extends Controller {
    
    public function getProfile($username) {
        
        $user = User::where('username', $username)->first();
        
        if (!$user) {
            
            abort(404);
            
        }
        
        $statuses = $user->statuses()->notReply()->get();
               
        return view('profile.index')
            ->with('user', $user)
            ->with('statuses', $statuses)
            ->with('authUserIsFriend', Auth::user()->isFriendsWith($user)); 
        
    }
    
    public function getEdit() {
                       
        return view('profile.edit'); 
        
    }
    
    public function postEdit(Request $request) {
        
        $this->validate($request, [
            'first_name' => 'required|alpha|max:50',
            'last_name' => 'required|alpha|max:50',
            'location' => 'required|alpha|max:50'
        ]);
               
        Auth::user()->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'location' => $request->input('location')
            
        ]);
        
        return redirect()
            -> route('profile.edit')
            -> with('info', 'Your profile has been updated');
        
    }
    
    
}