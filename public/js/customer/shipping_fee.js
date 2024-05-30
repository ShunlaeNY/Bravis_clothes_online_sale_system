// const yangon = document.querySelector(".div3 .yangon");
// console.log(yangon);
// const otherRegion = document.querySelector(".div3 .other_region");
// console.log(otherRegion);
// const deliveryFeesInput = document.querySelector('input[name="delivery_fee"]');


//     yangon.addEventListener("click",() =>{
//         const ygnFee = 2500;
//         deliveryFeesInput.value = ygnFee;
//         yangon.style.cssText="border:1px solid black;background-color: var(--secondary-color);"
//         otherRegion.style.cssText="background-color:lightgray;border:none;color:gray;"
        
//     })
//     otherRegion.addEventListener("click",() =>{
//         const otherFee = 3500;
//         deliveryFeesInput.value = otherFee;
//         otherRegion.style.cssText="border:1px solid black;background-color: var(--secondary-color);"
//         yangon.style.cssText="background-color:lightgray;border:none;color:gray;"
//     })

/////////////////////////////////

const yangon = document.querySelector(".div3 .yangon");
// console.log(yangon);
const otherRegion = document.querySelector(".div3 .other_region");
// console.log(otherRegion);
// const delivery = document.querySelector("#delivery");
// console.log(otherRegion);
function getInputValue(){
    

    var ygn_fee = document.querySelector("#delivery").value;
    ygn_fee =  2500;
    
    document.getElementById("delivery_fee").textContent = ygn_fee;
    document.getElementById('delivery').value = ygn_fee ;
    // console.log(document.getElementById('dprice').value);
    const disc_price = document.getElementById('discountprice').value;
    // console.log(disc_price);
    var totalprice = document.getElementById('totalprice').value;
        // console.log(document.getElementById('dprice').value);
    const total = Number(totalprice) + Number(ygn_fee)  - Number(disc_price);
    document.getElementById("total").textContent = total;
    document.getElementById('Total_paynow').value = total ;
    // console.log(document.getElementById('Total_paynow').value);



}
function getInputValue1(){

    var ygn_fee = document.querySelector("#delivery").value;
    ygn_fee = 3500;
    // console.log(ygn_fee);
    document.getElementById("delivery_fee").textContent = ygn_fee;
    document.getElementById('delivery').value = ygn_fee ;
    const disc_price = document.getElementById('discountprice').value;
    // console.log(disc_price);
    var totalprice = document.getElementById('totalprice').value;
    const total = (Number(totalprice) + Number(ygn_fee)) - Number(disc_price);
    document.getElementById("total").textContent = total;
    document.getElementById('Total_paynow').value = total ;
}
yangon.addEventListener("click", () => {
    // var delivery = document.getElementById('#delivery');
    // console.log(delivery);

    yangon.style.cssText =
        "border:1px solid black;background-color: var(--secondary-color);";
    otherRegion.style.cssText =
        "background-color:lightgray;border:none;color:gray;";
});
otherRegion.addEventListener("click", () => {
    otherRegion.style.cssText =
        "border:1px solid black;background-color: var(--secondary-color);";
    yangon.style.cssText = "background-color:lightgray;border:none;color:gray;";
});

let selectedPaymentType = document.querySelector("#payment_type");
let card_info = document.querySelector("#card");


selectedPaymentType.addEventListener("click", function () {
    console.log(selectedPaymentType.value);
    if (selectedPaymentType.value === "prepaid" ) {
        card_info.style.display="inline-block";
    }
});