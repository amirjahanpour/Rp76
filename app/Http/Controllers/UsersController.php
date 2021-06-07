<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::with("city","state")->orderby("id", "DESC")->paginate();
        return view("user.index", compact("users"));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $city_select = City::all();
        $state_select = State::all();
        return view("user.create",compact("city_select"),compact("state_select"));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            User::NAME => ["required", "string"],
            User::EMAIL => ["nullable","email"],
            User::USERNAME => ["required", "unique:users"],
            User::PASSWORD => ["required", "min:8"],
            User::STATE_ID => ["nullable"],
            User::CITY_ID => ["nullable"],
            User::PHONE => ["nullable"],
            User::MOBILE => ["nullable"],
            User::RESUME => ["nullable"],
            User::ELECTION => ["required"],
            User::OBLIGATION => ["required"],
            User::IMAGE.".*" => ["nullable", "image", "max:2024"]
        ]);

        $validate[User::PASSWORD] = bcrypt($validate[User::PASSWORD]);

        if ($request->hasFile(User::IMAGE)) {
            $imageName = uniqid() . "." . $request->file(User::IMAGE)->getClientOriginalExtension();
            $request->file(User::IMAGE)->move(public_path("upload/"), $imageName);
            $validate[User::IMAGE] = $imageName;
        }
        User::create($validate);
        return back()->with("msg", "ثبت با موفقیت انجام داده شد.");
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
        if (Auth::user()->is_admin!=1 and !request()->hasValidSignature())
                abort(403);

        $city_select = City::all();
        $state_select = State::all();
        return view("user.edit",compact("user"),compact("city_select" , "state_select"));
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
            User::EMAIL => ["nullable", "email", "unique:users,id," . $user->id],
            User::USERNAME => ["required", "unique:users,id," . $user->id],
            User::PASSWORD => ["nullable", "min:8"],
            User::STATE_ID => ["nullable"],
            User::CITY_ID => ["nullable"],
            User::PHONE => ["nullable"],
            User::MOBILE => ["nullable"],
            User::RESUME => ["nullable"],
            User::ELECTION => ["nullable"],
            User::OBLIGATION => ["required"],
            User::IMAGE.".*" => ["nullable", "image", "max:2024"]
        ]);
        if ($request->hasFile(User::IMAGE)) {
            $imageName = uniqid() . "." . $request->file(User::IMAGE)->getClientOriginalExtension();
            $request->file(User::IMAGE)->move(public_path("upload/"), $imageName);
            $validate[User::IMAGE] = $imageName;
        }

        if (empty($validate[User::PASSWORD]))
            unset($validate[User::PASSWORD]);
        else
            $validate[User::PASSWORD] = bcrypt($validate[User::PASSWORD]);

        $user->update($validate);

        return back()->with("msg", "ویرایش با موفقیت انجام شد.");
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return back()->with("msg", "کاربر غیرفعال شد.");
    }
}
