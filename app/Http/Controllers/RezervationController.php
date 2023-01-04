<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRezervationRequest;
use App\Models\Rezervation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RezervationController extends FrontEndController
{
    public function index()
    {

        $this->data['rezervations'] = Rezervation::with('table')
                                    ->where('user_id',Auth::user()->id)
                                    ->where('DateAndTime','>',Carbon::now()->toDateString())->get();


        return view('pages.main.rezervation',['data'=>$this->data]);
    }


    public function create()
    {
        $this->data['tables'] = Table::all();

        return view('pages.main.CreateRezervation',['data'=>$this->data]);
    }

    public function store(CreateRezervationRequest $request)
    {
//        dd('tu');
        $rez = new Rezervation();

        if (Auth::check())
        {

            if ($this->isValidDate($request->dateAndTime))
            {
                return redirect()->back()->with("error-msg", "That date already passed");
            }

        if ($this->IsRezerved($request->table, $request->dateAndTime) > 0)
        {
            return redirect()->back()->with("error-msg", "That table is rezerved at that time");
        }



        try {
            $rez = new Rezervation();
            $rez->table_id = $request->table;
            $rez->DateAndTime = $request->dateAndTime;
            $rez->user_id = Auth::user()->id;

            $rez->save();
            $this->AddToLog('Made a rezervation!');
//            return redirect()->back()->with('success-msg', "Successfully added a nav item!");
            return redirect()->route('Rezervation-index');

        }
        catch (\Exception $e) {
            $userTicket = uuid_create();
            Log::error($userTicket . " " . $e->getMessage());
            return  redirect()->back()->with("error-msg", "An error has occurred, please contact support with this ticket number " . $userTicket);
        }

        }
        abort('403');




    }

    public function IsRezerved($tableId,$DateAndTime)
    {
        $isRez = Rezervation::where('table_id',$tableId)
                            ->where('DateAndTime','>',Carbon::make($DateAndTime)->hour(-1)->toDateTimeString())
                            ->where('DateAndTime','<',Carbon::make($DateAndTime)->addHour()->toDateTimeString())
                            ->count();

//       dd($isRez->count());

        return $isRez;
    }

    public function isValidDate($DateAndTime)
    {

        return $DateAndTime > Carbon::now()->toDateTimeString() ? 0 : 1;
    }

    public function remove($id)
    {

        $rez = Rezervation::find($id);
        if ($rez != null)
        {
            $rez->delete();
            $this->AddToLog('Removed a rezervation');
        }
        else
        {
            abort('404');
        }
    }

}
