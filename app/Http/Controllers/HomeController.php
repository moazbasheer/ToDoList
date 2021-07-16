<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }

    public function postIndex(Request $req) {
        $id = $req->input('id');
        
        $item = Item::findOrFail($id);
        if(auth()->user()->id === $item->owner_id) {
            $item->done = !$item->done;
        }
        $item->save();

        return Redirect()->route('index');
    }

    public function getAdd() {
        return view('add');
    }

    public function postAdd(Request $req) {
        $req->validate([
            'name' => 'required'
        ]);
        $item = new Item;
        $item->name = $req->input('name');
        $item->owner_id = auth()->user()->id;
        $item->done = false;
        $item->save();

        return Redirect()->route('index');
    }

    public function getDelete($id) {
        $item = Item::findOrFail($id);
        if(auth()->user()->id === $item->owner_id) {
            $item->delete();
        }

        return Redirect()->route('index');
    }

    public function getRegister() {
        return view('register');
    }

    public function postRegister(Request $req) {
        $data = $req->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $data["email"])->first();
        if($user) {
            return Redirect()->route('register')->withErrors([
                'email' => 'this mail is used before'
            ]);
        }
        
        $user = new User;
        $user->name = $req->username;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();

        return Redirect()->route('index');
    }
}
