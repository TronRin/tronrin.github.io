const imgElement = document.getElementById('webcomic_page');
// Resize Image
function resizeImage(imgElement, targetWidth, targetHeight) {
  // Calculate the aspect ratio of the image
  const aspectRatio = imgElement.naturalWidth / imgElement.naturalHeight;

  // Set the width and height of the image element
  imgElement.width = targetWidth;
  imgElement.height = targetHeight;

  // Check if the aspect ratio of the image is wider than the target aspect ratio
  if (aspectRatio > (targetWidth / targetHeight)) {
    // If the aspect ratio is wider, constrain the width and adjust the height to maintain the aspect ratio
    imgElement.width = targetWidth;
    imgElement.height = targetWidth / aspectRatio;
  } else {
    // If the aspect ratio is taller, constrain the height and adjust the width to maintain the aspect ratio
    imgElement.width = targetHeight * aspectRatio;
    imgElement.height = targetHeight;
  }
}
// Save the current page to session storage when it is changed
function saveCurrentPage(page) {
	sessionStorage.setItem('currentPage', page);
	// Update the current page number (cross-browser)
	document.getElementById('current_page').textContent = page;
}

// Load the selected page
function loadPage(page) {
  const webcomicPage = document.getElementById('webcomic_page');
  webcomicPage.src = `./webcomics/webcomic_1/page_${String(page).padStart(3, '0')}.png`;


function addWebcomicPageEventListener() {
  // Add an event listener to open the image in full size when clicked
  webcomicPage.addEventListener('click', () => {
    window.open(webcomicPage.src);
  });
}

// Call the function after the image has finished loading
webcomicPage.onload = addWebcomicPageEventListener;
// Update the current page number display
	document.getElementById('current_page').innerText = page;
  resizeImage(imgElement, 1600, 1600);
  // Save the current page to session storage
  saveCurrentPage(page);
}

// Load the first page of the webcomic when the page is initially loaded
window.onload = function() {
	loadPage(1);
};

// Load the previous page
function loadPrevPage() {
	const page = document.getElementById('webcomic_page').src.match(/webcomics\/webcomic_1\/page_(\d+).png/)[1];
	const prevPage = parseInt(page) - 1;
	if (prevPage > 0) {
		loadPage(prevPage);
		// Save the current page to session storage
		saveCurrentPage(prevPage);
		// Resize comic page
		resizeImage(imgElement, 1600, 1600);
	}
}

// Load the next page
function loadNextPage() {
	const page = document.getElementById('webcomic_page').src.match(/webcomics\/webcomic_1\/page_(\d+).png/)[1];
	const nextPage = parseInt(page) + 1;
	loadPage(nextPage);
	// Save the current page to session storage
	saveCurrentPage(nextPage);
	// Resize comic page	
	resizeImage(imgElement, 1600, 1600);
// Load the current page from session storage when the page is initially loaded
// Load the first page of the webcomic when the page is initially loaded
window.onload = function() {
  // Check if there is a saved page in the session storage
  const savedPage = sessionStorage.getItem('currentPage');
  if (savedPage) {
    // Load the saved page
    loadPage(savedPage);
  } else {
    // Load the first page
    loadPage(1);
  }
};
}
// Go to the specified page
function goToPage() {
  // Get the page number from the input field
  const page = document.getElementById('page_input').value;

  // Load the specified page
  loadPage(page);

  // Save the current page to session storage
  saveCurrentPage(page);
}

