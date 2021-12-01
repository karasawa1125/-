var input = document.querySelector('.input_text');
var main = document.querySelector('#name');
var temp = document.querySelector('.temp');
var desc = document.querySelector('.desc');
var clouds = document.querySelector('.clouds');
var button= document.querySelector('.submit');
var icon = document.querySelector('.icon');
var temp_min = document.querySelector('.temp_min');
var temp_max = document.querySelector('.temp_max');
var humidity = document.querySelector('.humidity');

button.addEventListener('click', function(name){
fetch('https://api.openweathermap.org/data/2.5/weather?q='+input.value+'&units=metric&appid=c9deb7d6e9d40852e3fc75f186cfe54c')
.then(response => response.json())
.then(data => {
var tempValue = data['main']['temp'];
var temp_minValue = data['main']['temp_min'];
var temp_maxValue = data['main']['temp_max'];
var humiValue = data['main']['humidity'];
var nameValue = data['name'];
var descValue = data['weather'][0]['description'];
var iconValue = data['weather'][0]['icon'];

main.innerHTML = nameValue;
desc.innerHTML = descValue;
temp.innerHTML = tempValue+'℃';
temp_min.innerHTML = temp_minValue+'℃';
temp_max.innerHTML = temp_maxValue+'℃';
humidity.innerHTML = humiValue+'％';
icon.innerHTML = "<img src='http://openweathermap.org/img/w/"+iconValue+".png'>";

input.value ="";
})

.catch(err => alert("Wrong city name!"));
})
