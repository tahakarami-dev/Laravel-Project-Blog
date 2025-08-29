<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Article;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->with('articles')
            ->addSelect([
                'last_article'=> Article::query()->select('created_at')->whereColumn('user_id', 'users.id')->latest()->take(1),
            ])
            ->paginate(10);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password']= Hash::make($request->password);
        User::query()->create($data);

        return redirect()->route('users.index')->with('success','کاربر با موفقیت ایجاد شد');
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
    public function edit(string $id)
    {
        $user = User::query()->findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::query()->findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success','کاربر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createUserRoles($id)
    {
        $user = User::query()->findOrFail($id);
        $roles = Role::query()->get();
        return view('admin.users.user_roles', compact('roles','user'));
    }

    public function storeUserRoles(Request $request ,$id)
    {
        $user = User::query()->findOrFail($id);
        $user->roles()->sync($request->roles);
        return redirect()->back()->with(['success'=>'نقش ها به کاربر متصل شد']);
    }
}
