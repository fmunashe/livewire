<div xmlns:wire="http://www.w3.org/1999/xhtml" class="px-5 mx-5 my-1">
    <form wire:submit.prevent="create">
        <div class="form-group">
            <input type="text" class="form-control form-control-sm" wire:model="name" placeholder="Full Name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-sm" wire:model="email" placeholder="Email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-sm" wire:model="password" placeholder="Password">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <input type="submit" class="form-control-sm bg-blue-800 text-gray-400  text-sm rounded-lg border-l-8 border-r-8 mr-2">
            <input type="button" class="form-control-sm bg-red-800 text-gray-400  text-sm rounded-lg border-l-8 border-r-8 mr-2" value="Cancel" wire:click="clear">
        </div>
    </form>
</div>
