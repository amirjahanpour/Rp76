<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::orderby("id", "DESC")->paginate();
        return view("user.index", compact("users"));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("user.create");
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            User::NAME => ["required", "string"],
            User::EMAIL => ["required", "email", "unique:users"],
            User::USERNAME => ["required", "unique:users"],
            User::PASSWORD => ["required", "min:8"],
            User::IMAGE.".*" => ["nullable", "image", "max:2024"]
        ]);

        $validate[User::PASSWORD] = bcrypt($validate[User::PASSWORD]);

        if ($request->hasFile(User::IMAGE)) {
            $imageName = uniqid() . "." . $request->file(User::IMAGE)->getClientOriginalExtension();
            $request->file(User::IMAGE)->move(public_path("upload/"), $imageName);
            $validate[User::IMAGE] = $imageName;
        }
        User::create($validate);
        return back()->with("msg", "User Created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view("user.edit", compact("user"));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $validate = $request->validate([
            User::NAME => ["required", "string"],
            User::EMAIL => ["required", "email", "unique:users,id," . $user->id],
            User::USERNAME => ["required", "unique:users,id," . $user->id],
            User::PASSWORD => ["nullable", "min:8"]
        ]);

        if (empty($validate[User::PASSWORD]))
            unset($validate[User::PASSWORD]);
        else
            $validate[User::PASSWORD] = bcrypt($validate[User::PASSWORD]);

        $user->update($validate);

        return back()->with("msg", "User Updated successfully");
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return back()->with("msg", "User deleted successfully");
    }
}
