@extends('layouts.dashboard.app')

@section('content')

    <div class="wrapper">
        <div class="main-panel">
            @component('panel.includes.navbar')@endcomponent
            <div class="content">
                <ul class="nav nav-pills nav-pills-icons " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#import" role="tab" data-toggle="tab">
                            <i class="material-icons">aspect_ratio</i>
                            Import
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#product" role="tab" data-toggle="tab">
                            <i class="material-icons">store</i>
                            Products
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#category" role="tab" data-toggle="tab">
                            <i class="material-icons">chrome_reader_mode</i>
                            Categories
                        </a>
                    </li>
                </ul>

                <div class="tab-content tab-space active">
                    <div class="tab-pane active" id="import">
                        @component('panel.import_category')@endcomponent
                        @component('panel.import_product')@endcomponent
                    </div>
                    <div class="tab-pane" id="product">product</div>
                    <div class="tab-pane" id="category">category</div>
                </div>
            </div>
        </div>
    </div>
@endsection