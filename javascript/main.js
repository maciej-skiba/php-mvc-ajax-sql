function zoom_image(id){  
    document.getElementById("zoom").style.opacity= '100%';
    document.getElementById("zoom").style.display= "block";
    document.getElementById("zoom_image").src= "images/gallery/" + id + ".jpg"; 
}

function unzoom_image(){
    document.getElementById("zoom").style.opacity= '0%';
    document.getElementById("zoom").style.display= "none";
}