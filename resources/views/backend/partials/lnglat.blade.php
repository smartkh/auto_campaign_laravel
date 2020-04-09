@extends('backend.layouts.master')
@section('content')


<style type="text/css">
    #mymap {
        border:1px solid #009639;
        width: 740px;
        height: 500px;
    }
</style>


	<section id="main-content">
	    <section class="wrapper">
			<div class="row">
            <!--overview start-->
            <h3 class="page-header"><i class="fa fa-map-marker"></i> Lng and Lat Management</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('admin') }}">Dashboard</a></li>
                <li><i class="fa fa-map-marker"></i>Lng and Lat Management</li>
            </ol>
        </div>
        <div class="row">
            {{-- User Action/control --}}
            <div class="col-sm-4">
                <section class="panel">
                    <header class="panel-heading">
                        Longitude and Latitude Control
                    </header>
                    <!--tab nav start-->
                    <section class="panel">
                        <div class="panel-body">
                        <div class="tab-content">
                            {{-- create lng/lat --}}
                            <div id="create-gmaps" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="alert" style="display:none"></div>
                                    <form class="form-horizontal" method="GET" action="{{ route('lnglat') }}">
                                        @csrf

                                        	<div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                                            <label for="lat" class="col-md-4 control-label">Latitude </label>

                                            <div class="col-md-6">
                                                <input id="lat" type="text" class="form-control" name="lat"  required>

                                                @if ($errors->has('lat'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('lat') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
                                            <label for="lng" class="col-md-4 control-label">Longitude</label>

                                            <div class="col-md-6">
                                                <input id="lng" type="text" class="form-control" name="lng" value="{{ old('lng') }}" required autofocus>

                                                @if ($errors->has('lng'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('lng') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('radius') ? ' has-error' : '' }}">
                                            <label for="radius" class="col-md-4 control-label">Cicle Distance (km)</label>

                                            <div class="col-md-6">
                                                <input id="radius" type="number" class="form-control" name="radius" value="{{ old('radius') }}" required autofocus>

                                                @if ($errors->has('radius'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('radius') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary" name="form-user" id="ajaxGmaps">
                                                    Detect
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </section>
                    <!--tab nav end-->
                </section>
            </div>

             <div id="mymap" class="col-sm-8"></div>

            {{-- User table --}}
            <!-- <div class="col-sm-8 user-table-wrapper">
                <section class="panel user-defualt-table">
                    <header class="panel-heading">
                        User Table
                    </header>
                    <div class="table-responsive">
                        <table class="table table-striped table-advance table-hover" id="users-table">
                            <thead>
                                <tr>
                                    <td>
                                        <button type="submit" id="btn_delete_user" class="btn btn-danger btn-xs fa fa-trash-o"></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <input type="checkbox" value="" id="ckbCheckAll" name="user[]" />
                                    </th>
                                    <th>ID</th>
                                    <th id="display-name"><i class="icon_profile"></i> Name</th>
                                    <th id="display-email"><i class="icon_mail_alt"></i> Email</th>
                                    <th id="display-created_at"><i class="icon_calendar"></i> Created At</th>
                                    <th id="display-updated_at"><i class="icon_calendar"></i> Updated At</th>
                                    <th id="display-updated_at"><i class="icon_calendar"></i> Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </section>
            </div> -->
        </div>
		</section>
	</section>
@endsection
@push('scripts')
<script>

	var lat = <?php echo $latitude ; ?>;
    var lng = <?php echo $longitude; ?>;
    var circle_distance_km =  <?php echo $radius * 1000; ?>;

	var locations = <?php print_r(json_encode($locations_in_radius)) ?>;

	var map = new GMaps({
	    el: '#mymap',
	    lat: lat ? lat : 12.0386447,
	    lng: lng ? lng : 104.5711388,
	    zoom: locations ? 10 : 7,
	    click: function(e) {
			// event click on map 
		}
    });

	if(locations!=null){
		// draw circle
		map.drawCircle({
		  lat: lat,
		  lng: lng,
		  radius: circle_distance_km,
		  fillColor: 'cyan',
		  fillOpacity: 0.3,
		  strokeWeight: 0,
		  infoWindow: {
		    content: '<h1>5km</h1>'
		  }
		});
		// list all lng/lat marker that detected 
		$.each( locations, function( index, value ){
		    map.addMarker({
		      lat: value.lat,
		      lng: value.lng,
		      title: value.bts,
		      infoWindow: {
				 content: '<p><strong>BTS: </strong>' + value.bts +
				 		  '</p><p><strong>Name: </strong>'+ value.name + 
				 		  '</p><p><strong>Latitude: </strong>'+ value.lat +
				 		  '</p><p><strong>Longitude: </strong>'+ value.lng + '</p>'
			  }
		    });
		});     
	}


</script>

@endpush
