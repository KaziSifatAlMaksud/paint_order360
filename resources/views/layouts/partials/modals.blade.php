<div class="modal" id="plannerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Planner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal('plannerModal')">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('operations_manager.planner.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="planner_start_date" name="start_datetime">
                    <input type="hidden" id="edit_planner_id" name="planner_id" value="">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Category</label>
                                <br />
                                <select class="form-control" name="category_id" id="planner_category_id" required>
                                    <option value="">-- Select Below --</option>
                                    @if(isset($categories) && !empty($categories))
                                        @foreach($categories as $K => $V)
                                            <option value="{{ $V->id }}">{{ $V->category_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Title</label>
                                <br />
                                <input type="text" id="planner_title" class="form-control" name="title" required>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn primary-button-custom"><i class="fa-solid fa-plus"></i> Add</button>
                        <button type="button" class="btn btn-secondary" onclick="closeModal('plannerModal')">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="mileageTrackerModal" tabindex="-1" role="dialog" aria-labelledby="mileageTrackerModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Mileage</h4>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal('mileageTrackerModal')">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="add_mileage_tracker_form" action="{{ route('operations_manager.mileage_tracker.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="edit_mileage_tracker_id" name="mileage_tracker_id" value="">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="date" id="mileage_date" class="form-control" name="date" placeholder="Date" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="mileage_purpose" class="form-control" name="purpose" placeholder="Purpose" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" id="mileage_note" class="form-control" name="note" placeholder="Note" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 m-3">
                            <h3 style="color: #719777;background: #f8faf7b5;border-radius: 10px;">
                                Estimation
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="mileage_duration" name="duration" placeholder="Duration" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="number" class="form-control" id="mileage_distance" name="distance" placeholder="Distance" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 m-3">
                            <h3 style="color: #719777;background: #f8faf7b5;border-radius: 10px;">
                                Trip Cost
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="number" step="0.001" class="form-control" id="mileage_rate_per_mile" name="rate_per_mile" placeholder="Rate Per Mile" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="number" step="0.001" class="form-control" id="mileage_fuel" name="fuel" placeholder="Fuel">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="number" step="0.001" class="form-control" id="mileage_parking" name="parking" placeholder="Parking">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="number" step="0.001" class="form-control" id="mileage_tolls" name="tolls" placeholder="Tolls">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="number" step="0.001" class="form-control" id="mileage_other" name="other" placeholder="Other">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 m-3">
                            <h3 style="color: #719777;background: #f8faf7b5;border-radius: 10px;">
                                Settings
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="input" class="form-control" name="vehicle" id="mileage_vehicle" placeholder="Add or Choose Vehicle" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="oddo_meter" id="mileage_oddo_meter" placeholder="Oddo Meter" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="location_a" id="mileage_location_a" class="form-control">
                                    <option value="0">Select Location A</option>
                                    <option value="1">Location ABC</option>
                                    <option value="2">Location DEF</option>
                                    <option value="3">Location GHI</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="location_b" id="mileage_location_b" class="form-control">
                                    <option value="0">Select Location B</option>
                                    <option value="1">Location ABC</option>
                                    <option value="2">Location DEF</option>
                                    <option value="3">Location GHI</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 m-3">
                            <h3 style="color: #719777;background: #f8faf7b5;border-radius: 10px;">
                                Association
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="contact_id" id="mileage_contact_id" class="form-control">
                                    <option value="0">Select Contact</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="project_id" id="mileage_project_id" class="form-control">
                                    <option value="0">Select Project</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="calendar_id" id="mileage_calendar_id" class="form-control">
                                    <option value="0">Select Calendar</option>
                                    @isset($calendar_list)
                                        @foreach ($calendar_list as $calendar)
                                            <option value="{{ $calendar->id }}">{{ $calendar->name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="tags" id="mileage_tags" class="form-control">
                                    <option value="0">Select Tags</option>
                                    @isset($tags_list)
                                        @foreach ($tags_list as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn primary-button-custom"><i class="fa-solid fa-plus"></i> Add</button>
                        <button type="button" class="btn btn-secondary" onclick="closeModal('mileageTrackerModal')">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Start --}}
<!-- ADD -->

    <!-- Modal pop up start from here add by saad  -->
    <div  class="modal fade"id="smartStartModal" tabindex="-1" aria-labelledby="smartStartModalLabel"  aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pop-heading" id="smartStartModalLabel ">
                  Add Smart Start
                </h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('operations_manager.smart_start.store') }}" method="POST">
                @csrf
                <div class="modal-body modal-body-inputs">
                    <div class="col-12 mt-15">
                        <div class="input-group">
                          <input type="text" name="name" placeholder="Name" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                 <button type="submit" class="addCalender model-btn">Add</button>
                 <button type="button" class="model-btn btn-empty" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
            </form>
        </div>
      </div>  
    </div>
<!-- Edit -->
    <!-- Modal pop up start from here add by saad  -->
    <div  class="modal fade"id="editSmartStartModal" tabindex="-1" aria-labelledby="editSmartStartModalLabel"  aria-hidden="true"
    >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pop-heading" id="editSmartStartModalLabel ">
                  Edit Smart Start
                </h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <form action="{{ route('operations_manager.smart_start.store') }}" method="POST">
                @csrf
                <input type="hidden" id="edit_smart_start_id" name="smart_start_id" value="">
                <div class="modal-body modal-body-inputs">
                    <div class="col-12 mt-15">
                        <div class="input-group">
                          <input type="text" name="name" id="edit_smart_start_name" placeholder="Name" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                 <button type="submit" class="addCalender model-btn">Update</button>
                 <button type="button" class="model-btn btn-empty" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
            </form>
        </div>
      </div>  
    </div>
<!-- End -->
