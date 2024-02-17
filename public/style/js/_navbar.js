const menu = document.getElementById("menu");
const dropdown = document.getElementById("dropdown");
dropdown.style.visibility = "hidden";
$active = false;

menu.addEventListener("mouseover", () => {
  if ($active == false) {
    dropdown.style.visibility = "visible";
    $active = true;
    return;
  } else {
    dropdown.style.visibility = "hidden";
    $active = false;
    return;
  }
});

const burger = document.getElementById("burger");
const menu_responsive = document.getElementById("element-responsive");
let isactive = false;
burger.addEventListener("click", () => {
  if (!isactive) {
    menu_responsive.className = "responsive_active";
    isactive = true;
    return;
  }
  if (isactive) {
    menu_responsive.className = "responsive_desactive";
    isactive = false;
    return;
  }
});
