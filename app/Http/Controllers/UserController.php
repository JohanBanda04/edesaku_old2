<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\VillageFile;

class UserController extends Controller {

    public static function login(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|min:6|max:25',
            'password' => 'required|min:6',
        ]);
        $remember = $request->boolean('remember_me');
        if (Auth::attempt(
                $credentials,
                $remember
            )){
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        return back()->with([
            'gagal' => 'Gagal login, periksa kembali nama dan sandi pengguna.',
        ]);
    }
    
    public static function logout(Request $request) {
        if (Auth::user()){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return redirect()->intended('/home');
    }

    public static function register_user(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|min:6|max:25|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $credentials['password'] = Hash::make($credentials['password']);
        
        User::create($credentials);
        $request->session()->flash('berhasil', 'Registrasi akun baru berhasil');
        return redirect('/');
    }
    
    public static function view_users(Request $request){
        $users = User::where('role_id', '>', auth()->user()->role_id)->get();
        return view('users', [
            'users' => $users
        ]);
    }
    public static function view_user_files(Request $request){
        $villageFiles = VillageFile::getAllCombination()->where('uploaders.id', $request->route('user_id'))->get()->groupBy('village_id');
        return view('table', [
            'villageFiles' => $villageFiles]
        );
    }
    public static function change_password(Request $request){
        $credentials = $request->validate([
            'password' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed',
        ]);
        
        if (Auth::once(['username' => auth()->user()->username, 'password' => $credentials['password']])) {
            User::where('name', auth()->user()->username)
            ->update(['password' => Hash::make($credentials['new_password'])]);
            return back()->with([
                'berhasil' => 'Berhasil menyetel ulang sandi',
            ]);
        }
        return back()->with([
            'gagal' => 'Gagal menyetel ulang sandi',
        ]);
    }
    public static function reset_password(Request $request){
        if (auth()->user()->role_id < User::where('username', $request->route('username'))->first()->role_id){
            $new_password = random_int(0, 9).random_int(0, 9).random_int(0, 9).random_int(0, 9).random_int(0, 9).random_int(0, 9);
            if (User::where('username', $request->route('username'))
            ->update(['password' => Hash::make($new_password)])){
                return back()->with([
                    'berhasil' => 'Berhasil menyetel ulang sandi, sandi baru untuk ' . $request->route('username') . ' adalah ' . $new_password,
                ]);
            }
        }
        return back()->with([
            'gagal' => 'Gagal menyetel ulang sandi',
        ]);
    }
}