<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\HtmlForm;

use App\FormName;

use Illuminate\Support\Facades\Input;

use DB,Session;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $data = DB::table('form_name')
        ->join('html_form','html_form.form_id','form_name.id')
        ->select('form_name.id','form_name.form_name', 'html_form.label', 'html_form.html_field','html_form.comments','html_form.id as rowId')
        ->get();
        return view('adminHome', compact('data'));
    }

    public function dynamicpage(){
         return view('dynamicpage');


    }


   public function addMore()
    {
        return view("dynamicpage");
    }

    public function addMorePost(Request $request)
    {
        // dd($request);
        $request->validate([
            'form_name'=>'required',
            'addmore.*.label' => 'required',
            'addmore.*.caption' => 'required',
            'addmore.*.comments' => 'required',
        ]);

        $formName= $request->form_name;
        $data = FormName::create(['form_name'=> strtoupper($formName)]);
        $form_id = $data->id;   
    
        foreach ($request->addmore as $key => $value) { //dd($value['caption']);
            $html_control = $value['caption'];
            if($value['caption'] == "text"){
                    $html = '<input type="text" name="txtname" placeholder="Enter your Label" class="form-control" />';
                }elseif($value['caption'] == "number"){
                    $html = '<input type="number" name="txtnumber" placeholder="Enter your Label" class="form-control" />';
                }else{
                    $html='<select name="gender">
                            <option value="none" selected>Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">other</option>
                        </select>';
                }


            $inst = [
                    'form_id' => $form_id,
                    'label'=> strtoupper($value['label']) ,
                    'control'=> strtoupper($html_control),
                    'html_control'=>strtoupper($html_control),
                    'html_field'=>$html,
                    'comments'=>strtoupper($value['comments']),
                ];

// dd($inst);
           HtmlForm::create($inst);
        }
        Session::flash('success_msg', 'Records added successfully!');
        return redirect()->route('admin.home');
        // return back()->with('success', 'Record Created Successfully.');
    }

    public function edit($id){
        $data['form_page'] = "Edit";
        $data = DB::table('form_name')
        ->join('html_form','html_form.form_id','form_name.id')
        ->select('form_name.id','form_name.form_name', 'html_form.label', 'html_form.html_field','html_form.comments','html_form.html_control','html_form.control')
        ->where('html_form.form_id',$id)
        ->get();

         return view('editdynamic', compact('data'));

    }

    public function updatePost(Request $request){
        // dd($request);
        $request->validate([
            'form_name'=>'required',
            'addmore.*.label' => 'required',
            'addmore.*.caption' => 'required',
            'addmore.*.comments' => 'required',
        ]);

        $form_id  = $request->form_id;
        $formName = $request->form_name;

           DB::table('form_name')
              ->where('id', $form_id)
              ->update(['form_name' => $formName]);

       foreach ($request->addmore as $key => $value) { 
        //dd($value['caption']);

           $data = DB::table('html_form')
           ->where('label',strtoupper($value['label']))
           ->where('control',strtoupper($value['caption']))
           ->where('html_form.form_id', $form_id)
           ->first();

           // dd($data->id);

           if($value['caption'] == "text"){
                $html = '<input type="text" name="txtname" placeholder="Enter your Label" class="form-control" />';
            }elseif($value['caption'] == "number"){
                $html = '<input type="number" name="txtnumber" placeholder="Enter your Label" class="form-control" />';
            }else{
                $html='<select name="gender">
                        <option value="none" selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">other</option>
                    </select>';
            }
            $inst = [
                    'form_id' => $form_id,
                    'label'=> $value['label'],
                    'control'=> $value['caption'],
                    'html_field'=>$html,
                    'comments'=>$value['comments'],
                ];

           if(!$data){
                 HtmlForm::create($inst);
            }else{
                 DB::table('html_form')
                  ->where('id',$data->id)
                  ->update($inst);
            }
        }
        Session::flash('success_msg', 'Records updated successfully!');
         return redirect()->route('admin.home');
    }

    public function delete($id){
         DB::delete('delete from html_form where id = ?',[$id]);
        Session::flash('success_msg', 'Post deleted successfully!');
        return redirect()->route('admin.home');

    }

    public function show($id){
        $data = DB::table('form_name')
        ->join('html_form','html_form.form_id','form_name.id')
        ->select('form_name.id','form_name.form_name', 'html_form.label', 'html_form.html_field','html_form.comments','html_form.html_control','html_form.control')
        ->where('html_form.form_id',$id)
        ->get();

        // dd($data);
        return view('showpage', compact('data'));
    }
    
}
