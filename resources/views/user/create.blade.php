@extends("layouts.master.master")

@section("ex-title","Create new user")

@section("body")
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
            <form action="{{route("user.store")}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Fullname : </label>
                    <input required value="{{old(\App\Models\User::NAME)}}" type="text" class="form-control" name="{{\App\Models\User::NAME}}">
                </div>
                <div class="form-group">
                    <label for="username">Username : </label>
                    <input required value="{{old(\App\Models\User::USERNAME)}}" type="text" class="form-control" name="{{\App\Models\User::USERNAME}}">
                </div>
                <div class="form-group">
                    <label for="email">Email : </label>
                    <input required value="{{old(\App\Models\User::EMAIL)}}" type="email" class="form-control" name="{{\App\Models\User::EMAIL}}">
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input required type="password" class="form-control" name="{{\App\Models\User::PASSWORD}}">
                </div>
                <input type="submit" value="Create" class="btn btn-success rounded">
            </form>
        </div>
    </div>
@endsection