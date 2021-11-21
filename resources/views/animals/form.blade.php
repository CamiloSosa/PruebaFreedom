<div class="row mt-5">
    <div class="col-md-7 mx-auto">
        <form action="{{ $action }}" method="{{ $method }}">
            @csrf
            <div class="row mb-3">
                <label for="" class="control-label">Age</label>
                <input type="numeric" class="form-control" value="{{ $animal->age }}" name="age" required>
            </div>
            <div class="row mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="dangerous" id="dangerous">
                <label class="form-check-label" for="dangerous">Is dangerous?</label>
            </div>
            <div class="row mb-3">
                <label for="" class="control-label">Belongs to corral</label>
                <select name="corral_id" id="" class="form-control" required>
                    <option value="">Select a corral</option>
                    @foreach($corrals as $corral)
                        <option value="{{ $corral->id }}"> Corral: {{ $corral->id }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-info mb-5">Send</button>
        </form>
    </div>
</div>