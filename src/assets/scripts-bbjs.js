window.onload = function (){
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
}
