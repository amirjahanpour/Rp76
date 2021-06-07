@extends("layouts.master.master")

@section("ex-title","Create new user")

@section("body")
    @if(Illuminate\Support\Facades\Auth::user()->is_admin==1)
    <div class="card col-md-12">
        <div class="card-body">
            <div class="form-inline">
                <form action="{{url('logout')}}" method="post">
                    <a href="{{route("user.index")}}" class="btn btn-secondary">مشاهده کاربر</a>
                    @csrf
                    <input CLASS="btn btn-secondary" type="submit" value="خروج">
                </form>
            </div>
        </div>
    </div>
    @endif
    <div class="card col-md-12">
        <div class="card-body">
            @if(session()->has("msg"))
                <div class="alert alert-success">
                    {{session()->get("msg")}}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ol>
                        @foreach($errors->all() as $item)
                            <li>{{$item}}</li>
                        @endforeach
                    </ol>
                </div>
            @endif
        </div>
        <div>
            <p class="font-weight-bold">عکس قبلی شما :</p>
            <img src="{{asset('/upload/'.$user->image)}}" style="width: 10rem">
        </div>
        <form action="{{route("user.update",$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="form-group">
                <label style="margin-top: 1rem" class="font-weight-bold">نام انتخابات<span style="color:red">*</span></label>
                <select name="{{\App\Models\User::ELECTION}}" class="form-control" >
                    <option value="{{$user->election}}">{{@\App\Models\User::ELECTION_LIST[$user->election]}}</option>
                    @foreach(\App\Models\User::ELECTION_LIST as $key=>$item)
                        <option value="{{$key}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <div class="form-group">
                    <label for="name" class="font-weight-bold">نام و نام خانوادگی<span style="color:red">*</span></label>
                    <input required value="{{old(\App\Models\User::NAME,$user->name)}}" type="text" class="form-control" name="{{\App\Models\User::NAME}}">
                </div>
                <div class="form-group">
                    <label for="phone" class="font-weight-bold">تلفن ثابت همراه با پیش شماره</label>
                    <input value="{{old(\App\Models\User::PHONE,$user->phone)}}" type="text" class="form-control" name="{{\App\Models\User::PHONE}}">
                </div>
                <div class="form-group">
                    <label for="mobile" class="font-weight-bold">تلفن همراه</label>
                    <input value="{{old(\App\Models\User::MOBILE,$user->mobile)}}" type="text" class="form-control" name="{{\App\Models\User::MOBILE}}">
                </div>
                <dev>
                     <label for="name" class="font-weight-bold">لطفا استان و شهر خود را انتخاب کنید</label>
                        <div>
                            <select name="{{\App\Models\User::STATE_ID}}" class="form-control form-control-lg">
                                <option VALUE="{{$user->state_id}}">{{@$user->state->name}}</option>
                                @foreach($state_select as $state )
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <select name="{{\App\Models\User::CITY_ID}}" class="form-control">
                                <option VALUE="{{$user->city_id}}">{{@$user->city->name}}</option>
                                @foreach($city_select as $citie)
                                    <option data-id="{{$citie->state_id}}" value="{{$citie->id}}">{{$citie->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </dev>

                    <div class="form-group">
                    <label style="margin-top: 12px;" class="font-weight-bold" for="{{\App\Models\User::IMAGE}}">ارسال عکس</label>
                    <input name="{{\App\Models\User::IMAGE}}" type="file" class="form-control" id="{{\App\Models\User::IMAGE}}">
                </div>
                <div class="form-group">
                    <label for="username" class="font-weight-bold">نام کاربری</label>
                    <input required value="{{old(\App\Models\User::USERNAME,$user->username)}}" type="text" class="form-control" name="{{\App\Models\User::USERNAME}}">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="email">ایمیل</label>
                    <input value="{{old(\App\Models\User::EMAIL,$user->email)}}" type="email" class="form-control" name="{{\App\Models\User::EMAIL}}">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="password">رمز عبور</label>
                    <input type="password" class="form-control" name="{{\App\Models\User::PASSWORD}}">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="exampleFormControlTextarea1">ارسال رزومه، سوابق ،زندگی نامه ...</label>
                    <textarea class="form-control" name="{{\App\Models\User::RESUME}}" id="exampleFormControlTextarea1" rows="3">{{$user->resume}}</textarea>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="obligation">
                    <label class="custom-control-label font-weight-bold" for="customCheck1">مسئولیت صحت و سقم تمامی موارد ارسال شده بر عهده اینجانب می باشد <span style="color:red"> *</span> </label>
                </div>
                <input type="submit" style="margin-bottom: 20px; margin-top: 12px" value="ثبت" class="btn btn-success rounded">
            </div>
        </form>
@endsection
        @section('ex-js')
            <script>
                $(document).ready(function () {
                    $("[name='{{\App\Models\User::CITY_ID}}']").find("option").hide();
                })

                $("[name='{{\App\Models\User::STATE_ID}}']").change(function () {
                    const id = $(this).val();
                    $("[name='{{\App\Models\User::CITY_ID}}']").find("option").hide();
                    $("[name='{{\App\Models\User::CITY_ID}}']").find("option").each(function (index, item) {
                        if ($(item).data("id") == id)
                            $(item).show();
                    });
                })
            </script>
@endsection