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

// Load the selected page
function loadPage(page_) {
  const webcomicPage = document.getElementById('webcomic_page');
  webcomicPage.src = `./webcomics/webcomic_1/page_${String(page_).padStart(3, '0')}.png`;
  
  // Add an event listener to open the image in full size when clicked
  webcomicPage.addEventListener('click', () => {
    window.open(webcomicPage.src);
  });

  resizeImage(imgElement, 2048, 2048);
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
		resizeImage(imgElement, 2048, 2048);
	}
}

// Load the next page
function loadNextPage() {
	const page = document.getElementById('webcomic_page').src.match(/webcomics\/webcomic_1\/page_(\d+).png/)[1];
	const nextPage = parseInt(page) + 1;
	loadPage(nextPage);
	resizeImage(imgElement, 2048, 2048);
}