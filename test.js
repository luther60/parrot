

//Récuperation de notre Json
const vehicles = await fetch("admin/JSON/filter.json", {
  method: 'GET',
  headers: {
    "Content-type": "application/json;charset=UTF-8",
    "accept": "application/json"
  }
}).then(pieces => pieces.json());




 function GetFilter(vehicles) {
  const displayVehicles = document.querySelector('.vehicles')//Section
  //Boucle permettant de récuperer chaque éléments via son index
  for(let i = 0; i < vehicles.length; i++) {
  //console.log(vehicles[i].id)
  //Création div globale
  const displayCards = document.createElement('div')
  displayCards.classList.add('display_cards')
  //Création img + affichage
  const imgCard = document.createElement('img')
  imgCard.classList.add('img_card')
  imgCard.src = vehicles[i].Img1
  //Création seconde div
  const contentCard = document.createElement('div')
  contentCard.classList.add('content_card')
  //Creation titre + modele vehicule
  const title = document.createElement('h2')
  title.innerText = vehicles[i].Brand+' '+vehicles[i].Model
  //Création balise p puis affichage
  const info = document.createElement('p')
  info.innerText = vehicles[i].Registration+" | "+vehicles[i].Kilometer+" Km"+" | "+vehicles[i].Fuel

  const price = document.createElement('p')
  price.innerText = vehicles[i].Price+' '+'€'
  
 // Création de la balise A
 //A noter que l'on créer la balise mais s'est PHP qui prend en charge l'affichage
  const detail = document.createElement('a')
  detail.innerText = 'Détails'
  detail.href = "occasion.php?id="+vehicles[i].id
  

  //Déclaration des noeuds enfant
  displayVehicles.appendChild(displayCards)
  displayCards.appendChild(imgCard)
  displayCards.appendChild(contentCard)
  contentCard.appendChild(title)
  contentCard.appendChild(info)
  contentCard.appendChild(price)
  contentCard.appendChild(detail)
 
}
 }


GetFilter(vehicles)

 
  

//Trie le moins cher
const maxPrice = document.querySelector('#max_price')
maxPrice.addEventListener('input', function() {
  //Tri par ordre croissant
  const preFilter = vehicles.sort(function(a,b) {
    return a.Price - b.Price
  })
  //Filtrage des éléments
  const filterPrice = preFilter.filter(function(vehicle) {
    return vehicle.Price <= maxPrice.value;
  })
  document.querySelector('.vehicles').innerHTML = "";
  GetFilter(filterPrice)
  console.log(filterPrice)
})

//Trie le kilometrage max
const maxKm = document.querySelector('#max_km')
maxKm.addEventListener('input', function() {
  const preFilter = vehicles.sort(function(a,b) {
    return a.Kilometer - b.Kilometer
  })
  const filterKm = preFilter.filter(function(vehicle) {
    return vehicle.Kilometer <= maxKm.value;
  })
  document.querySelector('.vehicles').innerHTML = "";
  GetFilter(filterKm)
  console.log(filterKm)
})

//Trie le nombre max années
const maxYears = document.querySelector('#max_années')
maxYears.addEventListener('input', function() {
  const preFilter = vehicles.sort()
  const filterYears = preFilter.filter(function(vehicle) {
    return vehicle.Registration <= maxYears.value;
  })
  document.querySelector('.vehicles').innerHTML = "";
  GetFilter(filterYears)
  console.log(filterYears)
})

