<div class="container-fluid" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gray-700 text-gray-400">
                    <div class="row">
                        <div class="col-lg-6">{{ __('Contact List Dashboard') }}</div>
                        <div class="col-lg-4"><input type="text" class="form-control form-control-sm"
                                                     wire:model="search" placeholder="Search here"></div>
                        <div class="col-lg-2">
                            <button
                                class="form-control-sm float-right bg-blue-800 text-gray-400 text-sm rounded-lg border-l-8 border-r-8"
                                wire:click="clear">Refresh
                            </button>
                        </div>
                    </div>
                </div>
                @if($isEdit)
                    @include('livewire.edit')
                @else
                    @include('livewire.create')
                @endif

                <div class="card-body bg-gray-100 border-b-4 border-blue-900 rounded">
                    @include('livewire.success')
                    {{--                    @if(count($contacts)>0)--}}
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contactss as $contact)
                            <tr>
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->number}}</td>
                                <td>
                                    <button
                                        class="form-control-sm bg-blue-800 text-gray-400  text-sm rounded-lg border-l-8 border-r-8 mr-2 mr-4"
                                        wire:click="edit({{$contact->id}})">Edit
                                    </button>
                                    <button
                                        class="form-control-sm bg-red-800 text-gray-400  text-sm rounded-lg border-l-8 border-r-8"
                                        wire:click="remove({{$contact->id}})">Remove
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--                    @endif--}}
                    {{$contactss->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
