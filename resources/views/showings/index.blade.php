<x-app-layout>

<style>
.cancelshowing {
  background: #F2727F !important;
}
.confirm_cancel_reschedule .modal-header {
    border-radius: 21px 21px 0 0;
    background-color: #ddd;
    display: block;
    padding: 2em 0 3.2em 0;
}

.confirm_cancel_reschedule .modal-dialog .modal-content {
    border: unset;
    border-radius: 17px;
    background-color: unset;
    width: 100%;
    margin: 0 auto;
}

.confirm_cancel_reschedule .modal-body {
    background: #DEE7F2;
    border-radius: 20px;
    margin: -21px 0 0 0;
}

.confirm_cancel_reschedule .modal-header .close {
    margin: 0;
    padding: 0;
    position: absolute;
    right: 14px;
    color: #63829E;
    opacity: 1;
    font-weight: 200;
    font-size: 23px;
    text-shadow: unset;
    background-color: unset;
    float: none;
    top: 5px;
}

.confirm_cancel_reschedule .modal-header h4 img{
    height: 22px;
    vertical-align: middle;
    margin: -4px 3px 0 0;
}

.confirm_cancel_reschedule .modal-header p{
    width: 64%;
    margin: 0 auto;
    line-height: 19px;
    font-size: 14px;
    text-align: center;
    font-weight: 400;
}

.confirm_cancel_reschedule .modal-header h4 {
    color: #877226;
}

.confirm_cancel_reschedule .modal-header h4 {
    font-family: 'Helvetica';
    font-weight: 700;
    font-size: 24px;
    line-height: 28px;
    text-align: center;
    text-transform: capitalize;
    margin: 0 0px 25px 0px;
}

.confirm_cancel_reschedule{
    background: none;
    border-radius: 14px;
    padding: 1.5em 0;
}

.confirm_cancel_reschedule .okbtn_div .btn.btnok {
    background: #F1D15B;
    color: #877226;
}

</style>
<div class="content-wrapper content-wrapper--with-bg">
<div class="container-fluid">
<div class="row">
<div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 col-12 show_tablfull">
<div class="search showing_search mobile_showshowings">
<div class="form-search mobileview_searchshowings">
<div class="input-group mb-2">
<input type="text" class="form-control" placeholder="Search">
<div class="input-group-append">
<button type="submit" class="btn searchbtn" data-toggle="modal" data-target="#filter_map">
  <i class="fa fa-search"></i>
</button>
<a href="mapview_showings.html" class="btn btnmap">Map View <img src="{{ URL::asset('admin') }}/images/showings/map_pin.svg"></a>
</div>
</div>
</div>
</div>


<div class="backg_colr_showings">
  <!-- pending offers -->
<div class="mobviewbgcolrpending">
<div class="flex_showingsdiv">
<div class="showing_imgdiv imgpend_div">
<img src="{{ URL::asset('admin') }}/images/showings/pending_offer.svg">
<p class="count_num">
  <span>{{ str_pad(count($offers), 2, '0', STR_PAD_LEFT) }}</span></p> 
</div>
<div class="showing_imgdiv">
<span>Pending offers</span>
</div>
</div>

<div class="showingssec_infodiv pendingslider slider">

@if (!empty($offers))

 
 @foreach ($offers as $offer)

 
<section class="showingssec">
<div class="row align_item_center">
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-5 infopad imgpad">
<div class="showimgpend">
<img src="{{ URL::asset('admin') }}/images/myinfo/showimg1.svg">
</div>
</div>

<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-7 infopad">
<div class="showtime">
<div class="timelabel">
<span><img src="{{ URL::asset('admin') }}/images/clock.svg">amount </span>
</div>
<div class="timeinfo">
<span>${{ $offer->price }}</span>
</div>
</div>

<div class="showdate">
<div class="datelabel">
<span><img src="{{ URL::asset('admin') }}/images/cal.svg">closing</span>
</div>
<div class="dateinfo">
<span>{{ date("d/m/Y", strtotime($offer->closing_date)) }}</span>
</div>
</div>

<div class="showdate">
<div class="datelabel">
<span><img src="{{ URL::asset('admin') }}/images/cal.svg">expires </span>
</div>
<div class="dateinfo">
<span>{{ date("d/m/Y", strtotime($offer->expire_date)) }}</span>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 infopad">
<div class="button_myinfos pendingshowsbtn">
<button class="btn reschedulebtn">send reminder <img src="{{ URL::asset('admin') }}/images/showings/send_remindicon.svg"></button>
<button class="btn confirmbtn"> view offer <img src="{{ URL::asset('admin') }}/images/showings/view_offericon.svg"> </button>
</div>
</div>
</div>

<div class="bottomdiv_info showingsbottom">
<div class="row centerdivinfo">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
<div class="showing_details">
<p>{{ $offer->location }}</p>
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 infopad">
<div class="showingdetails_option">
<ul>
<li>
<div class="beddetails">
<img src="{{ URL::asset('admin') }}/images/myinfo/bed.svg">
<p class="bedcount">{{ $offer->bedrooms }}</p>
</div>
</li>
<li>
<div class="showerdetails">
<img src="{{ URL::asset('admin') }}/images/myinfo/shower.svg" class="shwimg">
<p class="showercount">{{ $offer->bathrooms }}</p>
</div>
</li>
<li>
<div class="cardetails">
<img src="{{ URL::asset('admin') }}/images/myinfo/car.svg">
<p class="carcount">{{ $offer->parkings }}</p>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
</section>
  
 @endforeach
 
  
@endif




</div>
</div>
  <!-- pending offers end-->

  <!-- schedule showings -->
<div class="movviewbgcolrscheduleoffr">
<div class="flex_showingsdiv scheshow_flex">
  <div class="showing_imgdiv imgschedul_div">
    <img src="{{ URL::asset('admin') }}/images/showings/scheduleimg.svg">
    <p class="count_num">
    <span>{{ str_pad(count($showings), 2, '0', STR_PAD_LEFT) }}</span></p> 
    <div class="showing_imgdiv">
      <span>showings</span>
    </div>
  </div>
  <div class="filterlist">
    <button class="filter_click"><img src="{{ URL::asset('admin') }}/images/showings/filter_icon.svg"></button>
  </div>
  <div class="clickonfilterbtn">
    <div class="bacgr_imagefiltershow">
      <button type="button" class="btn btnallshow">All</button>
      <button type="button" class="btn btnconfrshow">Confirmed</button>
    </div>
  </div>
  <img src="{{ URL::asset('admin') }}/images/showings/cross_icon.svg" class="clcross_icon">
  </div>
  

<div class="showingssec_infodiv scheduleslider slider mobileviewschedule_slider">


@if (!empty($showings))

 
 @foreach ($showings as $showing)

   
   @if ($showing->showing_status == 'scheduled')


     
<section class="showingssec">
<!-- reschedule yellow -->
<div class="showing_confirmed reschedule_divyellow">
  <div class="button_myinfos sched_reschedule">
    <div>
    <button class="btn reschedulebtncard resch_clk" type="button" tabindex="0">
    Showing Schedule <i class="fa fa-angle-down" aria-hidden="true"></i>
    </button>
    </div>
    </div>
    
      </div>
      <!-- reschedule yellow end -->
    <div class="row align_item_center">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-5 infopad imgpad">
    <div class="showimgpend">
    <img src="{{ URL::asset('admin') }}/images/myinfo/showimg1.svg">
    </div>
    </div>
    
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-7">
      <div class="showtime">
      <div class="timelabel">
      <span><img src="{{ URL::asset('admin') }}/images/clock.svg">showing time</span>
      </div>
      <div class="timeinfo">
      <span>{{ date("H:i A", strtotime($showing->showing_time)) }}</span>
      </div>
      </div>
      
      <div class="showdate">
      <div class="datelabel">
      <span><img src="{{ URL::asset('admin') }}/images/cal.svg">showing date</span>
      </div>
      <div class="dateinfo">
      <span>{{ date("d/m/Y", strtotime($showing->showing_date)) }}</span>
      </div>
      </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="order_links">
      <span><a href="javascript:void(0);"><img src="{{ URL::asset('admin') }}/images/showings/getdir.svg">get direction</a></span>
      <span><a href="javascript:void(0);"><img src="{{ URL::asset('admin') }}/images/myinfo/uber.svg">Order Uber </a></span>
      <span><a href="javascript:void(0);"><img src="{{ URL::asset('admin') }}/images/myinfo/lyft.svg">Order Lyft</a></span>
      </div>
      </div>
      </div>
    <div class="bottomdiv_info showingsbottom">
    <div class="row centerdivinfo">
    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-6">
    <div class="showing_details">
    <p>{{ $showing->unit->name }} {{ $showing->unit->location }}</p>
    </div>
    </div>
    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-6 infopad">
    <div class="showing_viewdetails">
    <button class="btn view_detail">View details <i class="fa fa-angle-right" aria-hidden="true"></i></button>
    </div>
    </div>
    </div>
    </div>

    <div class="reschedule_divp">
    <p onclick="showCancelReSchedulePopUp({{ $showing->id }})">Reschedule showing </p>
  </div>

    </section>
    
    @elseif ($showing->showing_status == 'rescheduled')

    
<section class="showingssec" data-target="group-showingtwo">
 <!-- showing confirm yellow -->
  <div class="showing_confirmed confirmshow_divyellow">
    <div class="confrm_div">
      <span class="span_start">auto cancels:</span>
      <span id="timer-{{ $showing->id }}"></span>
    </div>
    <div class="confrm_div">
      <p>Confirm showing </p>
    </div>
    <div class="confrm_div">
      <img src="{{ URL::asset('admin/images/showings/confirm_yellow.svg') }}">
    </div>
  </div>
  <!-- showing confirm yellow end -->

<div class="row align_item_center">
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-5 infopad imgpad">
<div class="showimgpend">
<img src="{{ URL::asset('admin/images/myinfo/showimg1.svg') }}">
</div>
</div>

<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-7">
  <div class="showtime">
  <div class="timelabel">
  <span><img src="{{ URL::asset('admin/images/clock.svg') }}">showing time</span>
  </div>
  <div class="timeinfo">
  <span>{{ date("H:i A", strtotime($showing->showing_time)) }}</span>
  </div>
  </div>
  
  <div class="showdate">
  <div class="datelabel">
  <span><img src="{{ URL::asset('admin/images/cal.svg') }}">showing date</span>
  </div>
  <div class="dateinfo">
  <span>{{ date("d/m/Y", strtotime($showing->showing_date)) }}</span>
  </div>
  </div>

    <!-- confirm yellow div -->
  <div class="button_myinfos yellowdivbtn">
    <div>
      <button class="btn confirmbtn" onclick="showConfirmShowingPOPUP({{ $showing->id }})">Confirm </button>
    <button class="btn reschedulebtn resch_clk" type="button"  onclick="showCancelReSchedulePopUp({{ $showing->id }})">
    Reschedule <i class="fa fa-angle-down" aria-hidden="true"></i>
    </button>
    </div>
  </div>
 </div>
</div>
<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <div class="order_links">
  <span><a href="javascript:void(0);"><img src="{{ URL::asset('admin/images/showings/getdir.svg') }}">get direction</a></span>
  <span><a href="javascript:void(0);"><img src="{{ URL::asset('admin/images/myinfo/uber.svg') }}">Order Uber </a></span>
  <span><a href="javascript:void(0);"><img src="{{ URL::asset('admin/images/myinfo/lyft.svg') }}">Order Lyft</a></span>
  </div>
  </div>
  </div>
<div class="bottomdiv_info showingsbottom">
<div class="row centerdivinfo">
<div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-6">
<div class="showing_details">
<p>{{ $showing->unit->name }} {{ $showing->unit->location }} </p>
</div>
</div>
<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-6 infopad">
<div class="showing_viewdetails">
<button class="btn view_detail">View details <i class="fa fa-angle-right" aria-hidden="true"></i></button>
</div>
</div>
</div>
</div>
</section>
    

@elseif ($showing->showing_status == 'confirmed')


  <!-- showing confirm block desktop******************************** -->
  <section class="showingssec showingconfirm_div">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="showingconfr_heading">
            <img src="{{ URL::asset('admin/images/showings/confirmshow.svg') }}">
            <p>showing Confirmed </p>
          </div>
      </div>
    </div>
    
  <div class="progressbar showconfirmprog">
      <div class="progressbar-inner innerprogshow">
      </div>
  </div>
    <div class="showingconfr_bodydesign">
    <div class="row colrtwo_showing">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-5 firstimgblk_clr">
    <div class="shw_divbody">
      <img src="{{ URL::asset('admin/images/showings/shw_confr.svg') }}">
    </div>
    </div>
    <div class="col-xl-8 col-lg-8 co-md-8 col-sm-8 col-7 firstimgblk_clr">
      <div class="showtime">
        <div class="timelabel">
        <span><img src="{{ URL::asset('admin/images/clock.svg') }}">{{ date("H:i A", strtotime($showing->showing_time)) }} </span>
        </div>
        <div class="datelabel">
          <span><img src="{{ URL::asset('admin/images/cal.svg') }}">{{ date("d/m/Y", strtotime($showing->showing_date)) }}</span>
          </div>
        </div>
    
        <div class="addrdescrp_show">
          <p>{{ $showing->unit->name }} {{ $showing->unit->location }}</p>
        </div>
    </div>
    </div>
    </div>
    </section>
      <!-- showing confirm block end ******************************** -->

      @elseif ($showing->showing_status == 'cancelled')

      
     
<section class="showingssec">
<!-- reschedule yellow -->
<div class="showing_confirmed reschedule_divyellow cancelshowing">
  <div class="button_myinfos sched_reschedule">
    <div>
    <button class="btn reschedulebtncard resch_clk" type="button" tabindex="0">
    Showing Cancel <i class="fa fa-angle-down" aria-hidden="true"></i>
    </button>
    </div>
    </div>
    
      </div>
      <!-- reschedule yellow end -->
    <div class="row align_item_center">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-5 infopad imgpad">
    <div class="showimgpend">
    <img src="{{ URL::asset('admin') }}/images/myinfo/showimg1.svg">
    </div>
    </div>
    
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-7">
      <div class="showtime">
      <div class="timelabel">
      <span><img src="{{ URL::asset('admin') }}/images/clock.svg">showing time</span>
      </div>
      <div class="timeinfo">
      <span>{{ date("H:i A", strtotime($showing->showing_time)) }}</span>
      </div>
      </div>
      
      <div class="showdate">
      <div class="datelabel">
      <span><img src="{{ URL::asset('admin') }}/images/cal.svg">showing date</span>
      </div>
      <div class="dateinfo">
      <span>{{ date("d/m/Y", strtotime($showing->showing_date)) }}</span>
      </div>
      </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="order_links">
      <span><a href="javascript:void(0);"><img src="{{ URL::asset('admin') }}/images/showings/getdir.svg">get direction</a></span>
      <span><a href="javascript:void(0);"><img src="{{ URL::asset('admin') }}/images/myinfo/uber.svg">Order Uber </a></span>
      <span><a href="javascript:void(0);"><img src="{{ URL::asset('admin') }}/images/myinfo/lyft.svg">Order Lyft</a></span>
      </div>
      </div>
      </div>
    <div class="bottomdiv_info showingsbottom">
    <div class="row centerdivinfo">
    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-6">
    <div class="showing_details">
    <p>{{ $showing->unit->name }} {{ $showing->unit->location }}</p>
    </div>
    </div>
    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-6 infopad">
    <div class="showing_viewdetails">
    <button class="btn view_detail">View details <i class="fa fa-angle-right" aria-hidden="true"></i></button>
    </div>
    </div>
    </div>
    </div>

    <div class="reschedule_divp">
    <p onclick="showCancelReSchedulePopUp({{ $showing->id }})">Reschedule showing </p>
  </div>

    </section>





    @else
   
    
   @endif

   
   

 
    
 @endforeach
 
    
@endif




</div>
  <!-- schedule showings end -->

</div>

</div>
</div>



<div class="col-xl-8 col-lg-7 col-md-7 col-sm-12 col-12 show_tablfull">
<div class="google-map showingsmap">
  <div class="map" id="map wpsl-gmap">
    <div class="marker" data-lat="25.1882843" data-lng="55.2716891"></div>
</div> 
<div id="map"></div>

<div class="form-search showmapgoogle">
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Search">
<div class="input-group-append">
<button type="submit" class="btn_sub"><i class="fa fa-search"></i></button>
<button type="submit" class="btn btnlist_view">List View <img src="{{ URL::asset('admin') }}/images/showings/listview.svg"></button>
</div>
</div>

<div class="button_map">
<form>
<button class="btn pendoffers" name="offers_map" value="offers"><img src="{{ URL::asset('admin') }}/images/showings/pend_offersround.svg"> Offers</button>
<button class="btn schedshow" name="offers_map" value="showings"><img src="{{ URL::asset('admin') }}/images/showings/scheduleoff_round.svg"> Showings</button>
<button class="filterbtnshow mapshow" type="button"><img src="{{ URL::asset('admin') }}/images/showings/filter_showings.svg"></button>

</form>
    
  <div class="clickonfilterbtn clkfilmap">
    <div class="bacgr_imagefiltershow">
      <button type="button" class="btn btnallshow">All</button>
      <button type="button" class="btn btnconfrshow calview_click">Calender View</button>
    </div>
  </div>
  <img src="{{ URL::asset('admin') }}/images/showings/cross_icon.svg" class="clcross_icon mapcross">
</div>
</div>
<!-- search end -->

<!-- upcoming events -->
 <div class="relv_divevents">
<div class="calenderview_div">
  <div class="calendercard_show">
    <div class="headingcalen">
      <h3><img src="{{ URL::asset('admin') }}/images/showings/date_icon.svg"> upcoming events</h3> 
    </div>
        <div class="upcoming_eventsdiv">
          <ul class="nav nav-tabs upcom_events">
            <li class="nav-item">
              <a class="nav-link  calvw" data-toggle="tab" href="#calender_detailview">Calendar View</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active listvw" data-toggle="tab" href="#listview_calender">List View </a>
            </li>
          </ul>
        </div>
        <div class="crossic_cal">
          <a href="javascript:void(0);"><img src="{{ URL::asset('admin') }}/images/showings/cross_iconshowingcal.svg"></a>
        </div>

  </div>

<div class="tab-content">
  <div class="filtercalen">
    <a href="javascript:void(0);" class="btnfilter_calender">Filter <img src="{{ URL::asset('admin') }}/images/showings/filter_listview.svg"></a>

    <div class="clickonfilterbtn calenderview_filter">
      <div class="bacgr_imagefiltershow">
        <button type="button" class="btn">new to old</button>
        <button type="button" class="btn">old to new</button>
      </div>
    </div>
    <img src="{{ URL::asset('admin') }}/images/showings/cross_icon.svg" class="clcross_icon calcross_icon">

  </div>
  
<div class="listview_show tab-pane container active" id="listview_calender">


@if (!empty($events))

 
 @foreach ($events as $event)
 
  <div class="listview">
    <div class="row listrow">
      <div class="col-xl-2 col-lg-2 padimgzeroleft">
        <div class="imgleft_listtab">
          <img src="{{ URL::asset('admin') }}/images/myinfo/showimg1.svg">
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 descrip_pad">
        <div class="descriplist_tabdiv">
          <p>{{ $event->location }}</p>
          <a href="">View details</a>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 descrip_pad">
        <div class="timings_datalist">
          <div class="listtab_time">
                <p>{{ date("H:i A", strtotime($event->start_time)) }}</p>
          </div>
          <div class="listtab_txt">
                <p>To</p>   
          </div>
          <div class="listtab_time">
                <p>{{ date("H:i A", strtotime($event->end_time)) }} </p>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-lg-2 descrip_pad">
        <div class="listdate_show">
          <p>
            <img src="{{ URL::asset('admin') }}/images/cal.svg"> <span>{{ date("d/m/Y", strtotime($event->event_date)) }}</span>
          </p>
        </div>
      </div>
    </div>
  </div>
  
 @endforeach
 
  
@endif






</div>
</div>
</div>
</div>
<!-- upcoming events end -->



</div>
</div>
</div>
</div>
</div>


@foreach ($showings as $showing)


<script>
        const showTime{{ $showing->id }} = new Date("{{ $showing->showing_date }} {{ $showing->showing_time }}").getTime();
        setInterval(() => {
            const now = new Date().getTime();
            const dist = showTime{{ $showing->id }} - now;
            const timer = document.getElementById('timer-{{ $showing->id }}');
            if (dist <= 0) {
                timer.innerText = 'Expired';
                return;
            }
            const hrs = Math.floor(dist / (1000 * 60 * 60));
            const mins = Math.floor((dist % (1000 * 60 * 60)) / (1000 * 60));
            timer.innerText = `${hrs}h ${mins}m`;
        }, 1000);
    </script>
    
  
@endforeach



@section('pagescript')


<script>
  var markers = {!! $off_array !!};

  
    var geocoder = new google.maps.Geocoder();
    var map = null;
    var latitude = '';
    var longitude = '';
    var infowindows = [];
    var lastOpenedInfoWindow ='';
    var bounds = new google.maps.LatLngBounds();
    jQuery(document).ready(function (){
        jQuery('.map').each(function(){
                map = new_map( jQuery(this) );
        });
    });
    function new_map( $el ) {
	var $markers = $el.find('.marker');
	var args = {
                mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map( $el[0], args);
	map.markers = [];
        add_marker( markers , map );
            center_map( map );
	return map;
    }
    function add_marker( $marker, map ) {
        var marker = '';
        var i ;
        jQuery.each($marker, function( index, value ) {
                geocoder.geocode(    { 'address': value.address}, function(results, status) {
                longitude   = value.lng;
                latitude    = value.lat;
                marker = new google.maps.Marker({
                    center: new google.maps.LatLng(latitude, longitude),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    position: new google.maps.LatLng(latitude, longitude),
                    map: map,
                    //icon: {url: value.iconURL, width: 35, height: 35},
                });
                  
                map.setCenter(marker.getPosition());
                bounds.extend(marker.getPosition());
                
                if( value.description )
                {
                        infowindows.push(new google.maps.InfoWindow({content: value.description}));
                        var infowindow =  new google.maps.InfoWindow({content: value.description});
                        google.maps.event.addListener(marker, 'click', (function(marker, content , infowindow) {
                            return function() {
                                closeLastOpenedInfoWindow();
                                infowindow.setContent(content);
                                infowindow.open(map, marker);
                                lastOpenedInfoWindow = infowindow;
                            };
                })(marker, value.description , infowindow));
                    center_map( map );
            }
  
            
            function closeLastOpenedInfoWindow() {
                if (lastOpenedInfoWindow) {
                    lastOpenedInfoWindow.close();
                }
            }
            });
        });
      
    }
    function center_map( map ) {
        if( map.markers.length == 1 ){
            map.setCenter( bounds.getCenter() );
        }else{
            console.log( bounds );
            map.fitBounds( bounds );
        }
    }
</script>
  
@endsection

</x-app-layout>
