<div class="container mt-4">

    <form wire:submit.prevent="SaveCar" >
        @csrf

        <div class="form-group">
            <label for="marque">Marque</label>
            <input type="text" wire:model="marque" id="marque" class="form-control mb-3">
            @error('marque')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" wire:model="model" id="model" class="form-control mb-3">
            @error('model')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="date" wire:model="year" id="year" class="form-control mb-3">
        </div>

        <div class="form-group">
            <label for="quantity">quantity</label>
            <input type="number" wire:model="quantity" id="quantity" class="form-control mb-3">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" wire:model="price" id="price" class="form-control mb-3">
        </div>

        <label for="status" class="mb-3">Status</label>
        <div class="form-group d-flex justify-content-center">
            <div class="form-check form-check-inline">
                <input type="radio" wire:model="status" value="1" id="available" class="form-check-input mb-4">
                <label for="available" class="form-check-label">Available</label>
            </div>

            <div class="form-check form-check-inline">
                <input type="radio" wire:model="status" value="0" id="not-available"
                    class="form-check-input mb-4">
                <label for="not-available" class="form-check-label">not-available</label>
            </div>
        </div>

        <div class="form-group mb-4">
            <label for="picture">upload-car</label>
            <input type="file" wire:model="picture" id="picture" class="form-control form-control-sm">
        </div>
        <div class="d-flex justify-content-end mb-2">
            <button type="submit" class="btn btn-primary mt-7 mb-3 ">Save</button>
        </div>
    </form>
</div>
