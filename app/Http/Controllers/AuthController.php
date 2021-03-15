<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use App\Models\User;

class AuthController extends Controller
{
    //logging out auser
    
     function logout(){
         auth()->logout();

         return redirect()->route('login');
     }
   
    function login(){
        
        return view('auth.login');
    }

     function logincheck(Request $request){

        // lets validate our add user form
        // dd(auth()->attempt($request->only('email','password')));

        $request -> validate([
            
            'email' => 'required|email|',
            'password' => 'required|min:4|max:12',
          
        ]);
            // checking whether credentials are stored in database

         auth()->attempt($request->only('email','password'));

           if(!auth()->attempt($request->only('email','password'))){
            return back()->with('fail','INVALID CREDENTIALS');
          }else{
              return redirect()->route('dashboard');
          }
     }
     
        
    function register(){
        return view('auth.register');
    }
    function create(Request $request){
        // lets validate our add user form
        
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:12',
            'role' => 'required'
        ]);

        //storing users to the database
        $user = new User;

        $user->name = $request ->name;
        $user->email = $request ->email;
        $user->password = Hash::make($request ->password) ;
        $user->role = $request ->role;
        
        $query = $user->save();

        if($query){
            return back()->with('success','You have successfully registered');
           }

            else{
                return back()->with('Fail','Something went Wrong');
            }
         }
        
            // listing all users from the database

            function users(){

                $data = array(
                    'list' => DB::table('Users')->get()
                );

                return view('page.user',$data);
            }

            // editing a single user

            function edit($id){

                $item = DB::table('users')->where('id',$id)->first();

                $data= [ 
                    'info' => $item
                     
                     ];

                return view('page.edit',$data);
            }

            //creating update function after editing

            function update(Request $request){
                  // lets validate our requests

                  $request -> validate([
                      'name' => 'required',
                      'password' => 'required',
                      'email' => 'required|email',
                      'role' => 'required',
                      
                  ]);
                
                  // query builder for updating

                  $updating = DB::table('users')->where('id',$request->input('cid'))
                              ->update([
                                  'name' => $request->input('name'),
                                  'password' => Hash::make($request->input('password')),
                                  'email' => $request->input('email'),
                                  'role' => $request->input('role'),
                              ]);

                              return redirect('users');

            }

            //deleting users from database

            function delete($id){
                $delete= DB::table('users')->where('id',$id)->delete();

                return redirect('users');
            }

            
}
