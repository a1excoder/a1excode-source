function sendMessage() {

    var name = document.getElementById('nameForm').value;
    var email = document.getElementById('emailForm').value;
    var subject = document.getElementById('subjectForm').value;
    var message = document.getElementById('messageForm').value;
    var statusDiv = $("#statusDiv");

    var btn = $("#btnSubmit");

    $.ajax({
        url: "{{ route('index.page.message') }}",
        type: 'POST',
        cache: false,
        data: {
            'name': name,
            'email': email,
            'subject': subject,
            'message': message,
            '_token': "{{ csrf_token() }}"
        },
        dataType: 'text',
        beforeSend: function () {
            btn.addClass("disabled");
        },
        success: function (data) {
            btn.removeClass("disabled");

            $("#nameForm").val('');
            $("#emailForm").val('');
            $("#subjectForm").val('');
            $("#messageForm").val('');

            statusDiv.removeClass("alert-danger");
            statusDiv.contents().remove();

            statusDiv.addClass("alert-success");
            statusDiv.append(JSON.parse(data).message);
        },
        error: function (data) {
            btn.removeClass("disabled");

            var errors = JSON.parse(data.responseText);

            statusDiv.addClass("alert-danger");
            statusDiv.contents().remove();

            for (var i = 0; i < errors.errors['length']; i++) {
                statusDiv.append(errors.errors[i]+"<br>");
            }

        }
    })
}



function getWeather() {
    var cityName = document.getElementById("cityName").value;
    var btn = $("#btnWeatherSubmit");
    var weatherErrors = $("#weatherErrors");

    var cityNameF = $("#cityNameF");
    var cityTemperature = $("#cityTemperature");
    var cityHumidity = $("#cityHumidity");
    var cityDescription = $("#cityDescription");



    $.ajax({
        url: "{{ route('index.weather.get') }}",
        type: 'POST',
        cache: false,
        data: {
            'city': cityName,
            '_token': "{{ csrf_token() }}"
        },
        dataType: 'text',
        beforeSend: function () {
            btn.addClass("disabled");
        },
        success: function (data) {
            btn.removeClass("disabled");

            weatherErrors.removeClass("alert-danger");
            weatherErrors.contents().remove();


            cityNameF.contents().remove();
            cityNameF.append(JSON.parse(data).city);

            cityTemperature.contents().remove();
            cityTemperature.append(JSON.parse(data).temp);

            cityHumidity.contents().remove();
            cityHumidity.append(JSON.parse(data).humidity);

            cityDescription.contents().remove();
            cityDescription.append(JSON.parse(data).description);
        },
        error: function (data) {
            btn.removeClass("disabled");

            var errors = JSON.parse(data.responseText);

            weatherErrors.addClass("alert");
            weatherErrors.addClass("alert-danger");
            weatherErrors.contents().remove();

            for (var i = 0; i < errors.errors['length']; i++) {
                weatherErrors.append(errors.errors[i]+"<br>");
            }

        }
    })

}
