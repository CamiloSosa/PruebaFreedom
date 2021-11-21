<div class="row mt-5">
    <div class="col-md-7 mx-auto">
        <form action="{{ $action }}" method="{{ $method }}">
            @csrf
            <div class="row mb-3">
                <label for="" class="control-label">Type the max quantity of animals</label>
                <input type="numeric" class="form-control" value="{{ $corral->max_quantity }}" name="max_quantity" required>
            </div>
            <button type="submit" class="btn btn-info mb-5">Send</button>
        </form>
    </div>
</div>