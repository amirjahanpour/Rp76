@extends("layouts.master.master")

@section("ex-title","User list")

@section("body")
    <div class="card col-md-12">
        <div class="card-body">
            @if(session()->has("msg"))
                <div class="alert alert-success">
                    {{session()->get("msg")}}
                </div>
            @endif
            <div class="form-inline">
                <form action="{{url('logout')}}" method="post">
                    <a href="{{route("user.create")}}" class="btn btn-secondary">اضافه کردن کاربر</a>
                    @csrf
                    <input CLASS="btn btn-secondary" type="submit" value="خروج">
                </form>
            </div>
        </div>
    </div>
    <div class="card col-md-12">
        <div class="card-b ody">
            <table class="table hover table-striped table-responsive-md">
                <thead>
                <tr>
                    <th>شماره</th>
                    <th>عکس</th>
                    <th>نام</th>
                    <th>انتخابات</th>
                    <th>استان</th>
                    <th>شهر</th>
                    <th>شماره ثابت</th>
                    <th>شماره همراه</th>
                    <th>نام کاربری</th>
                    <th>توضیحات</th>
                    <th>کلید ها</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key=>$user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td><img src="{{asset('/upload/'.$user->image)}}" style="width: 6rem"></td>
                        <td>{{$user->name}}</td>
                        <td>
                            @if(@\App\Models\User::ELECTION_LIST[$user->election] === 'نام انتخابات')
                            {{'هیچکدام'}}
                            @else
                                {{@\App\Models\User::ELECTION_LIST[$user->election]}}
                            @endif
                        </td>
                        <td>
                            @if(@$user->state->name === null)
                                {{'هیچکدام'}}
                            @else
                            {{@$user->state->name}}
                            @endif
                        </td>
                        <td>
                            @if(@$user->city->name === null)
                                {{'هیچکدام'}}
                            @else
                                {{@$user->city->name}}
                            @endif
                        </td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->username}}</td>
                        <td ><div style="width: 200px;height: 120px;overflow: auto;">{{$user->resume}}</div></td>
                        <td>
                            <form action="{{route("user.destroy",$user->id)}}" method="post" class="form-inline">
                                <a href="{{route("user.edit",$user->id)}}" class="btn btn-warning">ویرایش</a>
                                @if(auth()->id() != $user->id)
                                    @csrf
                                    @method("delete")
                                    <input style="margin-top: 12px;" type="submit" value="حذف" class="btn btn-danger">
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->links("pagination::bootstrap-4")}}
        </div>
    </div>
@endsection

@section("ex-js")
    <script>
        console.table({!! json_encode(\Illuminate\Support\Facades\DB::getQueryLog()) !!})
    </script>
@endsection