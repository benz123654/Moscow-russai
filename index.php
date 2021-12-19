<!doctype html>
<html lang="en">
<head>
        <title>พยากรณ์อากาศ-63118343</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
       <style>

        body {
          background-color: #222529ce;
          font-family: Arial, Helvetica, sans-serif;
    
        }
    </style>  

</head>

<body>

        </div>
        <div class="container mt-5 d-flex justify-content-center">
            <div class="card" id="cardWeather" style="width: 100rem;">
            <div id="dataWeather" style="display: none;"><img src="https://images.hdqwalls.com/wallpapers/russia-moscow-cityscape-4k-rl.jpg" 
                class="card-img-top"><div class="card-body"><h5 class="card-title my-3 ">สถานที่ : Moscow Russia</h5><p class="card-text">อาทิตย์ขึ้นเวลา : 23:24:48</p><p class="card-text">อาทิตย์ตกเวลา : 11:07:21</p><p class="card-text">ความเร็วลม : 2.39</p><p class="card-text">อุณหภูมิ : 25.09</p><p class="card-text">ความชื้นในอากาศ : 86</p></div></div></div>

                </div>
            </div>
        
    
    

<script>

    function setDefault(){
        var urlDefualt = "https://api.openweathermap.org/data/2.5/weather?lat=55.5807481&lon=36.8251304&appid=585ebd9c6b56cac04e88cb2269a1cc6f";
        $.getJSON(urlDefualt)
            .done((data) => {
                var datetime = convertHMS(data.dt);
                var sunrise = convertHMS(data.sys["sunrise"]);
                var sunset = convertHMS(data.sys["sunset"]);
                var place = (data.name);
                var windSpeed = (data.wind["speed"]);
                var temp = ((data.main["temp"] - 273).toFixed(2));
                var humid = (data.main["humidity"]);
                $.each(data.weather[0], (key, value) => {
                    for (let i = 0; i < (data.weather[0]).length; i++) {
                        console.log(value);
                    }
                })
                
                var line = "<div id='dataWeather'>";
                    line += "<img src='https://images.hdqwalls.com/wallpapers/russia-moscow-cityscape-4k-rl.jpg' class='card-img-top' ><div class='card-body'>"
                    line += "<h5 class='card-title my-3 '>สถานที่ : "+ place +"</h5>";
                    line += "<p class='card-text'>อาทิตย์ขึ้นเวลา : "+ sunrise +"</p>";
                    line += "<p class='card-text'>อาทิตย์ตกเวลา : "+ sunset +"</p>";
                    line += "<p class='card-text'>ความเร็วลม : "+ windSpeed +"</p>";
                    line += "<p class='card-text'>อุณหภูมิ : "+ temp +"</p>";
                    line += "<p class='card-text'>ความชื้นในอากาศ : "+ humid  +"</p>";
                    line += "</div>"
                $("#cardWeather").append(line);
            }).fail((xhr, status, error) => {})
    } 

    function LoadForcast() {
        var x = $("#Latitude").val();
        var y = $("#Longitude").val();
        var url = "https://api.openweathermap.org/data/2.5/weather?lat=" + x + "&lon=" + y + "&appid=585ebd9c6b56cac04e88cb2269a1cc6f"
        $.getJSON(url)
            .done((data) => {
                var datetime = convertHMS(data.dt);
                var sunrise = convertHMS(data.sys["sunrise"]);
                var sunset = convertHMS(data.sys["sunset"]);
                var place = (data.name);
                var windSpeed = (data.wind["speed"]);
                var temp = ((data.main["temp"] - 273).toFixed(2));
                var humid = (data.main["humidity"]);
                $.each(data.weather[0], (key, value) => {
                    for (let i = 0; i < (data.weather[0]).length; i++) {
                        console.log(value);
                    }
                })
                var line = "<div id='dataWeather'>";
                    line += "<img src='https://images.hdqwalls.com/wallpapers/russia-moscow-cityscape-4k-rl.jpg' class='card-img-top' ><div class='card-body'>"
                    line += "<h5 class='card-title my-3'>สถานที่ : "+ place +"</h5>";
                    line += "<p class='card-text'>อาทิตย์ขึ้นเวลา : "+ sunrise +"</p>";
                    line += "<p class='card-text'>อาทิตย์ตกเวลา : "+ sunset +"</p>";
                    line += "<p class='card-text'>ความเร็วลม : "+ windSpeed +"</p>";
                    line += "<p class='card-text'>อุณหภูมิ : "+ temp +"</p>";
                    line += "<p class='card-text'>ความชื้นในอากาศ : "+ humid  +"</p>";
                    line += "</div>"
                $("#cardWeather").append(line);
            }).fail((xhr, status, error) => {})
    }

    function convertHMS(value) {
        let time = value;
        var convert = new Date(time * 1000);
        var hours = convert.getHours();
        var minutes = "0" + convert.getMinutes();
        var seconds = "0" + convert.getSeconds();
        return (hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2));
    }
    $(() => {
        setDefault();
        $("#btnSearch").click(() => {
            LoadForcast();
            $("#dataWeather").hide();
        });
    });
</script>
</body>
</html>
