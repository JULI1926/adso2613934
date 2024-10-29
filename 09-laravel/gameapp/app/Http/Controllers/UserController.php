<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Exports\UserExport;
use App\Imports\UserImport;
use PDF;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        

        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('image'), $imageName);
            $imagePath = "image/" . $imageName; // Construir la ruta de acceso
        } else {
            $imagePath = null; // O manejar el caso de no imagen
        }

        $user = User::create([
            'photo' => $imagePath,
            'document' => $request->document,
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'phone' => $request->phone,          
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('users')->with('message', 'The user: '. $user->fullname.'was successfully created!');


    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //dd($user->toArray());
        return view('users.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user',$user);
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        //
        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('image'), $imageName);
            $imagePath = "image/" . $imageName; // Construir la ruta de acceso
        } else {
            $imagePath = $user->photo; // O manejar el caso de no imagen
        }

        $user->document = $request->document;
        $user->fullname = $request->fullname;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->photo = $imagePath;
        $user->phone = $request->phone;
        $user->email = $request->email;

        $user->save();
        
        if($user->save()){
            return redirect('users')->with('messages', 'The user: '. $user->fullname.'was successfully update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            return redirect('users')->with('message', 'The user: '. $user->fullname.'was successfulyy deleted!');
        }
    }

    public function search(Request $request){
        $users = User::names($request->q)->paginate(20);
        return view('users.search')->with('users', $users);        
        //return "Hola";
    }

    public function pdf(){
       $users = User::all();
       $pdf = PDF::loadView('users.pdf',compact('users')); 
       return $pdf->download('users.pdf');
       
    }

    public function excel(){
       return \Excel::download(new UserExport, 'users.xlsx');
    }

    public function import(Request $request){
        $file = $request->file('file');
        \Excel::import(new UserImport, $file);
        return redirect('users')->with('message', 'The users were successfully imported!');
    }
    
}


