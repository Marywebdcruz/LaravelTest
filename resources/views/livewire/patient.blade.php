<div>
    <div class="col-md-12 mb-2">
        <div class="card">
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif

                @if($updatePatient)
                    @include('livewire.update')
                @else
                    @include('livewire.create')
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Birthdate</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($patients) > 0)
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td>
                                            {{$patient->name}}
                                        </td>
                                        <td>
                                            {{$patient->email}}
                                        </td>
                                        <td>
                                            {{$patient->mobile}}
                                        </td>
                                        <td>
                                            {{$patient->birthdate}}
                                        </td>
                                        <td>
                                            <a wire:click="addlog({{$patient->id}})" class="btn btn-primary btn-sm">Add Log</a>
                                            <button wire:click="edit({{$patient->id}})" class="btn btn-primary btn-sm">Edit</button>
                                            <button onclick="deletePatient({{$patient->id}})" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No Patients Found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <div class="card-body">
                        <div class="pt-3">
                            {{ $patients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        function deletePatient(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deletePatient',id);
        }
    </script> -->
</div>