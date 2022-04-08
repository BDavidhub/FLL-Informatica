var aperto = false;
$('.stazione1').click(function () {
    $('.rectBlue').children('h3').text($(this).attr('name'));
    console.log("xxx");
    showTrains();

});
let tw = document.querySelectorAll(".tw");
let sw = document.querySelectorAll(".sw");
const button = document.getElementById("start");
const arrivingTrain = []
const leavingTrain = []
function showTrains() {
    tw.forEach(element => {
        element.style = "display:none"
    });
    sw.forEach(element => {
        element.style = "display:none"
    });



    for (var i = 0; i < arrivingTrain.length; i++) {
        sw[i].style = "display:block"
        sw[i].innerHTML = arrivingTrain[i]
    }

    for (var i = 0; i < leavingTrain.length; i++) {
        tw[i].style = "display:block"
        tw[i].innerHTML = leavingTrain[i]
    }

}

$.ajax('test.json',//../php_classes/Json.php?train=T1&hub=H2  
    {
        success: function (data, status, xhr) {
            console.log(data)
            var resObj = data

            /*
            preparing entering train
           */
            for (var i = 0; i < resObj.array[0].length; i++) {
                arrivingTrain.push(resObj.array[0][i].arrAbb);
            }
            /*
            preparing exiting train
            */
            for (var i = 0; i < resObj.array[1].length; i++) {
                leavingTrain.push(resObj.array[1][i].arrAbb);
            }

            console.log(arrivingTrain)
            console.log(leavingTrain)
        }
    });