<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the currently logged-in user
        $currentUser = auth()->user();

        // Get all users except the currently logged-in user
        $users = User::where('id', '!=', $currentUser->id)->get(); 

        // Return the view with the updated users list
        return view('admin.users.index', compact('users'));
    }

    
    public function list()
    {
        $users = User::all();

        return response()->json($users);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); 
        return view('admin.users.create', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'img' => 'nullable|file|max:9024|mimes:jpeg,png',
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        
        if ($request->hasFile('img')) {
            $imageFile = $request->file('img');
            $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalName . "_" . time() . '.' . $imageFile->getClientOriginalExtension();
            $path = $imageFile->storeAs('public/upload/images', $fileName);
            $user->img = $fileName; 
        }


        // if ($request->role == 3) {
        //     $user->student_id = $request->student_id;
        //     $user->age = $request->age;
        //     $user->course = $request->course;
        //     $user->year = $request->year;
        //     $user->address = $request->address;
        // }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); 
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        $user = User::findOrFail($id);
    
       
        $validated = $request->validate([
            'img' => 'nullable|file|max:9024|mimes:jpeg,png',
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id, 
        ]);
    
       
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->hasFile('img')) {
            $imageFile = $request->file('img');
            $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalName . "_" . time() . '.' . $imageFile->getClientOriginalExtension();
            $path = $imageFile->storeAs('public/upload/images', $fileName);
            $user->img = $fileName;
        }
    

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); 
        }
    
        
        // if ($request->role == 3) {
        //     $user->student_id = $request->student_id;
        //     $user->age = $request->age;
        //     $user->course = $request->course;
        //     $user->year = $request->year;
        //     $user->address = $request->address;
        // } else {
            
        //     $user->student_id = null;
        //     $user->age = null;
        //     $user->course = null;
        //     $user->year = null;
        //     $user->address = null;
        // }
    
        
        $user->save();
    
        
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteUser = User::findOrFail($id);
        $userName = $deleteUser->name;
        $deleteUser->destroy($id);
        
        if($deleteUser){
            return response()->json(['message' => $userName .' deleted successfully']);
        } else {
            return response()->json(['error' => 'Deletion failed!']);
        }
    }
}
