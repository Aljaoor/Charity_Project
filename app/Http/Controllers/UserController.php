<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $roles = Role::pluck('name','name')->all();
            return view('users.create',compact('roles'));
//        return  view('website.user.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
//            'password' => 'required|same:confirm-password',
        ]);

//        $request->password = Hash::make( $request->password );

        $user=new User();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->mobile = $request->mobile;
        if ($request->roles[0]=="user"){
            $user->role_id = 2;
        }
        elseif ($request->roles[0]=="admin"){
        $user->role_id = 1;
        }
        elseif ($request->roles[0]=="volunteer"){
            $user->role_id = 3;

        }
        $user->save();

       $user->assignRole($request->input('roles'));

       return redirect()->route('home')
           ->with('success',' welcome user account created successfully');

    }

    public function log_in(Request $request){
     $email=User::whereEmail($request->email)->first();
     if($email===null){
        return back()->with('error','The email you entered was wrong.');

     }
     else{
      $password=$email->password;

      if ($password===$request->password){

          return back()->with('success','welcome');
       }
      else{

          return back()->with('error','The password you entered was wrong.');
          }


      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
//            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->age=$request->age;
        $user->is_active=$request->is_active;

        if ($request->roles[0]=="user"){
            $user->role_id = 2;
        }
        elseif ($request->roles[0]=="admin"){
            $user->role_id = 1;
        }
        elseif ($request->roles[0]=="volunteer"){
            $user->role_id = 3;

        }
        $user->update();




//        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
}
