
function showSensorsTableId(id)
{
    var xhr = new XMLHttpRequest();

    var name = document.getElementById("sen-name").value;
    var state = document.getElementById("sen-state").value;


    var url = "api/v1/sensorState.php" + "?name=" + name + "&state=" + state;
    xhr.open('VIEWE', url, true);

    xhr.onload = function(){
        if(this.status == 200){
            var sensors = JSON.parse(this.responseText);

            document.getElementById(id).innerHTML = sensors.rows;
            
        }
    }

    xhr.send();
}