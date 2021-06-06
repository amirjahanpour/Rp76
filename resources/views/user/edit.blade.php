@extends("layouts.master.master")

@section("ex-title","Create new user")

@section("body")
    <div class="card col-md-12">
        <div class="card-body">
            <a href="{{route("user.index")}}" class="btn btn-secondary">مشاهده کاربر</a>
        </div>
    </div>
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
            <p>عکس قبلی شما :</p>
            <img src="{{asset('/upload/'.$user->image)}}" style="width: 10rem">
        </div>
        <form action="{{route("user.update",$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="form-group">
                <label style="margin-top: 1rem">نام انتخابات</label>
                <select name="{{\App\Models\User::ELECTION}}" class="form-control" >
                    <option value="{{$user->election}}"></option>
                    <option value="1">انتخابات ریاست جمهوری</option>
                    <option value="2">انتخابات مجلس خبرگان رهبری</option>
                    <option value="3">انتخابات مجلس شورای اسلامی</option>
                    <option value="4">انتخابات شورای اسلامی شهر و روستا</option>
                </select>
            </div>
            <div>
                <div class="form-group">
                    <label for="name">Fullname : </label>
                    <input required value="{{old(\App\Models\User::NAME,$user->name)}}" type="text" class="form-control" name="{{\App\Models\User::NAME}}">
                </div>
                <div class="form-group">
                    <label for="phone" class="text-center">تلفن ثابت همراه با پیش شماره</label>
                    <input required value="{{old(\App\Models\User::PHONE,$user->phone)}}" type="text" class="form-control" name="{{\App\Models\User::PHONE}}">
                </div>
                <div class="form-group">
                    <label for="mobile" class="text-center">تلفن همراه</label>
                    <input required value="{{old(\App\Models\User::MOBILE,$user->mobile)}}" type="text" class="form-control" name="{{\App\Models\User::MOBILE}}">
                </div>
                <dev>
                    <label for="name" class="text-center">لطفا استان و شهر خود را انتخاب کنید</label>
                    <div>
                        <select name="{{\App\Models\User::STATE_ID}}" class="form-control form-control-lg" onChange="iranwebsv(this.value);">
                            <option VALUE="0">لطفا استان را انتخاب کنید</option>
                            @foreach($state_select as $state )
                                <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <select name="{{\App\Models\User::CITY_ID}}" class="form-control" onChange="iranwebsv(this.value);">
                            <option VALUE="0">لطفا شهر را انتخاب کنید</option>
                            @foreach($city_select as $citie)
                                <option data-id="" value="{{$citie->id}}">{{$citie->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </dev>
                <div class="form-group">
                    <label style="margin-top: 12px;" for="{{\App\Models\User::IMAGE}}">ارسال عکس</label>
                    <input name="{{\App\Models\User::IMAGE}}" type="file" class="form-control" id="{{\App\Models\User::IMAGE}}">
                </div>
                <div class="form-group">
                    <label for="username">نام کاربری</label>
                    <input required value="{{old(\App\Models\User::USERNAME,$user->username)}}" type="text" class="form-control" name="{{\App\Models\User::USERNAME}}">
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input required value="{{old(\App\Models\User::EMAIL,$user->email)}}" type="email" class="form-control" name="{{\App\Models\User::EMAIL}}">
                </div>
                <div class="form-group">
                    <label for="password">رمز عبور</label>
                    <input type="password" class="form-control" name="{{\App\Models\User::PASSWORD}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">ارسال رزومه، سوابق ،زندگی نامه ...</label>
                    <textarea class="form-control" name="{{\App\Models\User::RESUME}}" id="exampleFormControlTextarea1" rows="3">{{$user->resume}}</textarea>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">مسئولیت صحت و سقم تمامی موارد ارسال شده بر عهده اینجانب می باشد</label>
                </div>
                <input type="submit" value="Edit" class="btn btn-success rounded">
            </div>
        </form>
@endsection