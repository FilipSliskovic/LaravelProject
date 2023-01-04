<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\NavMenu;
use App\Models\User;
use Illuminate\Http\Request;
use Faker;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use mysql_xdevapi\Exception;

class OsnovniController extends Controller
{
    //

    public function __construct()
    {

        $faker = Faker\Factory::create();


        for($i=0;$i < 5;$i++)
        {
            $obj = new \stdClass();
            $obj->title = $faker->unique()->word;
            $obj->price = rand(10,100);
            $obj->description = $faker->text(40);
            $obj->image = 'menu-1.jpg';
            $obj->alt = $faker->unique()->word;

            $this->data["products"][] = $obj;
        }

        $this->data['menu'] = NavMenu::all();


    }
    public function AddToLog(string $message)
    {

        try {
            $log = new ActivityLog();

            $log->action = $message;
            $log->URL = URL::full();
            $log->User = Auth::check() ? Auth::user()->name : 'Guest';

            $log->save();
        }

        catch (\Exception $e) {
            $userTicket = uuid_create();
            Log::error($userTicket . " " . $e->getMessage());
            return  redirect()->back()->with("error-msg", "An error has occurred, please contact support with this ticket number " . $userTicket);
        }


    }

}
