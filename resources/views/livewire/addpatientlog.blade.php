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

                @include('livewire.patientlogcreate')
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
                                <th>Date</th>
                                <th>Time</th>
                                <th>SBP</th>
                                <th>DBP</th>
                                <th>BPM</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($patientlogs) > 0)
                                @foreach ($patientlogs as $patient)
                                    <tr>
                                        <td>
                                            {{$patient->date}}
                                        </td>
                                        <td>
                                            {{$patient->date}}
                                        </td>
                                        <td>
                                            {{$patient->sbp}}
                                        </td>
                                        <td>
                                            {{$patient->dbp}}
                                        </td>
                                        <td>
                                            {{$patient->bpm}}
                                        </td>
                                        <!-- <td>
                                            <button wire:click="edit({{$patient->id}})" class="btn btn-primary btn-sm">Edit</button>
                                            <button onclick="deletePatient({{$patient->id}})" class="btn btn-danger btn-sm">Delete</button>
                                        </td> -->
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No Patient log Found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <div class="card-body">
                        <div class="pt-3">
                            {{ $patientlogs->links() }}
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