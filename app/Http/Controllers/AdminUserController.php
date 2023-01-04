<?php

namespace App\Http\Controllers;

use App\Models\Rezervation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminUserController extends BackEndController
{
    public function index()
    {
        $this->data['users'] = User::all();

        return view('pages.admin.AdminUsers',['data' => $this->data]);
    }
    public function destroy($id)
    {
        try {

            $rez = Rezervation::where('user_id',$id)->count();

            if ($rez == 0)
            {
                User::destroy($id);
                $this->AddToLog('Deleted a user');
            }
            else
            {
                return redirect()->back()->with("error-msg", "Cant delete a user if he has rezervations");
            }

        }
        catch (\Exception $e) {
            $userTicket = uuid_create();
            Log::error($userTicket . " " . $e->getMessage());
            return  redirect()->back()->with("error-msg", "An error has occurred, please contact support with this ticket number " . $userTicket);
        }
    }
}
