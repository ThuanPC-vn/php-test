/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
      navToggle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close')

/* Menu show */
if(navToggle){
    navToggle.addEventListener('click', () =>{
        navMenu.classList.add('show-menu')
    })
}

/* Menu hidden */
if(navClose){
    navClose.addEventListener('click', () =>{
        navMenu.classList.remove('show-menu')
    })
}

// /*=============== SHOW MENU PRODUCTS ===============*/
// const proMenu = document.getElementById('show-pro-menu'),
//       proToggle = document.getElementById('toggle-pro'),
//       proClose = document.getElementById('close-pro')

// /* Menu show */
// if(proToggle){
//     proToggle.addEventListener('click', () =>{
//       proMenu.classList.add('show-pro-menu');
//       proToggle.style.display = 'none';
//       proClose.style.display = 'inline-block';
//     })
// }

// /* Menu hidden */
// if(proClose){
//     proClose.addEventListener('click', () =>{
//       proMenu.classList.remove('show-pro-menu');
//       proClose.style.display = 'none';
//       proToggle.style.display = 'inline-block';
//     })
// }


/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll('.nav__link')

const linkAction = () =>{
    const navMenu = document.getElementById('nav-menu')
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

/*=============== ADD BLUR HEADER ===============*/
const blurHeader = () =>{
    const header = document.getElementById('header')
    // Add a class if the bottom offset is greater than 50 of the viewport
    this.scrollY >= 50 ? header.classList.add('blur-header') 
                       : header.classList.remove('blur-header')
}
window.addEventListener('scroll', blurHeader)

/*=============== SHOW & HIDE SUBMENU ===============*/
document.querySelectorAll('.dropdown__subitem').forEach(item => {
    const link = item.querySelector('.dropdown__link');
    const icon = link.querySelector('.dropdown__add');
  
    link.addEventListener('click', function(event) {
      event.stopPropagation(); // Ngăn việc sự kiện này lan rộng ra các phần tử khác
      const submenu = item.querySelector('.dropdown__submenu');
      
      // Đóng tất cả các submenu khác trước khi mở cái hiện tại
      document.querySelectorAll('.dropdown__submenu').forEach(sub => {
        sub.style.maxHeight = null;
        sub.parentNode.querySelector('.dropdown__add').classList.remove('ri-close-line');
        sub.parentNode.querySelector('.dropdown__add').classList.add('ri-add-box-line');
      });
  
      // Kiểm tra trạng thái hiện tại của submenu và cập nhật icon
      if (submenu.style.maxHeight) {
        submenu.style.maxHeight = null;
        icon.classList.remove('ri-close-line');
        icon.classList.add('ri-add-box-line');
      } else {
        submenu.style.maxHeight = submenu.scrollHeight + "px";
        icon.classList.remove('ri-add-box-line');
        icon.classList.add('ri-close-line');
      }
    });
  });
  
  // Đóng submenu khi click bên ngoài
  document.addEventListener('click', function() {
    document.querySelectorAll('.dropdown__submenu').forEach(sub => {
      sub.style.maxHeight = null;
      sub.parentNode.querySelector('.dropdown__add').classList.remove('ri-close-line');
      sub.parentNode.querySelector('.dropdown__add').classList.add('ri-add-box-line');
    });
  });
  

/*=============== SWIPER PRODUCT ===============*/ 
let swiperProduct = new Swiper('.products__container',{
    loop: true,
    spaceBetween: 24,
    spacePerView: 'auto',
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    breakpoints: {
        768: {
            spacePerView: 3,
        },
        1024: {
            spaceBetween: 48,
        },
    },
  });


  
/*=============== DETAIL PRODUCT ANIMATION ===============*/
const allHoverImages = document.querySelectorAll('.hover-container div img');
const imgContainer = document.querySelector('.img-container');

window.addEventListener('DOMContentLoaded', () => {
    allHoverImages[0].parentElement.classList.add('active-product-detail');
});

allHoverImages.forEach((image) => {
    image.addEventListener('mouseover', () =>{
        imgContainer.querySelector('img').src = image.src;
        resetActiveImg();
        image.parentElement.classList.add('active-product-detail');
    });
});

function resetActiveImg(){
    allHoverImages.forEach((img) => {
        img.parentElement.classList.remove('active-product-detail');
    });
}





/*=============== SHOW SCROLL UP ===============*/ 
const scrollUp = () =>{
	const scrollUp = document.getElementById('scroll-up')
    // When the scroll is higher than 350 viewport height, add the show-scroll class to the a tag with the scrollup class
	this.scrollY >= 350 ? scrollUp.classList.add('show-scroll')
						: scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp)

/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
/*const sections = document.querySelectorAll('section[id]')
    
const scrollActive = () =>{
  	const scrollDown = window.scrollY

	sections.forEach(current =>{
		const sectionHeight = current.offsetHeight,
			  sectionTop = current.offsetTop - 58,
			  sectionId = current.getAttribute('id'),
			  sectionsClass = document.querySelector('.nav__menu a[href*=' + sectionId + ']')

		if(scrollDown > sectionTop && scrollDown <= sectionTop + sectionHeight){
			sectionsClass.classList.add('active-link')
		}else{
			sectionsClass.classList.remove('active-link')
		}                                                    
	})
}
window.addEventListener('scroll', scrollActive)*/

/*=============== SEARCH ===============*/
const search = document.getElementById('search'),
      searchBtn = document.getElementById('search-btn'),
      searchClose = document.getElementById('search-close')

/* Search show */
searchBtn.addEventListener('click', () =>{
    search.classList.add('show-search')
})

/* Search hide */
searchClose.addEventListener('click', () =>{
    search.classList.remove('show-search')
});




/* Link active featured */
const linkAllProducts = document.querySelectorAll('.pro__all__item')

function activeAllProducts(){
    linkAllProducts.forEach(l=> l.classList.remove('active-pro-all'))
    this.classList.add('active-pro-all')
}
linkAllProducts.forEach(l=> l.addEventListener('click', activeAllProducts))


/*=============== DARK LIGHT THEME ===============*/ 
const themeButton = document.getElementById('theme-button');
const lightTheme = 'light-theme';
const iconTheme = 'ri-sun-line';

// Previously selected topic (if user selected)
const selectedTheme = localStorage.getItem('selected-theme');
const selectedIcon = localStorage.getItem('selected-icon');

// We obtain the current theme that the interface has by validating the light-theme class
const getCurrentTheme = () => document.body.classList.contains(lightTheme) ? 'dark' : 'light';
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'ri-moon-clear-fill' : 'ri-sun-line';

// We validate if the user previously chose a topic
if (selectedTheme) {
  document.body.classList[selectedTheme === 'light' ? 'remove' : 'add'](lightTheme);
  themeButton.classList[selectedIcon === 'ri-moon-clear-fill' ? 'add' : 'remove'](iconTheme);
}

// Activate / deactivate the theme manually with the button
themeButton.addEventListener('click', () => {
  // Add or remove the light / icon theme
  document.body.classList.toggle(lightTheme);
  themeButton.classList.toggle(iconTheme);
  // We save the theme and the current icon that the user chose
  localStorage.setItem('selected-theme', getCurrentTheme());
  localStorage.setItem('selected-icon', getCurrentIcon());
});



/*=============== SCROLL REVEAL ANIMATION ===============*/
const sr = ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: 2500,
    delay: 100,
    //reset: true,
})

sr.reveal(`.home__social, .products__container`)
sr.reveal(`.home__title span:nth-child(1),  .pro__all, .product-div`, {origin: 'left', opacity: 0})
sr.reveal(`.home__title span:nth-child(3),`, {origin: 'top', opacity: 0})
sr.reveal(`.home__title span:nth-child(5),  .checkoutLayout`, {origin: 'right', opacity: 1})
sr.reveal(`.home__tooltip, .home__button, .model__button`, {origin: 'bottom'})
sr.reveal(`.about__data`, {origin: 'left'})
sr.reveal(`.about__img, .model__tooltip`, {origin: 'right'})





/*=============== MIXITUP FILTER ALLPRODUCTS ===============*/
// let mixerAllProducts = mixitup('.pro__all__content', {
//     selectors: {
//         target: '.pro__all__card'
//     },
//     animation: {
//         duration: 300
//     }
// });