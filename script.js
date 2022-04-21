document.addEventListener('DOMContentLoaded', () => {
  const $nav = document.getElementById('nav');
  const $navBurger = document.getElementById('nav-burger');
  const $navSearchBar = document.getElementById('nav-search-bar');

 //click events
  $navBurger.addEventListener('click', () => {
    $nav.classList.toggle('is-active');
    $navCancel.classList.toggle('is-active');
  });
  $navSearchBar.addEventListener('blur', ()=>{
    $navSearch.classList.toggle('is-hidden');
    // $navSearchCancel.classList.toggle('is-hidden');
    $navSearchBtn.classList.toggle('is-hidden');
    // $navSearchBar.classList.toggle('is-hidden');
  })
});