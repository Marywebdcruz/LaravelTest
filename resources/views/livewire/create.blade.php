<form>
    <div class="form-group mb-3">
        <label for="patientName">Name:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="patientName" value="test" placeholder="Enter Name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="patientEmail">Email:</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="patientEmail" placeholder="Enter Email" wire:model="email">
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="patientMobile">Mobile:</label>
        <input type="text" class="form-control @error('mobile') is-invalid @enderror" value="9624949787" id="patientMobile" placeholder="Enter Mobile" wire:model="mobile">
        @error('mobile') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="patientBirthdate">Birthdate:</label>
        <input type="text" class="form-control @error('mobile') is-invalid @enderror" value="15/08/1994" id="patientBirthdate" placeholder="Enter Birthdate Ex.13/10/2021" wire:model="birthdate">
        @error('birthdate') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
    </div>
</form>