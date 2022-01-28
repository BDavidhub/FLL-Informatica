




//fullpage instance

// window.addEventListener('scroll',a=> {
// 	console.log("s");
// train.style.right= Math.max(120 - velocity * window.scrollY, +1) + '%';
// });

new fullpage('#fullpage', {
	//options here
	autoScrolling:true,
	scrollHorizontally: true,
    anchors:['section1', 'section2'],
	navigation: true,
	navigationPosition: 'right',
	navigationTooltips: ['Home', 'Project'],
});


/// fa l
