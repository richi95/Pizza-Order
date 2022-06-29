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

window.onload = () => {
  const tabSwitchers = document.querySelectorAll(".tab");
  for (let i = 0; i < tabSwitchers.length; i++) {
    const tabSwitcher = tabSwitchers[i];
    const pageId = tabSwitcher.dataset.tab;
    tabSwitcher.addEventListener("click", function (e) {
      document.querySelector(".tabs .tab.active").classList.remove("active");
      tabSwitcher.classList.add("active");

      switchPage(pageId);
    });
  }
};

window.onload = () => {
  const tabSwitchers = document.querySelectorAll(".tab-buy");
  for (let i = 0; i < tabSwitchers.length; i++) {
    const tabSwitcher = tabSwitchers[i];
    const pageId = tabSwitcher.dataset.tab;
    console.log(pageId);
    if (tabSwitcher.classList.contains("active")) {
      const nextPage = document.querySelector(
        `.main-content .page[data-page="${pageId}"]`
      );
      nextPage.classList.add("show");
      return;
    } else {
      const nextPage = document.querySelector(
        `.main-content .page[data-page="${pageId}"]`
      );
      nextPage.classList.add("remove");
    }
  }
};

// function switchPage(pageId){
//   // const currentPage = document.querySelector('.main-content .page.show')
//   // currentPage.classList.remove('show')

//   const nextPage = document.querySelector(`.main-content .page[data-page="${pageId}"]`)
//   nextPage.classList.add('show')

// }
