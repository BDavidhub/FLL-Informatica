//fullpage instance
var train = document.querySelector(".train");
console.log(train);

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


$('.stazione1').click(function(){
	console.log('2');
})

/// fa l
