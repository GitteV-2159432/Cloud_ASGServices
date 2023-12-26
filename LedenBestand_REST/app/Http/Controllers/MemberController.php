<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use RicorocksDigitalAgency\Soap\Facades\Soap;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("AllMembers")->with("members", Member::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("AddMember");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'type'=>'required',
            'andereVereniging'=>'nullable',
        ]);
        $member = Member::create($data);
        return view("SpecificMember")->with("member", $member);        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::find($id);
        return view("SpecificMember")->with("member", $member);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
