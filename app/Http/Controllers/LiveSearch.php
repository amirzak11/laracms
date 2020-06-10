<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveSearch extends Controller

{
    function index()
    {
        return view('live_search');
    }

    function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('categories')
                    ->where('title', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = DB::table('categories')
                    ->orderBy('title', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
        <div><a href="' .route('frontend.search.list',$row->id)  . '">' .$query.' در دسته بندی <span style="color: #00B0E8">'. $row->title .'</span> </a></div>

        ';
                }
            } else {
                $output = '

        <div align="center" colspan="5">No Data Found</div>

       ';
            }
            $data = array(
                'table_data' => $output,
            );

            echo json_encode($data);
        }
    }
}
