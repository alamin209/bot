<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Exports\TransactionsExport;
use App\Imports\BotTractionsImport;
use App\Imports\TransactionsImport;
use Illuminate\Support\Facades\Session;
class BotUrlController extends Controller
{
    public function importExcel(Request $request) 
    {
        \Excel::import(new BotTractionsImport,$request->import_file);

        // \Session::put('success', 'Your file is imported successfully in database.');

        Session::flash("success_message", __("Your file is imported successfully in database."));
        return back();
           
     
    }
}
