Dropzone.options.myAwesomeDropzone = {
    url: '/your-upload-url', // Change this to your actual upload URL
    autoProcessQueue: false, // Prevent immediate upload to manually control the process
    previewsContainer: '#file-previews', // Container for file previews
    clickable: '.dz-message', // Let the message area be clickable
    acceptedFiles: 'image/*', // Limit to images only
    addRemoveLinks: true, // Show remove links for each file preview

    // Customize preview template (optional)
    previewTemplate: `<div class="dz-preview dz-file-preview">
                          <div class="dz-image"><img data-dz-thumbnail /></div>
                          <div class="dz-details">
                              <div class="dz-filename"><span data-dz-name></span></div>
                              <div class="dz-size" data-dz-size></div>
                          </div>
                          <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                          <div class="dz-error-message"><span data-dz-errormessage></span></div>
                          <button class="dz-remove" data-dz-remove>Remove</button>
                      </div>`, // You can customize how the previews look

    init: function () {
        var myDropzone = this;

        // Optional: Handle the upload via a button
        document.getElementById("submit-all").addEventListener("click", function () {
            myDropzone.processQueue(); // Manually trigger upload
        });

        // If you need to do something with uploaded files
        myDropzone.on("success", function (file, response) {
            console.log("File uploaded successfully: ", response);
        });

        // Optional: Remove file from preview list if "Remove" button is clicked
        myDropzone.on("removedfile", function (file) {
            console.log("File removed: ", file);
        });

        // Display any errors
        myDropzone.on("error", function (file, errorMessage) {
            console.log("Error uploading file: ", errorMessage);
        });
    }
};
