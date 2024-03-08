<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SqlScriptController extends Controller
{
    public function script()
    {
//        $users=User::select(['mobile'])->where('mobile','like','1%')->get();
        $users=User::where('mobile','like','1%')->get();
        $alluser=User::all();
        foreach ($users as $user){
            $user->mobile  ='0'.$user->mobile;

            $user->save();
            print $user->mobile;
            print_r('\n');
////            User::updated('mobile',$user->mobile);
//            $user->update(['moble' => '0'.$user->mobile]);
//            $user->save();
        }

        return redirect('/')->with('success','user update successfully');
    }
}
