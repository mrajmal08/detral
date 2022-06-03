<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Validator;
use Redirect;

class TeamController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $team = team::orderBy('id', 'DESC')->get();
        return view('admin.team.index', compact('team'));

    }

    public function create(){
        return view('admin.team.create');
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'designation' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }


        $team = new Team();
        if($request->hasFile('image'))
        {

            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('Admin/ourteam'), $imageName);
            $team->image = $imageName;
        }
        else
        {
            $team->image = '';
        }

        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->department = $request->department;
        $team->university = $request->university;
        $team->save();

        return redirect()->route('team.index')->with('message','Team Member Added Successfully');


    }

    public function edit($id)
    {
        $team = team::find($id);
        return view('admin.team.edit', compact('team'));

    }

    public function update(Request $request, $id)
    {
        $team = team::find($id);

        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('Admin/ourteam'), $imageName);
            $team->image = $imageName;
        }

        if ($team->name) {
            $team->name = $request->name;
        }
        if ($team->designation) {
            $team->designation = $request->designation;
        }
        if ($team->department) {
            $team->department = $request->department;
        }
        if ($team->university) {
            $team->university = $request->university;
        }

        $team->save();

        return redirect()->route('team.index')->with('message', 'Team Member Updated Successfully');
    }

    public function destroy($id)
    {
        $team = team::find($id);
        $team->delete();
        return redirect()->route('team.index')->with('message', 'Team Member Deleted Successfully');
    }

}
