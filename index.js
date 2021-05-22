top.editMode = false;
top.deleteMode = false;

/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  top.editMode = false;
  top.deleteMode = false;
  closeEditMode();
  closeDeleteMode();
}

var products = document.getElementsByClassName("product");
function openEditMode() {
  closeDeleteMode();
  top.editMode = !top.editMode;
  console.log("Edit mode=", top.editMode);

  if (editMode) {
    for (let item of products) {
      item.style.opacity = 0.5;
    }
  } else {
    closeEditMode();
  }
}

function closeEditMode() {
  top.editMode = false;
  for (let item of products) {
    item.style.opacity = 1;
  }
}

function openDeleteMode() {
  closeEditMode();
  top.deleteMode = !top.deleteMode;
  console.log("Delete mode=", top.deleteMode);

  if (deleteMode) {
    for (let item of products) {
      item.style.filter = "grayscale(100%)";
    }
  } else {
    closeDeleteMode();
  }
}

function closeDeleteMode() {
  top.deleteMode = false;
  for (let item of products) {
    item.style.filter = "";
  }
}
