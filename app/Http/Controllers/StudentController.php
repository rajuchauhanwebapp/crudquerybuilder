<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('students')->get();
        return view('home', ['students'=>$students]);
    }

    public function store(Request $request)
    {
        DB::table('students')->insert([
            'name'=>$request->name,
            'city'=>$request->city,
            'pincode'=>$request->pin_code,
        ]);
        return redirect(route('index'))->with('status', 'Record Added Successfully!');
    }

    public function edit(Request $request)
    {
        $student = DB::table('students')->find($request->update_id);
        return view('update', ['student'=>$student]);
    }

    public function update(Request $request)
    {
        $updated = DB::table('students')->where('id', $request->update_id)->update([
            'name'=>$request->name,
            'city'=>$request->city,
            'pincode'=>$request->pin_code,
        ]);
        if ($updated) 
        {
            return redirect(route('index'))->with('status', 'Record Updated Successfully!');
        } 
        else 
        {
            return redirect(route('index'))->with('something', 'Something went is wrong!');
        }
    }

    public function destroy(Request $request)
    {
        $del_student = DB::table('students')->where('id', $request->delete_id)->delete();
        if ($del_student) 
        {
            return redirect(route('index'))->with('delete', 'Record Deleted Successfully!');
        } 
        else 
        {
            return redirect(route('index'))->with('something', 'Something went is wrong!');
        }
    }
}
