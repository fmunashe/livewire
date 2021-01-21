<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <table class="table table-sm border-b-2 border-blue-800 rounded">
        <thead class="">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Options <input type="text" class="form-control-sm bg-blue-800 text-gray-400 float-right"
                               wire:model="search" placeholder="search ..."></th>
        </tr>
        </thead>
        <tbody>
        @foreach($userss as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>
                    <button
                        class="form-control-sm bg-blue-800 text-gray-400 text-xs rounded-lg border-l-8 border-r-8 mr-2"
                        wire:click="setEdit({{$user->id}})">Edit
                    </button>
                    <button
                        class="form-control-sm  bg-red-800 text-gray-400 text-xs rounded-lg border-l-8 border-r-8 border-red-900"
                        wire:click="remove({{$user->id}})">Remove
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <span class="mb-4">{{$userss->links()}}</span>
    <span class="mb-4">Current Time Is :{{\Carbon\Carbon::now()}}</span>
    {{--    <span class="my-5">Total users :{{count($userss)}}  </span>--}}
</div>
