//Dropdown Menu
const dropbtn = document.getElementById("drop-btn");
const dropDownContent = document.getElementById("dropdown-content");

dropbtn.addEventListener("click", function () {
  dropDownContent.classList.toggle("show");
});

window.onclick = (e) => {
  if (!e.target.matches("#drop-btn, #dropdown-content *")) {
    if (dropDownContent.classList.contains("show")) {
      dropDownContent.classList.remove("show");
    }
  }
};

window.onload = () =>{
  const tabSwitchers = document.querySelectorAll('.tab');
  for(let i = 0; i < tabSwitchers.length; i++){
     const tabSwitcher = tabSwitchers[i]
     const pageId = tabSwitcher.dataset.tab
     tabSwitcher.addEventListener('click', function(e){
       document.querySelector('.tabs .tab.active').classList.remove('active')
       tabSwitcher.classList.add('active')

       switchPage(pageId)
     })
  }
}

window.onload = () =>{
  const tabSwitchers = document.querySelectorAll('.tab-buy');
  for(let i = 0; i < tabSwitchers.length; i++){
     const tabSwitcher = tabSwitchers[i]
     const pageId = tabSwitcher.dataset.tab
     tabSwitcher.addEventListener('click', function(e){
       document.querySelector('.tabs-buy .tab-buy.active').classList.remove('active')
       tabSwitcher.classList.add('active')

       switchPage(pageId)
     })
  }
}


function switchPage(pageId){
  const currentPage = document.querySelector('.main-content .page.show')
  currentPage.classList.remove('show')

  const nextPage = document.querySelector(`.main-content .page[data-page="${pageId}"]`)
  nextPage.classList.add('show')
}

// function deleteCart(key) {
//   let deleteRow = document.querySelector(`.cart-row-${key}`);
//   console.log(deleteRow)
//   let result = confirm("Biztosan Törli");
//   if (result) {
//      deleteRow.innerHTML = "";
//      console.log()
//   }
//   //
// }

//Products list
// const cart = {};

// const addToCartButtons = document.getElementsByClassName("add-to-cart");
// const buttonCount = addToCartButtons.length;
// for (let i = 0; i < buttonCount; i++) {
//   addToCartButtons[i].addEventListener("click", function (event) {
//     if (cart[event.target.id] == undefined) {
//       console.log((cart[event.target.id] = 1));
//     } else {
//       console.log(cart[event.target.id]++);
//     }
//   });
// }

// const sectionProduct = document.querySelector(".section-product");
// const productNumber = document.getElementsByClassName("product-num");
// const addToCartButtons = document.getElementsByClassName("add-to-cart");
// const cart = document.getElementById("dropdown-content");

// fetch("pizzas.json")
//   .then((response) => {
//     return response.json();
//   })
//   .then((data) => renderProducts(data))
//   .catch((err) => {
//     // Do something for an error here
//   });

// function renderProducts(data) {
//   data.products.forEach((products) => {
//     sectionProduct.innerHTML += `
//               <article>
//                 <img src="images/${products.image}" alt="example"  />
//                 <a href="#" class="product-name">${products.name}</a>
//                 <div class="product-price">
//                   <span>${products.price}<span>Ft</span></span>
//                   <input type="number" value="1" min="1" max="10" class="product-num">
//                   <span>db</span>
//                 </div>
//                 <button onclick="renderToCart(${products.id})" type="submit" class="add-to-cart">Kosárba</button>
//               </article>`;
//   });

//   for (let i = 0; i < productNumber.length; i++) {
//     productNumber[i].addEventListener("input", (e) => {
//       console.log(e.target.value);
//     });
//   }
// }

// async function renderToCart(id) {
//   const response = await fetch("pizzas.json");
//   const data = await response.json();
//   data.products.forEach((products) => {
//     if (products.id == id) {
//       cart.innerHTML += `
//       <div style="display:flex; gap: 1rem; align-items:center;"><div style="display:flex; align-items:center; gap:1rem;"><span>${products.id}</span><span>${products.name}</span> </div>
//         <img width="30" src="images/${products.image}">
//         <button style="background-color:red" onclick="deleteCart()" class="delete-button"><i class="fa fa-trash"></i></button>
//       </div>
//       `;
//     }
//   });
// }

// function addToCart(data){
//   console.log(data.products[id])
//}
// async function doWork() {
//     const response = await fetch("pizzas.json")
//     .then((response) => {
//       return response.json();
//     })
//     .then((data) => data.products)
//     .catch((err) => {
//       // Do something for an error here
//     });

//     return await response;
//   }

//   console.log(doWork())
