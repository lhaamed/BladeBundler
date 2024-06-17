


document.addEventListener('DOMContentLoaded', function() {


    let allPasswordSwitcherElements = document.querySelectorAll('.password-switcher-bbjs');
    for (const eachPass of allPasswordSwitcherElements) {
        eachPass.nextElementSibling.addEventListener('click', function (e) {
            let button = e.target.closest('button');
            let input = button.previousElementSibling;
            if (input.type === "text") {
                input.type = "password";
                button.style.opacity = 1;
            } else {
                input.type = "text";
                button.style.opacity = .5;
            }
        })
    }



    // Function to handle the image preview
    function previewImage(event, previewId, defaultPreviewSrc) {
        const file = event.target.files[0];
        const img = document.getElementById(previewId);

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            img.src = defaultPreviewSrc;
            alert('Please select a valid image file.');
        }
    }

    // Get all file inputs
    const fileInputs = document.querySelectorAll('.picture-preview-input-js');

    // Attach change event listener to each file input
    fileInputs.forEach(function(input) {
        console.log('salam');
        const previewId = input.previousElementSibling.id;
        const defaultPreviewSrc = input.previousElementSibling.src;

        input.addEventListener('change', function(event) {
            previewImage(event, previewId, defaultPreviewSrc);
        });
    });
});


/*======== 7. MULTIPLE SELECT ========*/
$(".js-example-basic-multiple").select2();
