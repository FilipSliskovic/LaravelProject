<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTableRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class AdminTablesController extends BackEndController
{
    //

    public function index()
    {

        $this->data['tables'] = Table::all();

        return view('pages.admin.AdminTables',['data' => $this->data]);
    }

    public function create()
    {
        return view('pages.admin.AdminCreateNewTable',['data' => $this->data]);
    }

    public function store(CreateTableRequest $request)
    {


        try {
            $table = new Table();
            $table->name = $request->name;
            $table->seats = $request->seats;

            $table->save();
            $this->AddToLog('Made a new table');
            return redirect()->back()->with('success-msg', "Successfully added a nav item!");

        }
        catch (\Exception $e) {
            $userTicket = uuid_create();
            Log::error($userTicket . " " . $e->getMessage());
            return  redirect()->back()->with("error", "An error has occurred, please contact support with this ticket number " . $userTicket);
        }



    }



}
