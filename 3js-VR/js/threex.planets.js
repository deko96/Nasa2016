var THREEx = THREEx || {}

THREEx.Planets	= {}

THREEx.Planets.createStarfield	= function(){
	var texture	= THREE.ImageUtils.loadTexture('images/galaxy_starfield.png')
	var material	= new THREE.MeshBasicMaterial({
		map	: texture,
		side	: THREE.BackSide
	});
	var geometry	= new THREE.SphereGeometry(100, 32, 32)
	var mesh	= new THREE.Mesh(geometry, material)
	return mesh	
}

THREEx.Planets.createMoon	= function(){
	var geometry	= new THREE.SphereGeometry(0.5, 32, 32)
	var material	= new THREE.MeshPhongMaterial({
		map: THREE.ImageUtils.loadTexture('images/moonmap1k.jpg'),
		bumpMap: THREE.ImageUtils.loadTexture('images/moonbump1k.jpg'),
		bumpScale: 0.002,
	})
	var mesh	= new THREE.Mesh(geometry, material)
	return mesh	
}


