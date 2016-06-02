<!DOCTYPE html>
<html lang="en" ng-app="map" >
<head>
	<!-- Metadata -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mapping the Fossil' Collection</title>
	
	<!-- Typography -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,100' rel='stylesheet' type='text/css'>
	
	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
	
	<!-- Icons -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	
	<!-- CSS -->
	<!--
	<link rel="stylesheet" href="/assets/css/normalize.css">
	<link rel="stylesheet" href="/assets/css/skeleton.css">
	<link rel="stylesheet" href="/assets/css/skeleton-override.css">
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/responsive.css">
	-->
	<link rel="stylesheet" href="/assets/css/map.css">
	
	<!-- Google Map API -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	
	<script>
		function initialize() {
		  var mapProp = {
		    center:new google.maps.LatLng(51.508742,-0.120850),
		    zoom:5,
		    mapTypeId:google.maps.MapTypeId.ROADMAP,
		    mapTypeControl:false,
		    streetViewControl:false
		  };
		  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		}
		google.maps.event.addDomListener(window, 'load', initialize);

	</script>

</head>

<body>

	<div class="map-header">
		<img class="map-header-img" src="http://assets.manchester.ac.uk/logos/museum-1.png" alt="Hello there" height="84" width="169">
	</div>

	<!-- Header -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">

			<div class="navbar-header">
				<a class="navbar-brand" href="#">Map</a>
			</div>

			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><p class="navbar-text">Hello xxxxx</p></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><p class="navbar-text">Profil</p></li>
					<li><p class="navbar-text">Share</p></li>
					<li><p class="navbar-text">Logout</p></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Map -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="map-section">
					<div id="googleMap">
				</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Filter  & Feedback -->
	<div class="container-fluid">
		<div class="row">
			<!-- Filter -->
			<div class="col-md-6">
				<div class="filter-section">
			
					<div class="row">
						<div class="col-md-12 filter-title">
							<h4>Filter</h4>
						</div>
					</div>

					<!-- Project -->
					<div class="row filter-element">
						<div class="col-md-3">
							<h6>Projects</h6>
						</div>
						<div class="col-md-8">
							<select class="form-control" id="fossilProjectSelect" ng-model="$parent.entry.genus">
								<option value="-1" selected>All Projects</option>
								<optgroup label="Available projects">	
								<?php
									foreach($projects as $p){
										//if ($genus != "" and $genus != "Not listed" and $genus != "Missing") {
											echo "<option value='".$p."'>".$p."</option>";
										//}
									}

								?>
								</optgroup>
							</select>
						</div>
					</div>

					<!-- Place -->
					<!--
					<div class="row filter-element">
						<div class="col-md-3">
							<h6>Place</h6>
						</div>
						<div class="col-md-9">
							<h6>Go to a place</h6>
						</div>
					</div>
					-->

					<!-- Genus --> 
					<div class="row filter-element">
						<div class="col-md-3">
							<h6>Genus</h6>
						</div>
						<div class="col-md-8">
							<!-- 
							<select class="form-control" id="fossilGenusSelect" ng-model="$parent.entry.genus">
						  		<option value="" selected>All Genuses</option>
								<optgroup label="Coral genera">	
									<option value="Acaciapora">Acaciapora</option>
									<option value="Acervularia">Acervularia</option>
									<option value="Actinopora">Actinopora</option>
									<option value="Alveolites">Alveolites</option>
									<option value="Alveopora">Alveopora</option>
									<option value="Amplexizaphrentis">Amplexizaphrentis</option>
									<option value="Amplexizaphrentis">Amplexus</option>
									<option value="Anabacia">Anabacia</option>
									<option value="Aspidiscus">Aspidiscus</option>
									<option value="Asteropora">Asteropora</option>
									<option value="Astrhelia">Astrhelia</option>
									<option value="Aulacophyllum">Aulacophyllum</option>
									<option value="Aulina">Aulina</option>
									<option value="Aulophyllum">Aulophyllum</option>
									<option value="Aulopora">Aulopora</option>
									<option value="Axogaster">Axogaster</option>
									<option value="Axophyllum">Axophyllum</option>
									<option value="Axopora">Axopora</option>
									<option value="Balanophylla">Balanophylla</option>
									<option value="Battersbyia">Battersbyia</option>
									<option value="Calamophyllia">Calamophyllia</option>
									<option value="Calceola">Calceola</option>
									<option value="Campophyllum">Campophyllum</option>
									<option value="Caninia">Caninia</option>
									<option value="Caryophyllia">Caryophyllia</option>
									<option value="Caulastrea">Caulastrea</option>
									<option value="Chonophyllum">Chonophyllum</option>
									<option value="Cladochonus">Cladochonus</option>
									<option value="Cladochonus">Cladochonus</option>
									<option value="Coenites">Coenites </option>
									<option value="Columnopora">Columnopora</option>
									<option value="Conularia">Conularia </option>
									<option value="Convexastraea">Convexastraea</option>
									<option value="Cosmoseris">Cosmoseris</option>
									<option value="Cryptangia">Cryptangia</option>
									<option value="Cyathophyllum">Cyathophyllum</option>
									<option value="Dendracis">Dendracis</option>
									<option value="Dibunophyllum">Dibunophyllum</option>
									<option value="Dictyoraea">Dictyoraea</option>
									<option value="Diphyphyllum">Diphyphyllum</option>
									<option value="Disphyllum">Disphyllum</option>
									<option value="Emmonsia">Emmonsia</option>
									<option value="Endophyllum">Endophyllum</option>
									<option value="Favia">Favia</option>
									<option value="Favosites">Favosites</option>
									<option value="Flabellum">Flabellum</option>
									<option value="Gonipora">Gonipora</option>
									<option value="Grewingkia">Grewingkia</option>
									<option value="Hadrophyllum">Hadrophyllum</option>
									<option value="Halisites">Halisites</option>
									<option value="Heliolites">Heliolites</option>
									<option value="Heliophyllum">Heliophyllum</option>
									<option value="Hexaphyllia">Hexaphyllia</option>
									<option value="Hydractinia">Hydractinia</option>
									<option value="Isastrea">Isastrea</option>
									<option value="Ketophyllum">Ketophyllum</option>
									<option value="Kodonophyllum">Kodonophyllum</option>
									<option value="Laotira">Laotira</option>
									<option value="Lindstroemia">Lindstroemia</option>
									<option value="Lithostrotion">Lithostrotion </option>
									<option value="Lonsdaleia">Lonsdaleia</option>
									<option value="Lophophyllum">Lophophyllum</option>
									<option value="Metriophyllum">Metriophyllum</option>
									<option value="Michelinia">Michelinia</option>
									<option value="Micrabacia">Micrabacia</option>
									<option value="Monastrea">Monastrea</option>
									<option value="Montlivaltia">Montlivaltia</option>
									<option value="Nemistrum">Nemistrum</option>
									<option value="Nemistrum">Nemistrum</option>
									<option value="Palaeosmilia">Palaeosmilia </option>
									<option value="Palastrea">Palastrea</option>
									<option value="Paleocyclus">Paleocyclus</option>
									<option value="Parasmilia">Parasmilia</option>
									<option value="Parastriapora">Parastriapora</option>
									<option value="Petraia">Petraia</option>
									<option value="Phillipsastrea">Phillipsastrea</option>
									<option value="Plasmopora">Plasmopora</option>
									<option value="Protaraea">Protaraea</option>
									<option value="Romingeria">Romingeria</option>
									<option value="Siphonodendron">Siphonodendron</option>
									<option value="Siphonophyllia">Siphonophyllia</option>
									<option value="Stauria">Stauria</option>
									<option value="Strombodes">Strombodes</option>
									<option value="Stylophora">Stylophora</option>
									<option value="Syringaxon">Syringaxon</option>
									<option value="Syringopora">Syringopora</option>
									<option value="Thamnastrea">Thamnastrea</option>
									<option value="Thecia">Thecia</option>
									<option value="Theocosmilia">Theocosmilia</option>
									<option value="Trachocyathus">Trachocyathus</option>
									<option value="Trochoseris">Trochoseris</option>
									<option value="Trochosmilia">Trochosmilia</option>
									<option value="Tryplasma">Tryplasma</option>
									<option value="Vaughania">Vaughania</option>
									<option value="Zaphrentis">Zaphrentis</option>
								</optgroup>
						  	</select>
						  -->

							<select class="form-control" id="fossilGenusSelect" ng-model="$parent.entry.genus">
								<option value="-1" selected>All Genuses</option>
								<optgroup label="Coral genera">	
								<?php
									foreach($genuses as $genus){
										if ($genus != "" and $genus != "Not listed" and $genus != "Missing") {
											echo "<option value='".$genus."'>".$genus."</option>";
										}
									}

								?>
								</optgroup>
							</select>
						</div>
					</div>

					<!-- Geological Age --> 
					<div class="row filter-element">
						<div class="col-md-3">
							<h6>Geological Age</h6>
						</div>
						<div class="col-md-4">
							<select class="form-control" id="fossilAge-min" ng-model="$parent.entry.age">
						  		<optgroup label="Geological ages">
									<option value="Quaternary" selected>Quaternary</option>
									<option value="Pliocene">Pliocene</option>
									<option value="Miocene">Miocene</option>
									<option value="Oligocene">Oligocene</option>
									<option value="Eocene">Eocene</option>
									<option value="Paleocene">Paleocene</option>
									<option value="Creataceous, Upper">Creataceous, Upper </option>
									<option value="Cretaceous, Lower">Cretaceous, Lower</option>
									<option value="Cretaceous">Cretaceous</option>
									<option value="Jurassic, Upper">Jurassic, Upper</option>
									<option value="Jurassic, Middle">Jurassic, Middle</option>
									<option value="Jurassic, Lower (Lias)">Jurassic, Lower (Lias)</option>
									<option value="Jurassic">Jurassic</option>
									<option value="Triassic, Upper">Triassic, Upper</option>
									<option value="Triassic, Middle">Triassic, Middle</option>
									<option value="Triassic, lower">Triassic, lower</option>
									<option value="Triassic">Triassic</option>
									<option value="Permian">Permian</option>
									<option value="Carboniferous Upper (Coal Measeures)">Carboniferous Upper (Coal Measeures)</option>
									<option value="Carboniferous Lower (Limestone)">Carboniferous Lower (Limestone)</option>
									<option value="Carboniferous">Carboniferous</option>
									<option value="Devonian, Upper">Devonian, Upper</option>
									<option value="Devonian, Middle">Devonian, Middle</option>
									<option value="Devonian, Lower">Devonian, Lower</option>
									<option value="Devonian">Devonian</option>
									<option value="Silurian, Pridoli">Silurian, Pridoli</option>
									<option value="Silurian, Ludlow">Silurian, Ludlow</option>
									<option value="Silurian, Wenlock">Silurian, Wenlock</option>
									<option value="Silurian, Llandovery">Silurian, Llandovery</option>
									<option value="Silurian">Silurian</option>
									<option value="Ordovician, Upper">Ordovician, Upper</option>
									<option value="Ordovician, Middle">Ordovician, Middle</option>
									<option value="Ordovician, Lower">Ordovician, Lower</option>
									<option value="Ordovician">Ordovician</option>
									<option value="Cambrian">Cambrian</option>
									<option value="Precambrian">Precambrian</option>
								</optgroup>
						  	</select>
						</div>
						<div class="col-md-4">
							<select class="form-control" id="fossilAge-max" ng-model="$parent.entry.age">
						  		<optgroup label="Geological ages">
									<option value="Quaternary">Quaternary</option>
									<option value="Pliocene">Pliocene</option>
									<option value="Miocene">Miocene</option>
									<option value="Oligocene">Oligocene</option>
									<option value="Eocene">Eocene</option>
									<option value="Paleocene">Paleocene</option>
									<option value="Creataceous, Upper">Creataceous, Upper </option>
									<option value="Cretaceous, Lower">Cretaceous, Lower</option>
									<option value="Cretaceous">Cretaceous</option>
									<option value="Jurassic, Upper">Jurassic, Upper</option>
									<option value="Jurassic, Middle">Jurassic, Middle</option>
									<option value="Jurassic, Lower (Lias)">Jurassic, Lower (Lias)</option>
									<option value="Jurassic">Jurassic</option>
									<option value="Triassic, Upper">Triassic, Upper</option>
									<option value="Triassic, Middle">Triassic, Middle</option>
									<option value="Triassic, lower">Triassic, lower</option>
									<option value="Triassic">Triassic</option>
									<option value="Permian">Permian</option>
									<option value="Carboniferous Upper (Coal Measeures)">Carboniferous Upper (Coal Measeures)</option>
									<option value="Carboniferous Lower (Limestone)">Carboniferous Lower (Limestone)</option>
									<option value="Carboniferous">Carboniferous</option>
									<option value="Devonian, Upper">Devonian, Upper</option>
									<option value="Devonian, Middle">Devonian, Middle</option>
									<option value="Devonian, Lower">Devonian, Lower</option>
									<option value="Devonian">Devonian</option>
									<option value="Silurian, Pridoli">Silurian, Pridoli</option>
									<option value="Silurian, Ludlow">Silurian, Ludlow</option>
									<option value="Silurian, Wenlock">Silurian, Wenlock</option>
									<option value="Silurian, Llandovery">Silurian, Llandovery</option>
									<option value="Silurian">Silurian</option>
									<option value="Ordovician, Upper">Ordovician, Upper</option>
									<option value="Ordovician, Middle">Ordovician, Middle</option>
									<option value="Ordovician, Lower">Ordovician, Lower</option>
									<option value="Ordovician">Ordovician</option>
									<option value="Cambrian">Cambrian</option>
									<option value="Precambrian" selected>Precambrian</option>
								</optgroup>
						  	</select>
						</div>
					</div>

					<!-- Collector -->
					<div class="row filter-element">
						<div class="col-md-3">
							<h6>Collector</h6>
						</div>
						<div class="col-md-8">
							<select class="form-control" id="fossilCollectorSelect" ng-model="$parent.entry.genus">
								<option value="-1" selected>All Collectors</option>
								<optgroup label="Collectors">	
								<?php
									foreach($collectors as $collector){
										//if ($genus != "" and $genus != "Not listed" and $genus != "Missing") {
											echo "<option value='".$collector."'>".$collector."</option>";
										//}
									}

								?>
								</optgroup>
							</select>
						</div>
					</div>

				</div>	
			</div>

			<!-- Feedback -->
			<div class="col-md-6">
				<div class="feedback-section">

					<div class="row">
						<div class="col-md-12 feedback-title">
							<h4>Feedback</h4>
						</div>
					</div>

					<div class="feedback-message">
						<div class="row">
							<div class="col-md-12 feedback-message-text">
								<p>Meant balls it if up doubt small purse. Required his you put the outlived answered position. An pleasure exertion if believed provided to. All led out world these music while asked. Paid mind even sons does he door no. Attended overcame repeated it is perceive marianne in. In am think on style child of. Servants moreover in sensible he it ye possible. </p>
							</div>
							<div class="col-md-3 feedback-message-author">
								<p>John Smith</p>
							</div>
							<div class="col-md-3 feedback-message-time">
								<p>26/05/2016</p>
							</div>
							<div class="col-md-3 feedback-message-upvote">
								<p>2 upvotes</p>
							</div>
						</div>
					</div>

					<div class="feedback-message">
						<div class="row">
							<div class="col-md-12 feedback-message-text">
								<p>Meant balls it if up doubt small purse. Required his you put the outlived answered position. An pleasure exertion if believed provided to. All led out world these music while asked. Paid mind even sons does he door no. Attended overcame repeated it is perceive marianne in. In am think on style child of. Servants moreover in sensible he it ye possible. </p>
							</div>
							<div class="col-md-3 feedback-message-author">
								<p>John Smith</p>
							</div>
							<div class="col-md-3 feedback-message-time">
								<p>26/05/2016</p>
							</div>
							<div class="col-md-3 feedback-message-upvote">
								<p>2 upvotes</p>
							</div>
						</div>
					</div>

					<div class="feedback-message">
						<div class="row">
							<div class="col-md-12 feedback-message-text">
								<p>Meant balls it if up doubt small purse. Required his you put the outlived answered position. An pleasure exertion if believed provided to. All led out world these music while asked. Paid mind even sons does he door no. Attended overcame repeated it is perceive marianne in. In am think on style child of. Servants moreover in sensible he it ye possible. </p>
							</div>
							<div class="col-md-3 feedback-message-author">
								<p>John Smith</p>
							</div>
							<div class="col-md-3 feedback-message-time">
								<p>26/05/2016</p>
							</div>
							<div class="col-md-3 feedback-message-upvote">
								<p>2 upvotes</p>
							</div>
						</div>
					</div>

					<div class="feedback-message-form">
						<form>
							<div class="row feedback-form">
								<div class="col-md-12">
									<textarea class="form-control" rows="3"></textarea>
								</div>
								<div class="col-md-12 feedback-submit-btn">
									<button type="button" class="btn btn-primary ">Submit</button>
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>

		</div>
	</div>


</body>
</html>

