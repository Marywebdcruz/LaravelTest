<div class="row justify-content-center mt-3">
    <form>
        <div class="form-group mb-3">
            <label for="patientName">Date:</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="patientName" placeholder="Enter Name" wire:model="date">
            <input type="hidden" placeholder="Enter Name" name="patient_id" value="{{$this->id}}">
            @error('date') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group mb-3">
            <label for="sbp">SBP:</label>
            <input type="text" class="form-control @error('sbp') is-invalid @enderror" id="sbp" placeholder="Enter SBP" wire:model="sbp">
            @error('sbp') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group mb-3">
            <label for="patientBirthdate">DBP:</label>
            <input type="text" class="form-control @error('dbp') is-invalid @enderror" value="15/08/1994" id="patientBirthdate" placeholder="Enter DBP" wire:model="dbp">
            @error('dbp') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group mb-3">
            <label for="BPM">BPM:</label>
            <input type="text" class="form-control @error('bpm') is-invalid @enderror" id="BPM" placeholder="Enter BPM" wire:model="bpm">
            @error('bpm') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="d-grid gap-2">
            <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
        </div>
    </form>
</div>