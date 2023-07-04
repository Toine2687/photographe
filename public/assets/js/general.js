// Menu Burger
const burger = document.getElementById('burger')
const navLinks = document.getElementById('navLinks')
burger.addEventListener('click', () => {
	navLinks.classList.toggle('mobileMenu')
	burger.classList.toggle('fa-bars')
	burger.classList.toggle('fa-xmark')
})

//afficheur de champs d'update sur le dash
const modifyPic = document.getElementById('modifyPic')
const updateSection = document.getElementById('update')

if (typeof (modifyPic) != 'undefined' && modifyPic != null) {
	modifyPic.addEventListener('click', () => {
		updateSection.classList.toggle('hidden')
	})
}


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

