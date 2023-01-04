<?php

namespace App\Models;

use App\Http\Requests\SearchActivitiesRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ActivityLogModel
{
    use HasFactory;


    public function search(Request $request) {
        //Initial query

//        $logs = ActivityLog::where('id','like','%' . )

//        $from = Carbon::today()->toDateString();
//        $to = Carbon::tomorrow()->toDateString();



//        if($request->FromDateTime != null && $request->ToDateTime != null)
//        {




//        }

        $logs = new ActivityLog();
//        $logs = ActivityLog::where('created_at','<>',[$from,$to]);



//        $query = DB::table("track");




        //WHERE
        if($request->has("keyword") && !empty($request->get("keyword"))) {
            $kw = $request->get("keyword");
            $logs = ActivityLog::where('id','like','%' . $kw . "%" )
                ->orWhere('action','like','%' . $kw . '%')
                ->orWhere('URL','like','%' . $kw . '%')
                ->orWhere('User','like','%' . $kw . '%');

//            $query = $query->where("track.name", 'like', '%' . $kw . '%')
//                ->orWhere("track.composer", 'like', '%' . $kw . '%')
//                ->orWhere("genre.name", 'like', '%' . $kw . '%')
//                ->orWhere("album.title", 'like', '%' . $kw . '%');
        }

        $from = Carbon::today()->toDateString();
        $to = Carbon::tomorrow()->toDateString();


        if ($request->FromDateTime && $request->ToDateTime)
        {
            $from = $request->FromDateTime;
            $to = $request->ToDateTime;


        }
        $logs = $logs->whereDate('created_at','>=',$from)
                    ->whereDate('created_at','<=',$to);
//        dd($logs);
        //PAGINATE
        $perPage = $this->getPerPage($request);


        //SELECT
//        $query = $query->select("track.*", "genre.name as GenreName", "album.title as AlbumName");
       //dd($logs);
       // dd($logs->paginate($perPage));
        return $logs->paginate($perPage)->withQueryString();

        //return $sort;
    }



    private function getPerPage(Request $request) {
        //Izbor za padajucu listu je -> 10, 20, 30, 40, 50

        $perPage = 10;
        if($request->has("perPage")) {
            $clientPerPage = $request->get("perPage"); //drop table users

            if(is_numeric($clientPerPage)) {
                if($clientPerPage >= 3 && $clientPerPage <= 100) {
                    $perPage = $clientPerPage;
                }
            }
        }

        return $perPage;
    }
}
