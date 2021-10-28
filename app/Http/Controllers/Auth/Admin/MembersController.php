<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Resources\MembersResource;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MembersResource::collection(Member::latest()->get());
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
        $this->validate($request, [
            'fname' => '',
            'lname' => '',
            'oname' => '',
            'email' => '',
            'dob' => '',
            'nok' => '',
            'idnum' =>'',
            'phonenum' => '',
            'location' => '',
            'mstatus' => ''
        ]);

        $store = Member::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'oname' => $request->oname,
            'email' => $request->email,
            'dob' => $request->dob,
            'nok' => $request->nok,
            'idnum' => $request->idnum,
            'phonenum' => $request->phonenum,
            'location' => $request->location,
            'mstatus' => $request->mstatus,
            'accnum' => mt_rand(1000000,99999999)
        ]);

        if($store){
            return response()->json([
                'message' => 'Member Registered',
                'status' => 0
            ]);
        }else{
            return response()->json([
                'message' => 'Failed to register',
                'status' => 1
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return response()->json(['data'=>$member]);
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
        $member = Member::findOrFail($id);
        $this->validate($request, [
            'fname' => '',
            'lname' => '',
            'oname' => '',
            'email' => '',
            'dob' => '',
            'nok' => '',
            'idnum' =>'',
            'phonenum' => '',
            'location' => '',
            'mstatus' => ''
        ]);

        $update = $member->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'oname' => $request->oname,
            'email' => $request->email,
            'dob' => $request->dob,
            'nok' => $request->nok,
            'idnum' => $request->idnum,
            'phonenum' => $request->phonenum,
            'location' => $request->location,
            'mstatus' => $request->mstatus,
            'accnum' => $request->accnum
        ]);

        if($update){
            return response()->json([
                'message' => 'Details updated',
                'status' => 0
            ]);
        }else{
            return response()->json([
                'message' => 'Failed to update',
                'status' => 1
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $delete = $member->delete();
        
        if($delete){
            return response()->json([
                'message' => 'Account deleted',
                'status' => 0
            ]);
        }else{
            return response()->json([
                'message' => 'Failed to delete account',
                'status' => 1
            ]);
        }
    }

    public function search(Request $request){
        $result = Member::where('fname','LIKE',"%$request->search%")
        ->orWhere('lname','LIKE',"%$request->search%")
        ->orWhere('idnum','LIKE',"%$request->search%")
        ->orWhere('phonenum','LIKE',"%$request->search%")
        ->get();
        return $result;
    }
}
