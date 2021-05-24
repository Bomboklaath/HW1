function onJson(json){ 

    console.log(json);
    let contatti=document.querySelector('#lista');
    for (let i = 0; i < json.length; i++)
    {

        const box=document.createElement("div");
        box.id=json[i].key;

        const ct=document.createElement("h1");
        ct.textContent=json[i].city;

        const dett=document.createElement("h2");
        dett.textContent=json[i].via;

        const dett2=document.createElement("h3");
        dett2.textContent='Interno'+" "+json[i].piano;

       

    

    document.getElementById("lista").appendChild(box);
    document.getElementById(json[i].key).appendChild(ct);
    document.getElementById(json[i].key).appendChild(dett);
    document.getElementById(json[i].key).appendChild(dett2);
   
    }
}

function onResponse(response){
    return response.json()
}


fetch("http://localhost/zaffiro/fetchcont.php").then(onResponse).then(onJson);