
    // Access the file input and preview elements
    const avatarInput = document.getElementById('avatar');
    const previewDiv = document.getElementById('file-previews');
    const previewImage = document.getElementById('preview-image');
    const removeLink = document.getElementById('remove-photo');
    const uploadText = document.getElementById('upload-text');

    // Handle file selection
    avatarInput.addEventListener('change', function () {
        const file = this.files[0];

        // Check if the user selected a file
        if (file) {
            const reader = new FileReader();

            // Load and display the image in the preview
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewDiv.style.display = 'block'; // Show the preview div
                uploadText.style.display = 'none'; // Hide the upload text
            }

            reader.readAsDataURL(file);
        }
    });

    // Handle removing the selected photo
    removeLink.addEventListener('click', function () {
        avatarInput.value = ''; // Clear the input value
        previewImage.src = ''; // Clear the preview image
        previewDiv.style.display = 'none'; // Hide the preview div
        uploadText.style.display = 'block'; // Show the upload text
    });
