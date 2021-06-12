@extends("layouts.master.master")

@section("ex-title","Create new user")

@section("body")
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
        <form action="{{route("user.store")}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold">نام انتخابات<span style="color:red">*</span></label>
                <select name="{{\App\Models\User::ELECTION}}" class="form-control">
                    @foreach(\App\Models\User::ELECTION_LIST as $key=>$item)
                        <option value="{{$key}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <div class="form-group">
                    <label for="name" class="font-weight-bold">نام و نام خانوادگی<span style="color:red">*</span></label>
                    <input required value="{{old(\App\Models\User::NAME)}}" type="text" class="form-control"
                           name="{{\App\Models\User::NAME}}">
                </div>
                <div class="form-group">
                    <label for="phone" class="font-weight-bold">تلفن ثابت همراه با پیش شماره</label>
                    <input value="{{old(\App\Models\User::PHONE)}}" type="text" class="form-control"
                           name="{{\App\Models\User::PHONE}}">
                </div>
                <div class="form-group">
                    <label for="mobile" class="font-weight-bold">تلفن همراه </label>
                    <input value="{{old(\App\Models\User::MOBILE)}}" type="text" class="form-control"
                           name="{{\App\Models\User::MOBILE}}">
                </div>
                <dev>
                    <label for="name" class="font-weight-bold">لطفا استان و شهر خود را انتخاب کنید</label>
                    <div>
                        <select name="{{\App\Models\User::STATE_ID}}" class="form-control form-control-lg">
                            <option VALUE="0">لطفا استان را انتخاب کنید</option>
                            @foreach($state_select as $state )
                                <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <select name="{{\App\Models\User::CITY_ID}}" class="form-control">
                            <option VALUE="0">لطفا شهر را انتخاب کنید</option>
                            @foreach($city_select as $citie)
                                <option data-id="{{$citie->state_id}}" value="{{$citie->id}}">{{$citie->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </dev>
                <div>
                    <div class="form-group">
                        <label style="margin-top: 12px;" class="font-weight-bold" for="{{\App\Models\User::IMAGE}}">ارسال عکس شماره یک</label>
                        <input name="{{\App\Models\User::IMAGE}}" type="file" class="form-control" id="{{\App\Models\User::IMAGE}}">
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 12px;" class="font-weight-bold" for="{{\App\Models\User::IMAGE_TWO}}">ارسال عکس شماره دو</label>
                        <input name="{{\App\Models\User::IMAGE_TWO}}" type="file" class="form-control" id="{{\App\Models\User::IMAGE_TWO}}">
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 12px;" class="font-weight-bold" for="{{\App\Models\User::IMAGE_THREE}}">ارسال عکس شماره سه</label>
                        <input name="{{\App\Models\User::IMAGE_THREE}}" type="file" class="form-control" id="{{\App\Models\User::IMAGE_THREE}}">
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 12px;" class="font-weight-bold" for="{{\App\Models\User::IMAGE_FOUR}}">ارسال عکس شماره چهار</label>
                        <input name="{{\App\Models\User::IMAGE_FOUR}}" type="file" class="form-control" id="{{\App\Models\User::IMAGE_FOUR}}">
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 12px;" class="font-weight-bold" for="{{\App\Models\User::IMAGE_FIVE}}">ارسال عکس شماره پنج</label>
                        <input name="{{\App\Models\User::IMAGE_FIVE}}" type="file" class="form-control" id="{{\App\Models\User::IMAGE_FIVE}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="font-weight-bold">نام کاربری</label>
                    <input required value="{{old(\App\Models\User::USERNAME)}}" type="text" class="form-control"
                           name="{{\App\Models\User::USERNAME}}">
                </div>
                <div class="form-group">
                    <label for="email" class="font-weight-bold">ایمیل</label>
                    <input value="{{old(\App\Models\User::EMAIL)}}" type="email" class="form-control"
                           name="{{\App\Models\User::EMAIL}}">
                </div>
                <div class="form-group">
                    <label for="password" class="font-weight-bold">رمز عبور</label>
                    <input required type="password" class="form-control" name="{{\App\Models\User::PASSWORD}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="font-weight-bold">ارسال رزومه، سوابق ،زندگی نامه ...</label>
                    <textarea class="form-control" name="{{\App\Models\User::RESUME}}" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="obligation">
                    <label class="custom-control-label font-weight-bold" for="customCheck1"><span style="color:red">*</span>مسئولیت صحت و سقم تمامی موارد ارسال شده بر
                        عهده اینجانب می باشد</label>
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