<div class="container-fluid" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gray-700 text-gray-400">
                    {{ __('Users List Dashboard') }}
                    @if(!$isEdit)
                        <button
                            class="form-control-sm float-right bg-blue-800 text-gray-400 text-sm rounded-lg border-l-8 border-r-8"
                            wire:click="setCreate">
                            New User
                        </button>
                    @endif
                </div>

                <div class="card-body bg-gray-100 border-b-4 rounded border-blue-900" wire:poll.debounce.1000ms="render">
                    @include('livewire.success')
                    @if($isCreate)
                        @include('livewire.users.create')
                    @endif
                    @if($isEdit)
                        @include('livewire.users.edit')
                    @endif
                    @if(!$isCreate && !$isEdit)
{{--                        @if(count($users)>0)--}}
                            @include('livewire.users.UserList')
{{--                        @else--}}
{{--                            <span>No Users To Show</span>--}}
{{--                        @endif--}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
