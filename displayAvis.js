

  const posts = await fetch("/../admin/JSON/post.json", {
  method: 'GET',
  headers: {
    "Content-type": "application/json;charset=UTF-8",
    "accept": "application/json"
  }
}).then(post => post.json());


const stars = [
  {s1 : '\u{2b50}'},//Caractère unicode
  {s2 : '⭐'+'⭐'},//Emoji direct
  {s3 : '⭐'+'⭐'+'⭐'},
  {s4 : '⭐'+'⭐'+'⭐'+'⭐'},
  {s5 : '⭐'+'⭐'+'⭐'+'⭐'+'⭐'},
]
 
  for(let i = 0; i < posts.length; i++) {

  //Récupération de la div
  const divPost = document.querySelector('.validateAvis')
  //Création de la div contenair
  const container = document.createElement('div')
  container.classList.add('container')
  //Creation du titre
  const titlePost = document.createElement('h2')
  titlePost.innerText = posts[i].username
  //Crétion du text
  const textPost = document.createElement('p')
  textPost.innerText = posts[i].avis
  //Création de l'étoile
  const star = document.createElement('span')
  star.classList.add('star')
  switch(posts[i].note) {
    case 1: star.innerText = stars[0].s1;
    break;
    case 2: star.innerText = stars[1].s2;
    break;
    case 3: star.innerText = stars[2].s3;
    break;
    case 4: star.innerText = stars[3].s4;
    break;
    case 5: star.innerText = stars[4].s5;
    break;
  }
  //Noeud enfant
  divPost.appendChild(container)
  container.appendChild(titlePost)
  container.appendChild(textPost)
  container.appendChild(star)
}










