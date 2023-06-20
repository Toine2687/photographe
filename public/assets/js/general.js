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
	selector: '#content',
	plugins: 'image',
	toolbar: 'image',
	image_list: [
		{ title: 'My image 1', value: 'https://www.example.com/my1.gif' },
		{ title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif' }
	]
})
