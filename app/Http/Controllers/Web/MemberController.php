<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Imports\MemberImport;
use App\Models\Group;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:member-list|member-create|member-edit|member-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:member-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:member-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:member-delete', ['only' => ['destroy']]);
         $this->middleware('permission:member-import', ['only' => ['import']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data   = Member::with('group')->orderBy('id','DESC')->get();
        $group  = Group::all();
        return view('members.index', compact('data','group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'address'   => 'required',
            'phone'     => 'required',
            'email'     => 'required',
            'profile'   => 'required'
        ]);

        $input = $request->except(['_token']);

        Member::create($input);

        return redirect()->route('members.index')
            ->with('success', 'Modul Member Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required',
            'address'   => 'required',
            'phone'     => 'required',
            'email'     => 'required',
            'profile'   => 'required'
        ]);

        $member = Member::find($id);

        $member->update($request->all());

        return redirect()->route('members.index')
                ->with('success', 'Modul Member Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();

        return redirect()->route('members.index')
                ->with('success', 'Modul Member Deleted Successfully');
    }
}
