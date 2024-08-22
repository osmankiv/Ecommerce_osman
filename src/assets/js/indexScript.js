let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let body = document.querySelector('body');
let NumOfOrders = document.getElementById('quantity').innerHTML;
let listCard = document.querySelector('.listCard');
let total = document.getElementById('total').innerHTML;


openShopping.addEventListener('click', function () {
    body.classList.add('active');
});
closeShopping.addEventListener('click', function () {
    body.classList.remove('active');
});
function addOrders() {
    NumOfOrders++;
    document.getElementById('quantity').innerHTML = NumOfOrders;
    // console.log(NumOfOrders);
    let li = document.createElement("li");
    listCard.appendChild(li);
    for (let i = 0; i < 4; i++) {
        let div = document.createElement("div");
        div.setAttribute("id", "item" + i);
        li.appendChild(div);
    }
    let div0 = document.getElementById('item0');
    let img = document.createElement("img");
    div0.appendChild(img);
    img.setAttribute("src", " assets/images/pattern-placeholders/music-technology-play-equipment-studio-gadget.png")

    let div1 = document.getElementById('item1').innerHTML = "prodect-name";

    let div2 = document.getElementById('item2').innerHTML = "200,000";

    let div3 = document.getElementById('item2');
    let button = document.createElement("button")
    div3.appendChild(button);
    button.innerHTML = "-";
    button.setAttribute("onclick", "cont(0)")

    let div = document.createElement("div");
    div3.appendChild(div);
    div.setAttribute("id", "count");
    div.innerHTML = "0";

    let button2 = document.createElement("button")
    button2.setAttribute("onclick", "cont(1)")
    div3.appendChild(button2);
    button2.innerHTML = "+";
}
function cont(a) {

    let cont = document.getElementById("count").innerHTML;
    if (a == 0 && cont >= 1) { cont-- } else { cont++ }
    document.getElementById("count").innerHTML = cont;

    total_cont = 200000 * cont;
    document.getElementById('total').innerHTML = total_cont;

}


