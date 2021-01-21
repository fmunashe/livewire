<div class="mr-2 ml-2 mt-4">
    <form xmlns:wire="http://www.w3.org/1999/xhtml" wire:submit.prevent="submit">
        <div class="form-row">
            <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" placeholder="Name" wire:model="name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" placeholder="Email" wire:model="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control form-control-sm" placeholder="Phone Number" wire:model="number">
                @error('number') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-sm-3">
                <input type="submit" class="form-control form-control-sm bg-blue-800 text-gray-400  text-sm rounded-lg border-l-8 border-r-8 mr-2">
            </div>
        </div>
    </form>
</div>

