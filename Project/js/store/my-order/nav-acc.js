// Start:  add or remove active class base on url. Modified 11/18/2023 by Quyen
const currentLocation = location.href;
const menuItem = document.querySelectorAll('.nav-item'); 
const menuLength = menuItem.length;

for (let i = 0; i < menuLength; i++){
  if(menuItem[i].href === currentLocation){
    menuItem[i].className += ' active';
  }

  if (currentLocation.includes("my-order-detail.php") && i == 1){
    menuItem[i].className += ' active';
  }

  if (currentLocation.includes("my-order-feedback.php") && i == 1){
    menuItem[i].className += ' active';
  }
}

// End:  add or remove active class base on url
