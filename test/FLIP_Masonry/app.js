// Sélection des éléments du DOM
const elApp = document.getElementById('app');
const elImages = Array.from(document.querySelectorAll(".gallery-image"));
const elDetail = document.querySelector(".detail");
const elDetailImage = elDetail.querySelector(".gallery-image")
const closeBtn = document.getElementById('closeBtn')
const previousBtn = document.getElementById('previousBtn')
const nextBtn = document.getElementById('nextBtn')
const gallery = document.querySelector('.gallery')
let currentImageIndex = 0

elDetail.style.display = "none";
closeBtn.style.display = 'none'
previousBtn.style.display = 'none'
nextBtn.style.display = 'none'

// Fonction pour ouvrir la vue détaillée
function openDetail(event) {

	// Récupération de l'image cliquée
	const target = event.target;
	// et de son index pour les fctn next / previous
	currentImageIndex = elImages.indexOf(target)
	if (currentImageIndex == -1) {
		currentImageIndex = elImages.indexOf(event.currentTarget);
	}

	// Création d'une copie de l'image cliquée avec une largeur plus grande
	const wideClone = target.cloneNode(true);
	wideClone.classList.add('clone')
	wideClone.style.maxwidth = "90%";

	//désactivation des clics sur les images derrière
	gallery.classList.toggle('clone-active')

	// Ajout de l'image copiée dans la vue détaillée
	elDetail.innerHTML = "";
	elDetail.appendChild(wideClone);

	// Affichage de la vue détaillée et des boutons
	elDetail.style.display = "block";
	closeBtn.style.display = 'block'
	previousBtn.style.display = 'block'
	nextBtn.style.display = 'block'
}

//fonction d'affichage et de remplacement de l'image détaillée
function showImage(index) {
	currentImageIndex = index
	const targetImage = elImages[index].cloneNode(true)
	//suppression de l'image antérieur avant ajout de la nouvelle
	elDetail.removeChild(elDetail.firstChild);
	elDetail.appendChild(targetImage)
}

//fonction slide suivante
function nextImage() {
	currentImageIndex = (currentImageIndex + 1) % elImages.length
	showImage(currentImageIndex)
}

//fonction slide précédente
function previousImage() {
	currentImageIndex = (currentImageIndex - 1) % elImages.length
	showImage(currentImageIndex)
}

// Fonction fermeture de la vue détaillée et des boutons
function closeDetail() {
	elDetail.style.display = "none";
	closeBtn.style.display = 'none'
	previousBtn.style.display = 'none'
	nextBtn.style.display = 'none'
	gallery.classList.toggle('clone-active')

}

// Ajout d'un écouteur d'événement sur chaque image
elImages.forEach(elImage => {
	elImage.addEventListener('click', openDetail);
});

//ecouteur sur le bouton de fermeture
closeBtn.addEventListener('click', closeDetail)
//ecouteur du bouton next
nextBtn.addEventListener('click', nextImage)
//ecouteur du bouton previous
previousBtn.addEventListener('click', previousImage)