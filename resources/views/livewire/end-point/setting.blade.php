<div>
    @include('livewire.end-point.modal.modal-update-setting')

    <div class="row">
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="card-body">
                    <h4>{{ $display_key_code }}</h4>
                    <p>{{ $display_expression }}</p>
                    <a href="#" wire:click.prevent="showModalUpdateSetting()" class="card-cta">Update Setting <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
