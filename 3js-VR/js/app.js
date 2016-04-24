var renderer;
var element;
var container;
var clock;
var effect;
var updateFcts	= [];
var scene;
var camera;
var light;
init();
function init() {
	scene = new THREE.Scene();
	camera = new THREE.PerspectiveCamera(90, window.innerWidth / window.innerHeight, 0.001, 700 );
	camera.position.set(0, 0, 0);
	scene.add(camera);

	renderer = new THREE.WebGLRenderer();
	renderer.setSize( window.innerWidth, window.innerHeight );
	element = renderer.domElement;
	container = document.getElementById('viewer');
	container.appendChild(renderer.domElement);
	light = new THREE.AmbientLight( 0x888888 );
	// camera.position.z = 1.5;
	scene.add(light);
	effect = new THREE.StereoEffect(renderer);
	
	controls = new THREE.OrbitControls(camera, element);
	controls.target.set(
		camera.position.x + 0.15,
		camera.position.y,
		camera.position.z
	);
	controls.enablePan = false;
	controls.enableZoom = false;
	
	function setOrientationControls(e) {
		if(!e.alpha) return;
		controls = new THREE.DeviceOrientationControls(camera, true);
		controls.connect();
		controls.update();

		element.addEventListener('click', fullscreen, false);
		window.removeEventListener('deviceorientation', setOrientationControls, true);
	}
	window.addEventListener('deviceorientation', setOrientationControls, true);

	light = new THREE.DirectionalLight( 0xcccccc, 1 )
	light.position.set(5,5,5)
	scene.add(light);
	light.castShadow	= true
	light.shadowCameraNear	= 0.01
	light.shadowCameraFar	= 15
	light.shadowCameraFov	= 45

	light.shadowCameraLeft	= -1
	light.shadowCameraRight	=  1
	light.shadowCameraTop	=  1
	light.shadowCameraBottom= -1
	// light.shadowCameraVisible	= true

	light.shadowBias	= 0.001
	light.shadowDarkness	= 0.2

	light.shadowMapWidth	= 1024*2
	light.shadowMapHeight	= 1024*2

	// Sumth
	var date = new Date();
	if (navigator.geolocation) {
	  var timeoutVal = 10 * 1000 * 1000;
	  navigator.geolocation.getCurrentPosition(
	    displayPosition, 
	    displayError,
	    { enableHighAccuracy: true, timeout: timeoutVal, maximumAge: 0 }
	  );
	} else {
	  alert("Geolocation is not supported by this browser");
	}
	function displayError(error) {
	  var errors = { 
	    1: 'Permission denied',
	    2: 'Position unavailable',
	    3: 'Request timeout'
	  };
	  alert("Error: " + errors[error.code]);
	}
	function displayPosition(position) {
		var lat = position.coords.latitude;
		var lng = position.coords.longitude;
		var MoonPos = getMoonPosition(date, lat, lng);
		// var MoonPos = MoonCalc.getMoonPosition(date, location.lat(), location.lng()); // Mond
		var moonData = {
			horizontalAngle: (180 / Math.PI * MoonPos.azimuth) + 180, //azimuth
			elevationAngle: (180 / Math.PI * MoonPos.altitude), // elevation
			distance: MoonPos.distance
		};
		var R = 2;
		var x = R * Math.cos(moonData.elevationAngle) * Math.sin(moonData.horizontalAngle);
		var y = R * Math.cos(moonData.elevationAngle) * Math.cos(moonData.horizontalAngle);
		var z = R * Math.sin(moonData.elevationAngle);

		var starSphere	= THREEx.Planets.createStarfield()
		scene.add(starSphere);
		var mesh = THREEx.Planets.createMoon();

		mesh.position.x = x;
		mesh.position.y = -y;
		mesh.position.z = z;
		// y e gore dole
		// x e napred nazad
		//z e levo deno

		scene.add(mesh);
		clock = new THREE.Clock();
		animate();
	}
}
function animate() {
	requestAnimationFrame(animate);

	update(clock.getDelta());
	render(clock.getDelta());
}
function resize() {
	var w = container.offsetWidth;
	var h = container.offsetHeight;

	camera.aspect = w/h;
	camera.updateProjectionMatrix();

	renderer.setSize(w, h);
	effect.setSize(w, h);
}
function update(dt) {
	resize();
	camera.updateProjectionMatrix();
	controls.update(dt);
}
function render(dt) {
	effect.render(scene, camera);
}
function fullscreen() {
    if (container.requestFullscreen) {
        container.requestFullscreen();
    } else if (container.msRequestFullscreen) {
        container.msRequestFullscreen();
    } else if (container.mozRequestFullScreen) {
        container.mozRequestFullScreen();
    } else if (container.webkitRequestFullscreen) {
        container.webkitRequestFullscreen();
    }
}