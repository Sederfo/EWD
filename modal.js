function openEditModal() {
  if (top.editMode) {
    editProductModal.style.display = "block";
  }
}

//called onClick on any product image, redirects to different modals based on edit mode and delete mode
function openProductModal(clicked_id) {
  if (top.editMode) {
    console.log("opening edit product modal");
    openEditProductModal(clicked_id);
  } else if (top.deleteMode) {
    console.log("opening delete product modal");
    openDeleteProductModal(clicked_id);
  } else {
    console.log("opening product details modal");
    openProductDetailsModal(clicked_id);
  }
}

function openAddProductModal() {
  var addProductModal = document.getElementById("addProductModal");
  closeEditMode();
  closeDeleteMode();
  addProductModal.style.display = "block";
}

function openDeleteProductModal(clicked_id) {
  idToDelete = clicked_id;
  var deleteProductModal = document.getElementById(
    "deleteProductModal" + clicked_id
  );
  deleteProductModal.style.display = "block";
}

function openEditProductModal(clicked_id) {
  idToEdit = clicked_id;
  var editProductModal = document.getElementById(
    "editProductModal" + clicked_id
  );
  editProductModal.style.display = "block";
}

function openProductDetailsModal(clicked_id) {
  var productDetailsModal = document.getElementById(
    "productDetailsModal" + clicked_id
  );
  productDetailsModal.style.display = "block";
}

function closeAddProductModal() {
  addProductModal.style.display = "none";
}

function closeDeleteProductModal(clicked_id) {
  var deleteProductModal = document.getElementById(
    "deleteProductModal" + clicked_id
  );
  deleteProductModal.style.display = "none";
}

function closeEditProductModal(clicked_id) {
  var editProductModal = document.getElementById(
    "editProductModal" + clicked_id
  );
  editProductModal.style.display = "none";
}

function closeProductDetailsModal(clicked_id) {
  console.log("closing modal", clicked_id);
  var productDetailsModal = document.getElementById(
    "productDetailsModal" + clicked_id
  );
  productDetailsModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  var modals = document.getElementsByClassName("modal");

  for (let modal of modals) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
};
