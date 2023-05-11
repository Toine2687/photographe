// Menu Burger
const burger = document.getElementById('burger')
const navLinks = document.getElementById('navLinks')
// console.log(burger)
// console.log(navLinks)
burger.addEventListener('click', () => {
	navLinks.classList.toggle('mobileMenu')
	burger.classList.toggle('fa-bars')
	burger.classList.toggle('fa-xmark')
	// burger.style.transform = 'rotate(180deg)'
})

//editeur TinyMCE
tinymce.init({
	selector: '#articleContent',
})
