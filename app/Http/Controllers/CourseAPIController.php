<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\General as GeneralResource;
use App\Course;

class CourseAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::get();
        // $causes = NGO::select('name','ngo_id')->with('cause')->get();
        $dataModel['data'] = $courses;
        $dataModel['message'] = "Fetch Successful";
        $dataModel['error'] = false;
        return  new GeneralResource($dataModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $course = new Course;
        $course->coursename = $request->coursename;
        $course->coursecode = $request->coursecode;
        $course->courseprice = $request->courseprice;


        if($course->save())
        {
            
            $dataModel['data'] = $course->id;
            $dataModel['message'] = "Course Created Successful";
            $dataModel['error'] = false;
            return  new GeneralResource($dataModel);
            
        }
        else{
            $dataModel['data'] = null;
            $dataModel['message'] = "Course Creation Failed";
            $dataModel['error'] = true;
            return  new GeneralResource($dataModel);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        // $causes = NGO::select('name','ngo_id')->with('cause')->get();
        $dataModel['data'] = $course;
        $dataModel['message'] = "Fetch Successful";
        $dataModel['error'] = false;
        return  new GeneralResource($dataModel);
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
        $course = Course::find($id);
        $course->coursename = $request->coursename;
        $course->coursecode = $request->coursecode;
        $course->courseprice = $request->courseprice;
        
        if($course->save())
        {
            
            $dataModel['data'] = $course;
            $dataModel['message'] = "Course Updated Successful";
            $dataModel['error'] = false;
            return  new GeneralResource($dataModel);
            
        }
        else{
            $dataModel['data'] = null;
            $dataModel['message'] = "Course Updation Failed";
            $dataModel['error'] = true;
            return  new GeneralResource($dataModel);
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
        $course = Course::where('id',$id)->delete();
        // $causes = NGO::select('name','ngo_id')->with('cause')->get();
        $dataModel['data'] = null;
        $dataModel['message'] = "Delete Successful";
        $dataModel['error'] = false;
        return  new GeneralResource($dataModel);
    }
}
