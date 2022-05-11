<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserGuide;

class UserGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['header'] = 'User Guide';
        $data['contents'] = UserGuide::orderBy('id','asc')->paginate(10);

        return view('user_guide.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['header'] = 'User Guide';
        return view('user_guide.create');
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
            'heading' => 'required',
            'body' => 'required'
        ]);

        $content = new UserGuide;

        $content->heading = $request->heading;
        $content->body = $request->body;

        $content->save();

        return redirect()->back()->with('success', 'Guide has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['content']  = UserGuide::find($id);

        if ( ! $data['content'])
        {
            $request->session()->flash('error', 'Page does not exist');

            return redirect()->back();
        }
        
        $data['header'] = 'User Guide';

        return view('user_guide.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['header'] = 'Edit User Guide';

        $data['content']  = UserGuide::find($id);

        if ( ! $data['content'])
        {

            return redirect()->back()->with('error', 'Guide does not exist');
        }

        return view('user_guide.edit', $data);
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
        $content = UserGuide::find($id);
        //dd($content);

        if ( ! $content)
        {
            $request->session()->flash();

            return redirect()->back()->with('error', 'Guide does not exist');
        }

        //dd($validatedData);

        if ($content)
        {
            $new_content = UserGuide::find($id);

            $new_content->heading = $request->heading;
            $new_content->body = $request->body;

            $new_content->save();

            return redirect()->back()->with('success', 'Guide  successfully updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        UserGuide::destroy($id);

        return redirect()->back()->with('info', 'User Guide successfully deleted');
    }
}
