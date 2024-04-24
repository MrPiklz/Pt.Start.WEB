var count = 0;
document.getElementById("myButton").onclick = function () {
    count++;
    if (count % 2 == 0) { 
		document.getElementById("demo").innerHTML = "";
	} else {
        var img = document.createElement("img");
        img.src = "https://i.pinimg.com/originals/cd/56/9f/cd569f4bc1f7fcc6bd3177049f260ebe.jpg";
        document.getElementById("demo").appendChild(img);
	}
    
}

