<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function show($id)
    {
        $data = Member::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Member',
            'data'    => $data,
        ],200);
    }
}
