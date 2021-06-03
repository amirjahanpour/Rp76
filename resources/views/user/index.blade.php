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
            <a href="{{route("user.create")}}" class="btn btn-outline-success">New User</a>
        </div>
    </div>
    <div class="card col-md-12">
        <div class="card-body">
            <table class="table hover table-striped table-responsive-md">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Mnage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key=>$user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form action="{{route("user.destroy",$user->id)}}" method="post">
                                <a href="{{route("user.edit",$user->id)}}" class="btn btn-warning">Edit</a>
                                @if(auth()->id() != $user->id)
                                    @csrf
                                    @method("delete")
                                    <input type="submit" value="Delete" class="btn btn-danger">
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