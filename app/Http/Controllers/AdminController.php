<?php

namespace App\Http\Controllers;

use App\Country;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Gate;
use Auth;
class AdminController extends Controller
{
    public function index(){
        $e = Employee::all()->toArray();
        $arr = [];
        foreach($e as $k=>$item){
            if(empty($arr[$item['boss']]))
                $arr[$item['boss']] = [];
            $arr[$item['boss']][] = $item;
        }
        return view('index',['e'=>$arr]);
    }

    public function all(){
        $e = Employee::all();
        return view('all',['e'=>$e]);
    }

    public function contact(Request $request)
    {
        if ($request->isMethod("post")){
            $rules = [
                'email' => 'required|email'
            ];
            $this->validate($request, $rules);
            dump($request->all());
        }
        return view('contact');
    }

    public function add(Request $request){
        //if(Gate::denies('add'))
            //return redirect()->route('admin')->with(['message'=>'У Вас нет прав']);;

        $e = new Employee();
        if($request->user()->cannot('addEmployee', $e))
            return view('add')->with(['message'=>'У Вас нет прав ', 'e'=>$e]);

        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required|string|max:5'
            ];
            $this->validate($request,$rules);
            Employee::create([
                'name' => $request->all()['name'],
                'boss' => '2'
            ]);
            return redirect()->back();
        }
        return view('add', ['e'=>$e]);
    }
}
