<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            <h4 class="text-gray">Import Categories</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('import-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import</button>
            </form>
        </div>
    </div>
</div>