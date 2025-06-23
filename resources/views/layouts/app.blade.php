<!DOCTYPE html>
<html lang="en">
<head>
<title>Showings</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<!-- font awesome 4 -->
<link rel="stylesheet" href="font-awesome.css">
<!--  slick slider css -->
<link rel="stylesheet" href="{{ URL::asset('admin') }}/css/slick-theme.min.css">
<link rel="stylesheet" href="{{ URL::asset('admin') }}/css/slick.css">
    <!-- datepicker styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="{{ URL::asset('admin') }}/css/jquery-clockpicker.min.css">
<link rel="stylesheet" href="{{ URL::asset('admin') }}/css/style.css">

<link rel="stylesheet" href="{{ URL::asset('admin') }}/css/responsive.css">

<!-- Scripts -->
       
        <!-- Styles -->
        @livewireStyles

        
</head>
<body>

  @livewire('navigation-menu')
 <main class="l-main">

 {{ $slot }}

</main>

<!-- mobileview menu -->
 <div class="downarrow">
  <a href="javascript:void(0);"><img src="{{ URL::asset('admin') }}/images/new_arrow.svg"></a>
 </div>

<div class="container-fluid btmmenu">
  <div class="flex_menubottom">
  <div class="dash">
  <a href="">
  <img src="{{ URL::asset('admin') }}/images/dashboard.svg">
  <p>Dashboard</p>
  </a> 
  </div>
  <div class="commu">
  <a href="">
  <img src="{{ URL::asset('admin') }}/images/communication.svg">
  <p>Communication</p>
  </a>
  </div>
  <div class="maint">
  <a href="">
  <img src="{{ URL::asset('admin') }}/images/maintenance.svg">
  <p>Maintenance</p>
  </a>
  </div>
  <div class="rent">
  <a href="">
  <img src="{{ URL::asset('admin') }}/images/rentals.svg">
  <p>Rentals</p>
  </a>
  </div>
  </div>
  </div>







@include('showings.popup')



<div class="modal fade filtermap_modal" id="filter_map">
<div class="modal-dialog">
<div class="modal-content">

<!-- Modal Header -->

<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="modal-header modl_head">
<div class="titlemodal">
<h4 class="modal-title">filter by</h4>
</div>
<div class="button_search">
<button type="button" class="btn">Save Search</button>
</div>
</div>

<!-- Modal footer -->
<div class="modal-footer">
<button type="button" class="btn btn-date">date & time</button>
<button type="button" class="btn btn-location">location</button>
</div>

</div>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ URL::asset('admin') }}/js/jquery-clockpicker.min.js"></script>
<!--  slick js -->
<script src="{{ URL::asset('admin') }}/js/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ URL::asset('admin') }}/js/main.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDJnrEcWfE4re1fHfa_hPM_Lla9bGF7A3Y"></script>
<script>
  // datepicker
$(document).ready(function(){
$('.datepickershowing').datepicker({
language: "es",
autoclose: true,
format: "dd/mm/yyyy"
});
});
</script>

<script>
  $(".input_reschedule.showingstime input[name=time1],.input_reschedule.showingstime input[name=time2],.input_reschedule.showingstime input[name=time3]").clockpicker({       
  placement: 'bottom',
  align: 'left',
  autoclose: true,
  default: 'now',
  donetext: "Select",
  init: function() { 
  console.log("colorpicker initiated");
  },
  beforeShow: function() {
  console.log("before show");
  },
  afterShow: function() {
  console.log("after show");
  },
  beforeHide: function() {
  console.log("before hide");
  },
  afterHide: function() {
  console.log("after hide");
  },
  beforeHourSelect: function() {
  console.log("before hour selected");
  },
  afterHourSelect: function() {
  console.log("after hour selected");
  },
  beforeDone: function() {
  console.log("before done");
  },
  afterDone: function() {
  console.log("after done");
  }
  });
  
  </script>

@yield('pagescript')

<script>
function showCancelReSchedulePopUp(id) {
      $("a#cancel_showing").attr("href", "{{ route('showing.cancel') }}?showing_id=" + id);
      $("#confirm_cancel_reschedulepopup").modal('show');
      $("#showing_id").val(id);
      
}

</script>

<script>
$(document).on('click', '#confirm_reschedule_showing', function(){

  var showing_id = $("#showing_id").val();
  if(showing_id) {
    $.ajax({
      url: "{{ route('showing.ajaxGet') }}",
      data: {
        'showing_id' : showing_id,
        '_token': "{{ csrf_token() }}",
      },
      dataType: 'JSON',
      type: 'GET',
      beforeSend: function() {

      },
      complete: function() {

      },
      success: function(rel) {
        //console.log(rel);

        var showing_time = $("#showing_time").val();
        var showing_date = $("#showing_date").val();
        $("#show_showing_time").text(showing_time);
        $("#show_showing_date").text(showing_date);        


        $("#save_unit_id").val(rel.unit_id);
        $("#save_showing_id").val(rel.showing_id);
        $("#unit_location").html(rel.unit + rel.unit_location);
        $("#save_showing_date").val(showing_date);
        $("#save_showing_time").val(showing_time);

        $("#confirm_cancel_reschedulepopup").hide();
        $("#confirm_reschedulepopup").modal('show');


      },
      error: function() {
        alert('Error in sending data');
      }
    });
  }

  


})

</script>

<script>
function showConfirmShowingPOPUP(showing_id) {

  if(showing_id) {
    $.ajax({
      url: "{{ route('showing.ajaxGet') }}",
      data: {
        'showing_id' : showing_id,
        '_token': "{{ csrf_token() }}",
      },
      dataType: 'JSON',
      type: 'GET',
      beforeSend: function() {

      },
      complete: function() {

      },
      success: function(rel) {

        
        $("#show_confirm_showing_time").text(rel.showing_time);
        $("#show_confirm_showing_date").text(rel.showing_date);        




        $("#confirm_save_unit_id").val(rel.unit_id);
        $("#confirm_save_showing_id").val(rel.showing_id);
        $("#confirm_unit_location").html(rel.unit + rel.unit_location);
        $("#confirm_showingpopup").modal('show');


      },
      error: function() {
        alert('Error in sending data');
      }
    });
  }
  
}
</script>

 @stack('modals')

        @livewireScripts


</body>
</html>