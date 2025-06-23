


  <!-- reschedule_cancel first popup -->

  <div class="modal fade confirm_cancel_reschedule" id="confirm_cancel_reschedulepopup">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><img src="{{ URL::asset('admin') }}/images/showings/reschedule_bell.svg"> Tour Type</h4>
      
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="confirmrechedtime_div">
        <div class="container-fluid padcontf_css">
           
            
            <div class="row align_item_center text-center">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

               <form>
               <input type="hidden" name="showing_id" id="showing_id" value="">
              <div class="form-group">
              <label>Showing Date</lable>
               <div class="datepickershowing date input-group">
                    <input type="text" value="{{ date('d/m/Y') }}" name="showing_date" id="showing_date" class="form-control" id="fecha1" tabindex="0">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <img src="{{ URL::asset('admin/images/showings/date_icon.svg') }}">
                      </span>
                    </div>
                  </div>
              </div>

               <div class="form-group">
              <label>Showing Time</lable>
              <div class="input_reschedule showingstime">
                <select class="form-control" name="showing_time" id="showing_time">
                <option value="" selected disabled>Select Timeslot</option>
                @php
                  $start_time = "00.00";
                  $end_time = "24.00";
                  
                  $tStart = strtotime($start_time);
                  $tEnd = strtotime($end_time);
                  $tNow = $tStart;

                  while($tNow <= $tEnd) {
                    echo '<option value="'.date("H:i A",$tNow).'">'.date("H:i A",$tNow).'</option>';
                    $tNow = strtotime('+20 minutes',$tNow);


                  }

                
                @endphp
                </select>
              </div>
              </div>

               <div class="">
              <a href="" id="cancel_showing" class="btn canc_show">cancel showing</a>
              <button class="btn conf_resch" type="button" id="confirm_reschedule_showing">Confirm Reschedule </button>
            </div>

              
              </form>

            
                
              </div>
            </div>
          </div>
        </div>


        <div class="okbtn_div">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               
              </div>
            </div>
          </div>
        </div>

      </div>       
    </div>
  </div>
</div>


  <!-- / reschedule_cancel first popup -->





































<!-- confirm reschedule pop up -->
<div class="modal fade confirmreschedule" id="confirm_reschedulepopup">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><img src="{{ URL::asset('admin') }}/images/showings/reschedule_bell.svg"> Reschedule</h4>
       <p>Please review and confirm the time and date of the showing before proceeding.</p>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="confirmrechedtime_div">
        <div class="container-fluid padcontf_css">
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <p class="alignp_confr"><img src="{{ URL::asset('admin') }}/images/showings/confirmtime.svg"> <span id="show_showing_time"></span></p>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <p class="alignp_confrl"><img src="{{ URL::asset('admin') }}/images/showings/confirmdate.svg"> <span id="show_showing_date"></span></p>
              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="flx_addrimg">
                  <div class="lefimg_icon">
                    <img src="{{ URL::asset('admin') }}/images/showings/house_ic.svg">
                  </div>
                 <div class="addrstxt_div">
                  <p id="unit_location"></p>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="okbtn_div">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <form method="POST" action="{{ route('showing.update') }}">
              @csrf
              <input type="hidden" name="showing_status" value="rescheduled">
              <input type="hidden" name="unit_id" id="save_unit_id" value="">
              <input type="hidden" name="showing_id" id="save_showing_id" value="">
              <input type="hidden" name="showing_date" id="save_showing_date" value="">
              <input type="hidden" name="showing_time" id="save_showing_time" value="">

              <button type="submit" class="btn btnok">Ok</button>
              </form>
                
              </div>
            </div>
          </div>
        </div>

      </div>       
    </div>
  </div>
</div>
<!-- confirm reschedule pop up end -->



<!-- confirm showings pop up -->
  <div class="modal fade confirmpopupdiv" id="confirm_showingpopup">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><img src="{{ URL::asset('admin/images/showings/bell_confirmshow.svg')}}"> Confirm Showing</h4>
         <p>Please review and confirm the time and date of the showing before proceeding.</p>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="confirmtime_div">
          <div class="container-fluid padcontf_css">
              <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                  <p class="alignp_confr"><img src="{{ URL::asset('admin/images/showings/confirmtime.svg')}}"> <span id="show_confirm_showing_time"></span></p>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                  <p class="alignp_confrl"><img src="{{ URL::asset('admin/images/showings/confirmdate.svg') }}"> <span id="show_confirm_showing_date"></span></p>
                </div>
              </div>
              <hr/>
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="flx_addrimg">
                    <div class="lefimg_icon">
                      <img src="{{ URL::asset('admin/images/showings/house_ic.svg') }}">
                    </div>
                   <div class="addrstxt_div">
                     <p id="confirm_unit_location"></p>
                   </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="okbtn_div">
            <div class="container-fluid">
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <form method="POST" action="{{ route('showing.update') }}">
                    @csrf
                    <input type="hidden" name="showing_status" value="confirmed">
                    <input type="hidden" name="unit_id" id="confirm_save_unit_id" value="">
                    <input type="hidden" name="showing_id" id="confirm_save_showing_id" value="">
                   

                    <button type="submit" class="btn btnok">Ok</button>
                    </form>
                 
                </div>
              </div>
            </div>
          </div>

        </div>       
      </div>
    </div>
  </div>
<!-- confirm showings pop up end -->

