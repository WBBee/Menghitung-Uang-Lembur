<div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    {{-- <div class="mt-2" x-data="window.__controller.dataTableMainController()" x-init="setCallback();">
    </div> --}}
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $title }}</h4>
                    {{ $components }}
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col form-inline">
                            Per Page: &nbsp;
                            <select wire:model="perPage" class="form-select">
                                <option>10</option>
                                <option>15</option>
                                <option>25</option>
                            </select>
                        </div>

                        <div class="col">
                            {{-- <input wire:model="search" class="form-control" type="text" placeholder="Search..."> --}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-sm text-gray-600">
                                <thead>
                                    {{ $head }}
                                </thead>
                                <tbody>
                                    {{ $body }}
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="table_pagination" class="py-3">
                        {{ $model->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

