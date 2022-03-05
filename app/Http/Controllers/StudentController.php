<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\teacher;
use App\Models\User;
use DataTables;

class StudentController extends Controller
{
    public function index()
    {
        return view('welcome');
    }


    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getCustomer(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
                ->make(true);
        }
    }

    public function getTeacher(Request $request)
    {
        if ($request->ajax()) {
            $data = teacher::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
                ->make(true);
        }
    }
}