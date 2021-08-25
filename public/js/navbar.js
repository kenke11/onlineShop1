let prodCat = document.querySelectorAll('.nav-product-li');
let subcategory = document.querySelectorAll('.product-in');

prodCat.forEach(e => {
    e.addEventListener('mouseenter', event => {
        for (let i = 0; i < e.children.length; i++) {
            if (e.children[i].tagName === 'UL') {
                e.children[i].style.display = 'flex'
            }
        }
    })
    e.addEventListener('mouseleave', event => {
        for (let i = 0; i < e.children.length; i++) {
            if (e.children[i].tagName === 'UL') {
                e.children[i].style.display = 'none'
            }
        }
    })

})
