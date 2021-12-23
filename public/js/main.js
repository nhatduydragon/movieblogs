var list = document.querySelectorAll("img");
for (index = 1; index < list.length; ++index) {
     list[index].classList.add("img-fluid");
     list[index].style.width = "auto";
     list[index].style.height = "auto";
}
