document.querySelector("#show").addEventListener("click", function(e){{
    e.preventDefault();
    document.querySelector(".menu").style.display="flex";
    document.querySelector("#show").style.display="none";1
    document.querySelector("#show").style.animation="animate 2s 1";
    document.querySelector("#hide").style.display="inline-block";
}})

document.querySelector("#hide").addEventListener("click", function(e){
    e.preventDefault();
    document.querySelector(".menu").style.display="none";
    document.querySelector("#show").style.display="inline-block";
    document.querySelector("#hide").style.display="none";
    document.querySelector("#hide").style.animation="animate 3s 1"
})