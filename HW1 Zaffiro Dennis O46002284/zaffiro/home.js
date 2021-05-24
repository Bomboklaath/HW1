const pref='https://image.freepik.com/free-vector/illustration-medical-icon_53876-6166.jpg';
const listaBoxPref=[];
var nbox=1+listaBoxPref.length;
const listaPref=document.querySelector('#preferiti');
const listaProdPreferiti=document.querySelector('#listapref');
const x='https://www.pngfind.com/pngs/m/28-283944_cross-out-png-letter-x-png-transparent-png.png';

function onJson(json){ 

    console.log(json);
    let negozi=document.querySelector('#lista');
    for (let i = 0; i < json.length; i++)
    {

        const box=document.createElement("div");
        box.id=json[i].id;

        const tit=document.createElement("h1");
        tit.textContent=json[i].comp;

        const pref_b=document.createElement("img");
        pref_b.id='tastocuore';
        pref_b.src=pref;
        pref_b.addEventListener('click',aggPref);

        const img=document.createElement("img");
        img.id='imm';
        img.src=json[i].immagine;

    const dett=document.createElement("h2");
    dett.textContent=json[i].costo+"€";
    dett.addEventListener('click',vediDett);

     const descrizione=document.createElement('p');
     descrizione.textContent=json[i].desc;
     descrizione.className='hidden';

    document.getElementById("lista").appendChild(box);
    document.getElementById(json[i].id).appendChild(tit);
    document.getElementById(json[i].id).appendChild(pref_b);
    document.getElementById(json[i].id).appendChild(img);
    document.getElementById(json[i].id).appendChild(dett);
    document.getElementById(json[i].id).appendChild(descrizione);
    }
}

function onResponse(response){
    return response.json()
}


fetch("http://localhost/zaffiro/fetchome.php").then(onResponse).then(onJson);


function vediDett(event){
  const pdett= event.currentTarget;
  const descrizione=pdett.parentElement.querySelector("p");
  pdett.classList.add("hidden");
  descrizione.classList.remove("hidden");
  descrizione.addEventListener("click",lessdet);
}

function lessdet(event){
  const ldett=event.currentTarget;
  ldett.parentElement.querySelector("h2").classList.remove("hidden");
  ldett.classList.add("hidden");
}





function onJson2(json){ 
console.log(json);
   
}

function onResponse2(response){
    return response.json()
}



function CuorePref(boxDaCopiare){
  
    const box=document.createElement("div");
        box.id=boxDaCopiare.id;
      console.log(box.id);
        const tit=document.createElement("h1");
        tit.textContent=boxDaCopiare.querySelector("h1").textContent+" "+boxDaCopiare.querySelector("h2").textContent;

        const pref_z=document.createElement("img");
        pref_z.id='tastocuore';
        pref_z.src=x;
        pref_z.addEventListener('click',rimPref);

        const img=document.createElement("img");
        img.id='immagine';
        img.src=boxDaCopiare.querySelector('#imm').src;

    /*const dett=document.createElement("h2");
    dett.textContent="clicca qui per maggiori dettagli";
    dett.addEventListener('click',vediDett);*/

    


    
    document.getElementById("listapref").appendChild(box);
    document.getElementById(boxDaCopiare.id).appendChild(tit);
    document.getElementById(boxDaCopiare.id).appendChild(pref_z);
    document.getElementById(boxDaCopiare.id).appendChild(img);
    //document.getElementById(boxDaCopiare.id).appendChild(dett); 
      
    
  return box;
  }

  function creaPreferito(j,json){
  
    const box=document.createElement("div");
        box.id=json[j].idP;

        const tit=document.createElement("h1");
        tit.textContent=json[j].id+" "+json[j].costo;

        const pref_b=document.createElement("img");
        pref_b.id='tastocuore';
        pref_b.src=x;
        pref_b.addEventListener('click',rimPref);

        const img=document.createElement("img");
        img.id='immagine';
        img.src=json[j].immagine;

    /*const dett=document.createElement("h2");
    dett.textContent="clicca qui per maggiori dettagli";
    //dett.addEventListener('click',vediDett);*/
    
    document.getElementById("listapref").appendChild(box);
    document.getElementById(json[j].idP).appendChild(tit);
    document.getElementById(json[j].idP).appendChild(pref_b);
    document.getElementById(json[j].idP).appendChild(img);
    //document.getElementById(json[j].idP).appendChild(dett);    
    
  return box;
  }


function onJson3(json){ 
    console.log(json);
    
    for (let i = 0; i < json.length; i++) {  // scrivere pulito
    const boxCopiato = creaPreferito(i,json);
    
    if(listaBoxPref.length==0)
      listaPref.classList.remove('hidden');
    
    listaBoxPref.push(boxCopiato);
    listaProdPreferiti.appendChild(boxCopiato);
    nbox+=1;
    }

  }
    
  function onJson4(json){
    
  }
  function onResponse4(response){
    return response.json()
}
   
    
    function onResponse3(response){
        return response.json()
    }




fetch("http://localhost/zaffiro/caricaPref.php").then(onResponse3).then(onJson3);



function aggPref(event){
    
    const button = event.currentTarget;

    for(let i=0;i<listaBoxPref.length;i++)
      if(listaBoxPref[i].id == button.parentElement.id)
      return;
      
      fetch("http://localhost/zaffiro/aggPref.php?var="+button.parentElement.id);
      
    const boxDaCopiare=button.parentElement;
    const boxCopiato = CuorePref(boxDaCopiare);
    boxCopiato.id=boxDaCopiare.id;
  
    if(listaBoxPref.length==0)
      listaPref.classList.remove('hidden');
    
    listaBoxPref.push(boxCopiato);
    listaProdPreferiti.appendChild(boxCopiato);
    nbox+=1;
  
  }



  function rimuoviBoxPreferito(id){
    for(let i=0;i<listaBoxPref.length;i++)
      if(listaBoxPref[i].id == id){
      listaBoxPref.splice(i,1);
      break;}
}


  function rimPref(event){
    const button= event.currentTarget;
    console.log(button.parentElement.id);
    fetch("http://localhost/zaffiro/rimPref.php?var="+button.parentElement.id);

    const idBoxDaRimuovere = button.parentElement.id;

    rimuoviBoxPreferito(idBoxDaRimuovere);
    button.parentElement.remove();

    if(listaBoxPref.length==0)
      listaPref.classList.add('hidden');


  }
