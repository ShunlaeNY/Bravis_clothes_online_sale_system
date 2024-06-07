
const alert_btn = document.querySelector(".alert_btn");
// const editAlert = document.querySelector(".editAlert");
// const deleteAlert = document.querySelector(".deleteAlert");
const alert = document.querySelector(".alert");
alert_btn.addEventListener("click",()=>{
  console.log('sdjfhkdsj');
    alert.style.display="block";
})
// editAlert.addEventListener("click",()=>{
//   console.log('edit ');
//     alert.style.display="block";
// })
// deleteAlert.addEventListener("click",()=>{
//   console.log('edit ');
//     alert.style.display="block";
// })


var close = document.getElementsByClassName("closebtn");
var i;

    for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}

