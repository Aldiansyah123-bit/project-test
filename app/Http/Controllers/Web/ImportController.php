<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Imports\MemberImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:member-import', ['only' => ['import']]);
    }

    public function import(Request $request)
    {

        $data = Excel::toArray(new MemberImport, $request->file('file'));
        // dd($data);
        return redirect()->route('members.index')
            ->with('success', 'Import Modul Member Created Successfully');
    }
}
