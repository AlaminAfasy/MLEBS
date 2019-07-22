<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class UserController extends Controller
{
    //
    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('adminDashboard');
    }
    public function valid(Request $request, $id)
    {
      $user=User::find($id);
      $user->status="valid";
      $user->save();
      return redirect()->route('adminDashboard');
    }
    public function invalid(Request $request, $id)
    {
      $user=User::find($id);
      $user->status="invalid";
      $user->save();
      return redirect()->route('adminDashboard');
    }
}
