<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\BukuBesar;
use App\Models\NeracaSaldo;
use App\Models\PasswordResets;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class LupaKataSandi extends Controller
{
    public function index($response = null)
    {
        $data['response'] = $response;
        return view('auth.lupa_kata_sandi', $data);
    }

    public function kirimKonfirmasiEmail(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        if (!$user) {
            return redirect()->back()->with(['error' => 'email tidak dikenali']);
        }

        $kodeReset = Str::random(200);
        PasswordResets::create([
            'user_id' => $user->id,
            'reset_code' => $kodeReset
        ]);


        return Redirect::to('https://reset-password.alterga.com/send/' . $user->email . '/' . $kodeReset);
    }

    public function getResetPassword($kodeReset)
    {
        $passwordResetData = PasswordResets::where('reset_code', $kodeReset)->first();
        if (!$passwordResetData || Carbon::now()->subMinutes(10) > $passwordResetData->created_at) {
            return redirect()->route('lupa-kata-sandi')->with('error', 'link reset password tidak valid atau sudah expired');
        } else {
            return view('auth.reset_password', compact('kodeReset'));
        }
    }

    public function resetPassword($kodeReset, Request $request)
    {
        $passwordResetData = PasswordResets::where('reset_code', $kodeReset)->first();
        if (!$passwordResetData || Carbon::now()->subMinutes(10) > $passwordResetData->created_at) {
            return redirect()->route('lupa-kata-sandi')->with('error', 'link reset password tidak valid atau sudah expired');
        } else {
            $user = User::find($passwordResetData->user_id);
            if ($user->email != $request->email) {
                return redirect()->back()->with('error', 'Email tidak sesuai');
            } else {
                if ($request->password == $request->konfirmasi_password) {
                    PasswordResets::where('reset_code', $kodeReset)->delete();
                    $user->update([
                        'password' => bcrypt($request->password)
                    ]);
                    return redirect()->route('login')->with('success', 'password berhasil direset');
                } else {
                    return redirect()->back()->with('error', 'konfirmasi password salah');
                }
            }
        }
    }
}