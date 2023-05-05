<?php

namespace App\Http\Controllers;

use App\Models\Staf;
use App\Models\Student;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DataTables;

class StudentController extends Controller
{
    public function studentList(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = ' <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-primary edit_btn">Edit</a>

                    <button class="btn btn-danger delete_btn" data-id="' . $row->id . '">Delete</button>';
                    return  $btn;
                })
                ->addColumn('img', function ($row) {
                    $img = '<img src="/storage/images/' . $row->img . '"width="50" height="50">';

                    return $img;
                })
                // ->editColumn('address1', function ($user) {
                //     return $user->address1 . '<br>' . $user->city_name . '<br>' . $user->state_name . '<br>' . $user->pin_code;
                // })
                ->addColumn('tname', function ($row) {

                    return $row->getTeacherName->teacherName;
                })
                ->rawColumns(['action', 'img'])
                ->make(true);
        }

        //$stud = Student::get();

        $tech = Staf::get();

        return view("student.studentList", compact("tech"));
    }

    public function studentAdd(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'sub' => 'required',
            'div' => 'required',
            'tname' => 'required',
            'img' => 'required',
        ]);



        Student::create([

            $photo = $request->file("img")->getClientOriginalName(),
            Storage::disk('public')->putFileAs('images', new File($request->file("img")), $photo),


            "name" => $request->name,
            "sub" => $request->sub,
            "div" => $request->div,
            "tname" => $request->tname,
            "img" => $photo,
        ]);
        //dd($photo);
        // return redirect()->route("studentList", compact("validated"))->with('msg', "Student Inserted");

        return response()->json(["msg" => "data insert"]);
    }

    public function studentEdit(Request $request)
    {

        $stud = Student::find($request->id);
        //$tech = Staf::get();

        // return view("student.studentEdit", compact("stud", "tech"));
        return response()->json(["msg" => "data edit", "stud" => $stud]);
    }

    public function studentUpdate(Request $request)
    {


        if ($request->img) {

            $photo = $request->file("img")->getClientOriginalName();
            Storage::disk('public')->putFileAs('images', new File($request->file("img")), $photo);
            Student::where('id', $request->id)->update([

                "img" => $photo,
            ]);
        }

        Student::where('id', $request->id)->update([

            "name" => $request->name,
            "sub" => $request->sub,
            "div" => $request->div,
            "tname" => $request->tname,

        ]);

        // return redirect()->route("studentList")->with('msg', "Student Update");
        return response()->json(["msg" => "Student Update"]);
    }

    public function studentDelete(Request $request)
    {


        $stud = Student::find($request->id);
        if ($stud) {
            $stud->delete();
            return response()->json(["msg" => "data Delete"]);
        } else {
            return response()->json(["msg" => "Some error"]);
        }


        //return view("student.studentList", compact("stud"));
    }
}
