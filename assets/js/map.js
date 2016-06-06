var actualmap;
var markers = [];

var filter = [];
filter['project'] = "-1";
filter['genus'] = "-1";
filter['ageMin'] = "Quaternary";
filter['ageMax'] = 'Precambrian';
filter['collector'] = '-1';


// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

function clearMarkers() {
  setMapOnAll(null);
}

function deleteMarkers() {
  clearMarkers();
  markers = [];
}

function createMarkers(info){
	var marker = new google.maps.Marker({
		map: actualmap,
		position: new google.maps.LatLng(info['lat'], info['lng']),
		title: info['title']
	});

	markers.push(marker);
}

var refresh = function()
{
	deleteMarkers;
	//retrieve the fossils and put them as marker in the map
	$http.get('/api/map/loadfossils/'+filter['genus']+'/-1/ee/ee/'+filter['collector']+'/-1/-1/-1/-1/-1').success(function(data, status, headers, config){
		data.forEach(function(item, index){
			var info = [];
			info['lat'] = item['lat'];
			info['lng'] = item['lng'];
			if (item['genus'] == 'Not listed')
			{
				info['title'] = item['genuscustom'] + " " + item['species'];
			}
			else{
				info['title'] = item['genus'] + " " + item['species'];
			}
			
			/*info['content'] = "";
			google.maps.event.addListener(marker, 'click', function(){
				infoWindow.setContent('<h2>'+info['title']+'</h2>');
				infoWindow.open($scope.actualmap, marker);
			});
*/
			createMarkers(info);	
		});
	});
}


var map = angular.module('map', [])
.controller('GoogleMap', function($scope, $http){
	
	$scope.loading = false;

	var mapProp = {
	    center:new google.maps.LatLng(51.508742,-0.120850),
	    zoom:3,
	    mapTypeId:google.maps.MapTypeId.ROADMAP,
	    mapTypeControl:false,
	    streetViewControl:false
	};

	actualmap = new google.maps.Map(document.getElementById("googleMap"),mapProp);
/*
	//retrieve the fossils and put them as marker in the map
	$http.get('/api/map/loadfossils/'+filter['genus']+'/-1/ee/ee/-1/-1/-1/-1/-1/-1').success(function(data, status, headers, config){
		data.forEach(function(item, index){
			var info = [];
			info['lat'] = item['lattitude'];
			info['lng'] = item['longitude'];
			info['title'] = item['genus'];
			createMarkers(info);	
		});
	});*/

	

	refresh();
});

map.controller('filterSection', function($scope, $http){

	$scope.selectedProject = filter['project'];
	$scope.selectedGenus = filter['genus'];
	$scope.selectedAgeMin = filter['ageMin'];
	$scope.selectedAgeMax = filter['ageMax'];
	$scope.selectedCollector = filter['collector'];
	/*
	$scope.selectedProject = "-1";
	$scope.selectedGenus = "-1";
	$scope.selectedAgeMin = "Quaternary";
	$scope.selectedAgeMax = "Precambrian";
	$scope.selectedCollector = "-1";
	*/

	var refresh = function(){
		deleteMarkers();
		//retrieve the fossils and put them as marker in the map
		$http.get('/api/map/loadfossils/'+filter['genus']+'/-1/ee/ee/'+filter['collector']+'/-1/-1/-1/-1/-1').success(function(data, status, headers, config){
			data.forEach(function(item, index){
				var info = [];
				info['lat'] = item['lat'];
				info['lng'] = item['lng'];
				if (item['genus'] == 'Not listed')
				{
					info['title'] = item['genuscustom'] + " " + item['species'];
				}
				else{
					info['title'] = item['genus'] + " " + item['species'];
				}
				createMarkers(info);	
			});
		});
	}

	$scope.newProject = function (){
		filter['project'] = $scope.selectedProject;
		refresh();
	}

	$scope.newGenus = function(){
		filter['genus'] = $scope.selectedGenus;
		refresh();
	}

	$scope.newAgeMin = function(){
		filter['ageMin'] = $scope.selectedAgeMin;
		refresh();
	}

	$scope.newAgeMax = function(){
		filter['ageMax'] = $scope.selectedAgeMax;
		refresh();
	}

	$scope.newCollector = function(){
		filter['collector'] = $scope.selectedCollector;
		refresh();
	}

});