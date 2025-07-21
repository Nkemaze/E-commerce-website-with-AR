document.addEventListener('DOMContentLoaded', function() {
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');
    const cartItems = document.getElementById('cartItems');
    const clearCartBtn = document.getElementById('clearCart');
    const checkoutBtn = document.querySelector('.btn-checkout');
    
    let itemsCount = 0;
    let cartItemsArray = [];
    
    // Handle drag and drop events
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
      dropZone.addEventListener(eventName, preventDefaults, false);
    });
    
    function preventDefaults(e) {
      e.preventDefault();
      e.stopPropagation();
    }
    
    ['dragenter', 'dragover'].forEach(eventName => {
      dropZone.addEventListener(eventName, highlight, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
      dropZone.addEventListener(eventName, unhighlight, false);
    });
    
    function highlight() {
      dropZone.classList.add('highlight');
    }
    
    function unhighlight() {
      dropZone.classList.remove('highlight');
    }
    
    // Handle dropped files
    dropZone.addEventListener('drop', handleDrop, false);
    
    function handleDrop(e) {
      const dt = e.dataTransfer;
      const files = dt.files;
      handleFiles(files);
    }
    
    // Handle selected files
    fileInput.addEventListener('change', function() {
      handleFiles(this.files);
    });
    
    // Process uploaded files
    function handleFiles(files) {
      if (files.length > 0) {
        // Remove empty cart message if it exists
        const emptyCart = document.querySelector('.empty-cart');
        if (emptyCart) {
          emptyCart.remove();
        }
        
        for (let i = 0; i < files.length; i++) {
          const file = files[i];
          
          // Check if file is an image
          if (!file.type.match('image.*')) {
            continue;
          }
          
          // Check file size (max 5MB)
          if (file.size > 5 * 1024 * 1024) {
            alert(`File ${file.name} is too large (max 5MB)`);
            continue;
          }
          
          const reader = new FileReader();
          
          reader.onload = function(e) {
            // Create cart item
            const itemId = Date.now() + i;
            const item = {
              id: itemId,
              name: file.name,
              size: formatFileSize(file.size),
              src: e.target.result
            };
            
            cartItemsArray.push(item);
            renderCartItem(item);
            updateCartCount();
          };
          
          reader.readAsDataURL(file);
        }
      }
    }
    
    // Render cart item to DOM
    function renderCartItem(item) {
      const itemElement = document.createElement('div');
      itemElement.className = 'cart-item';
      itemElement.dataset.id = item.id;
      
      itemElement.innerHTML = `
        <img src="${item.src}" alt="${item.name}" class="item-image">
        <div class="item-details">
          <div class="item-name">${item.name}</div>
          <div class="item-size">${item.size}</div>
        </div>
        <div class="item-remove" data-id="${item.id}">
          <i class="fas fa-times"></i>
        </div>
      `;
      
      cartItems.appendChild(itemElement);
      
      // Add event listener to remove button
      itemElement.querySelector('.item-remove').addEventListener('click', function() {
        removeItem(item.id);
      });
    }
    
    // Remove item from cart
    function removeItem(id) {
      // Remove from array
      cartItemsArray = cartItemsArray.filter(item => item.id !== id);
      
      // Remove from DOM
      const itemToRemove = document.querySelector(`.cart-item[data-id="${id}"]`);
      if (itemToRemove) {
        itemToRemove.remove();
      }
      
      updateCartCount();
      
      // Show empty cart message if no items left
      if (cartItemsArray.length === 0) {
        showEmptyCart();
      }
    }
    
    // Clear all items
    clearCartBtn.addEventListener('click', function() {
      cartItemsArray = [];
      cartItems.innerHTML = '';
      showEmptyCart();
      updateCartCount();
    });
    
    // Show empty cart message
    function showEmptyCart() {
      cartItems.innerHTML = `
        <div class="empty-cart">
          <i class="fas fa-images"></i>
          <p>Your cart is empty</p>
          <p>Upload some images to get started</p>
        </div>
      `;
    }
    
    // Update cart count in checkout button
    function updateCartCount() {
      itemsCount = cartItemsArray.length;
      checkoutBtn.innerHTML = `<i class="fas fa-shopping-cart"></i> Checkout (${itemsCount})`;
    }
    
    // Format file size
    function formatFileSize(bytes) {
      if (bytes === 0) return '0 Bytes';
      const k = 1024;
      const sizes = ['Bytes', 'KB', 'MB'];
      const i = Math.floor(Math.log(bytes) / Math.log(k));
      return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
    }
    
    // Checkout button functionality
    checkoutBtn.addEventListener('click', function() {
      if (itemsCount === 0) {
        alert('Your cart is empty!');
        return;
      }
      
      // In a real app, you would send the images to your server here
      console.log('Checking out with items:', cartItemsArray);
      alert(`Checking out with ${itemsCount} image(s)`);
      
      // Optional: Clear cart after checkout
      // cartItemsArray = [];
      // cartItems.innerHTML = '';
      // showEmptyCart();
      // updateCartCount();
    });
  });

  // Handle size selection
function toggleSize(button) {
  button.classList.toggle('selected');
  updateSelectedSizes();
}

function updateSelectedSizes() {
  const selectedButtons = document.querySelectorAll('.size.selected');
  const selectedSizes = Array.from(selectedButtons).map(btn => btn.dataset.size);
  document.getElementById('selectedSizes').value = JSON.stringify(selectedSizes);
}

// File upload handling
const dropZone = document.getElementById('dropZone');
const fileInput = document.getElementById('fileInput');
const galleryInput = document.getElementById('galleryInput');
const cartItems = document.getElementById('cartItems');
const clearCart = document.getElementById('clearCart');

// Handle drag and drop
dropZone.addEventListener('click', () => {
  fileInput.click();
});

fileInput.addEventListener('change', handleFiles);
galleryInput.addEventListener('change', handleGalleryFiles);

dropZone.addEventListener('dragover', (e) => {
  e.preventDefault();
  dropZone.classList.add('dragover');
});

dropZone.addEventListener('dragleave', () => {
  dropZone.classList.remove('dragover');
});

dropZone.addEventListener('drop', (e) => {
  e.preventDefault();
  dropZone.classList.remove('dragover');
  
  if (e.dataTransfer.files.length > 0) {
      fileInput.files = e.dataTransfer.files;
      handleFiles({ target: fileInput });
  }
});

function handleFiles(e) {
  const files = e.target.files;
  if (files.length > 0) {
      // Clear existing empty state
      const emptyCart = cartItems.querySelector('.empty-cart');
      if (emptyCart) {
          emptyCart.remove();
      }
      
      // Display the main image
      const file = files[0];
      const reader = new FileReader();
      
      reader.onload = function(event) {
          const imgContainer = document.createElement('div');
          imgContainer.className = 'cart-item';
          imgContainer.innerHTML = `
              <div class="cart-item-img">
                  <img src="${event.target.result}" alt="${file.name}">
              </div>
              <div class="cart-item-info">
                  <p>Main Product Image</p>
                  <span>${file.name}</span>
              </div>
          `;
          cartItems.prepend(imgContainer);
      };
      
      reader.readAsDataURL(file);
      
      // Now trigger the gallery input
      galleryInput.click();
  }
}

function handleGalleryFiles(e) {
  const files = e.target.files;
  if (files.length > 0) {
      // Clear existing empty state if it's still there
      const emptyCart = cartItems.querySelector('.empty-cart');
      if (emptyCart) {
          emptyCart.remove();
      }
      
      Array.from(files).forEach(file => {
          const reader = new FileReader();
          
          reader.onload = function(event) {
              const imgContainer = document.createElement('div');
              imgContainer.className = 'cart-item';
              imgContainer.innerHTML = `
                  <div class="cart-item-img">
                      <img src="${event.target.result}" alt="${file.name}">
                  </div>
                  <div class="cart-item-info">
                      <p>Gallery Image</p>
                      <span>${file.name}</span>
                  </div>
              `;
              cartItems.appendChild(imgContainer);
          };
          
          reader.readAsDataURL(file);
      });
  }
}

// Clear all images
clearCart.addEventListener('click', () => {
  cartItems.innerHTML = `
      <div class="empty-cart">
          <i class="fas fa-images"></i>
          <p>Your cart is empty</p>
          <p>Upload some images to get started</p>
      </div>
  `;
  fileInput.value = '';
  galleryInput.value = '';
});