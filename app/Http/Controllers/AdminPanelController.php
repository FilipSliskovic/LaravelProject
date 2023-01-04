<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\ActivityLogModel;
use Illuminate\Http\Request;

class AdminPanelController extends BackEndController
{
    public function index(Request $request)
    {
//        $this->data['Activities'] = ActivityLog::paginate(5);
        $model = new ActivityLogModel();
        $this->data['Activities'] = $model->search($request);
        return view('pages.admin.adminpanel',['data'=>$this->data]);
    }
}
