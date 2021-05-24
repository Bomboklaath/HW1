function onResponse1(response){
    return response.json()
}

function onJson1(json){ 
console.log(json);
    let box=document.querySelector("#griglia");

    for(let i=0; i < json.length ;i++){
    const new_div=document.createElement("div");
    let img=document.createElement("img");
    let prodotto=document.createElement("p");
    let quantità =document.createElement("p");
    new_div.classList.add('prod');
    


    img.src=json[i].tipologia;
    prodotto.textContent="Codice articolo:"+ json[i].prodotto;
    quantità.textContent="Quantità acquistata:"+ json[i].quantità;




       

    
    new_div.appendChild(img);
    new_div.appendChild(prodotto);
    new_div.appendChild(quantità);
    box.appendChild(new_div);
    
    
    
}}
fetch("http://localhost/zaffiro/caricaAcquisti.php").then(onResponse1).then(onJson1);
