
function loadData(data) {
    if (data=="nextButton") {
        document.getElementById("im1").src="images/img5.jpeg";
        document.getElementById("im2").src="images/img6.jpeg";
        document.getElementById("im3").src="images/img7.jpeg";
        document.getElementById("im4").src="images/img8.jpeg";
    }

    else if (data=="prevButton") {
        document.getElementById("im1").src="images/img1.jpeg";
        document.getElementById("im2").src="images/img2.jpeg";
        document.getElementById("im3").src="images/img3.jpeg";
        document.getElementById("im4").src="images/img4.jpeg";
    }
}

         
var indexValue = 0;

function slideShow(){
        setTimeout(slideShow, 2500);
        var x;
        const img = document.getElementsByClassName("slide-image");
        for(x = 0; x < img.length; x++){
            img[x].style.display = "none";
        }
        indexValue++;
           if(indexValue > img.length){
              indexValue = 1;
          }
        img[indexValue -1].style.display = "block";
}
slideShow();

