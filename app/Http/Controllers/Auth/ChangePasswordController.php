<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    public function update(Request $request)
    {
        // ID のチェック
        //（ここでエラーになることは通常では考えられない）
        if ($request->id != \Auth::user()->id) {
            return redirect()->route('users.show', ['user' => \Auth::user()->id])
                ->with('warning', '致命的なエラーです');
        }

        $user = \Auth::user();

        // Validation（6文字以上あるか，2つが一致しているかなどのチェック）
        $this->validator($request->all())->validate();
        // パスワードを保存
        $user->password = bcrypt($request->new_password);
        $user->save();
        return redirect()->route('users.show', ['user' => $user->id])
            ->with('status', 'パスワードを変更しました');
    }
}
