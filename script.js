document.querySelector(".panlabel").style.display="none";
document.querySelector(".submit").addEventListener("click", function(e){
    var fname=document.querySelector(".fname").value;
    var lname=document.querySelector(".lname").value;
    var mdname=document.querySelector(".mdname").value;
    var uid=document.querySelector(".uid").value;
    var pan=document.querySelector(".pan").value;

    console.log(fname);
    console.log(lname);
    console.log(mdname);
    console.log(uid);
    console.log(pan);

    alert("account opened Your Account no is 82504089");
})
document.querySelector(".btnyes").addEventListener("click", (e)=>{
      e.preventDefault();
      document.querySelector(".panlabel").style.display="block";
     
})
document.querySelector(".btnno").addEventListener("click", (e)=>{
    e.preventDefault();
    document.querySelector(".panlabel").style.display="none";
    alert("You are not Eligible to having saving Account")
})
