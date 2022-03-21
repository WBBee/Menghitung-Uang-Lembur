<div>
    @include('livewire.end-point.modal.overtime.modal-filter-overtime')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Stats ({{ $overtimePays['name'] }})</h4>
                    <div class="card-header-action">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-primary" wire:click="$toggle('confirmingOpenFilterOvertimeModal')" >Filter</a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item has-icon"><i class="far fa-circle"></i> Electronic</a>
                        <a href="#" class="dropdown-item has-icon"><i class="far fa-circle"></i> T-shirt</a>
                        <a href="#" class="dropdown-item has-icon"><i class="far fa-circle"></i> Hat</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">View All</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="summary">
                    <div class="summary-info">
                        <h2>Today</h4>
                        <h4>{{ Carbon\Carbon::now()->format('d M Y') }}</h4>
                        {{-- <div class="row">
                            <div class="col-lg-6">
                                <div class="text-muted">At 08:12</div>
                                <a class="btn btn-sm btn-info " href="#" data-toggle="tooltip" title="Edit Employe">
                                    <i class="fas fa-pencil-alt" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Time</span><span class="hidden-xs hidden-sm hidden-md"> Started</span>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="text-muted">At 18:35</div>
                                <a class="btn btn-sm btn-info " href="#" data-toggle="tooltip" title="Edit Employe">
                                    <i class="fas fa-pencil-alt" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Time</span><span class="hidden-xs hidden-sm hidden-md"> Ended</span>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="summary-item">
                        <h6>Item List
                            <span class="text-muted">(@php
                                echo count($overtimes);
                            @endphp Items)</span>
                        </h6>
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($overtimes as $overtime)
                            <li class="media">

                                <div class="media-body">
                                <div class="media-right">+{{ $overtime->estimate_earning }}</div>
                                <div class="media-title"><a href="#">Overtime</a></div>
                                <div class="text-muted text-small">worktime <a href="#">{{ $overtime->overtime_duration }}</a> <div class="bullet"></div> {{ \Carbon\Carbon::parse($overtime->date)->format('d M') }}</div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-hero">
                <select required wire:model="month" class="mb-1 form-select dropdown-toggle btn btn-primary">
                    <option value="01">January</option>
                    <option value="02">Febuary</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">september</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <div class="card-header">
                    <div class="card-icon">
                        <i class="far fa-question-circle"></i>
                    </div>
                        <h4>{{ $overtimePays['overtimes_duration_total']->overtime_duration_total }}</h4>
                    <div class="card-description">Total working overtime</div>
                </div>
                <div class="card-body p-0">
                    <div class="tickets-list">
                    <a href="#" class="ticket-item">
                        <div class="ticket-title">
                            <h4>Estimate Earning ({{ $overtimePays['status_name'] }})</h4>
                        </div>
                        <div class="ticket-info">
                            <div>Total overtime bonus received</div>
                        <div class="bullet"></div>
                        <div class="text-primary">+{{ $overtimePays['amount'] }}</div>
                        </div>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
