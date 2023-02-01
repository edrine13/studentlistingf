<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\Paginator;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Builder;

class StudentController extends Controller
{
    
    public function index(Request $request) 
    {
        // $data = array("students" => Students::sortable(request()->sort, request()->direction)->Paginate(10));
        // return view('students.index', $data);
        $data['q'] = $request->query('q');
        $query = DB::table('students')->where(function ($query) use ($data){
            $query->where('first_name', 'like', '%' . $data['q'] . '%');
            $query->orWhere('last_name', 'like', '%' . $data['q'] . '%');
            $query->orWhere('age', 'like', '%' . $data['q'] . '%');
            $query->orWhere('gender', '=', $data['q']); 
        });


        $data['students'] = $query->orderBy(request()->sort ?? 'created_at' , request()->direction ?? 'desc')->paginate(10)->withQueryString();
        return view('students.index', $data); 
    }

    public function show($id) {
        $data = Students::findOrFail($id);
        return view('students.edit', ['student' => $data]);
    }

    public function create() {
        return view('students.create')->with('title', 'Add New');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "first_name" => ['required', 'min:2'],
            "last_name" => ['required', 'min:2'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email', Rule::unique('students','email')],            
       ]);

        Students::create($validated);

        return redirect('/')->with('message', 'New Student was added successfully!');
    }

    public function update(Request $request, Students $student) {
        // dd($request);
        $validated = $request->validate([
            "first_name" => ['required', 'min:2'],
            "last_name" => ['required', 'min:2'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email'],            
       ]); 

       $student->update($validated);

       return back()->with('message', 'Data was successfully updated');
    }

    public function destroy(Students $student) {
        $student->delete();
        return redirect('/')->with('message','Data was successfully deleted');
    }

  }
