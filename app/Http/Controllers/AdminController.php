<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ToDoList;
use App\Models\Article;
use App\Models\Type_task;
use Illuminate\Validation\Rule;
use Carbon\Carbon;




class AdminController extends Controller
{
    public function product(){
        return view('admin.product');
    }
    public function addproduct(Request $request){
        $data=new product;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->quantity=$request->quantity;
        $data->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }

    public function view_ToDoList(){
        $type_task= type_task :: all();
        $data=ToDoList::all();


        return view('admin.ToDoList', compact('type_task','data'));
    }

    public function add_ToDoList(Request $request){

        $request->validate(
            [
                'deadline' => [
                    'date',
                    Rule::notIn([now()->toDateString()]), // Exclure la date d'aujourd'hui
                    function ($attribute, $value, $fail) {
                        $chosenDate = Carbon::parse($value);
                        $maxDate = now()->addDays(5);
            
                        if ($chosenDate->greaterThan($maxDate)) {
                            $fail("La date de la deadline ne peut pas dépasser 5 jours .");
                        }
                    }
                ],
            ]
            );
        $data=new ToDoList;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->type_task=$request->type_task;
        $data->deadline=$request->deadline;
        $data->save();
        return redirect()->back()->with('message','Task Added Successfully');

    }

    public function delete_ToDoList($id){

        $data= ToDoList::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function view_article(){

        $data=article::all();

        return view('admin.article', compact('data'));
    }

    public function add_article(Request $request){
        $data=new article;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('articleimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->save();
        return redirect()->back()->with('message','Article Added Successfully');

    }

    public function show_article(){

        $article=article::all();

        return view('admin.show_article', compact('article'));   
     }

     public function delete_article($id){

        $article= article::find($id);
        $article->delete();
        return redirect()->back()->with('message','Article deleted Successfully');
    }

    public function edit_article($id){

        $article= article::find($id);
        return view('admin.edit_article', compact('article'));   
    }

    public function edit_article_confirm(Request $request,$id){

        $article=article::find($id);
        $article->title=$request->title ;
        $article->description=$request->description ;
        $article->save();
        return redirect()->back()->with('message','Article edited Successfully');


    }

    public function view_type_task(){
        $data=type_task::all();

        return view('admin.type_taks', compact('data'));
    }

    public function add_type_task(Request $request){

        $request->validate(
            [
                'title'=>'Alpha'
            ]
            );
        $data=new type_task;
        $data->title=$request->title;
        $data->save();
        return redirect()->back()->with('message','Type Added Successfully');

    }

    public function delete_type_task($id){

        $data= type_task::find($id);
        $data->delete();
        return redirect()->back();
    }

    


}
