<form>
    <input type="hidden" wire:model="patient_id">
    <div class="form-group mb-3">
        <label for="patientName">Name:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="patientName" placeholder="Enter Name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="patientEmail">Email:</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="patientEmail" placeholder="Enter Email" wire:model="email">
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="categoryDescription">Mobile:</label>
        <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="patientMobile" placeholder="Enter Mobile" wire:model="mobile">
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="patientBirthdate">Birthdate:</label>
        <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="patientBirthdate" placeholder="Enter Birthdate Ex.13/10/2021" wire:model="birthdate">
        @error('birthdate') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="update()" class="btn btn-success btn-block">Save</button>
        <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
    </div>
</form>