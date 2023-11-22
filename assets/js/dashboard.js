function setActive(element) {
    var menuItems = document.querySelectorAll('#dmenu a');
    menuItems.forEach(item => {
        item.classList.remove('active');
    });
    element.classList.add('active');
}
document.addEventListener("DOMContentLoaded", function () {
    const animatedDiv = document.getElementById("animatedDiv");
    const notificationSound = document.getElementById("notificationSound");

    animatedDiv.style.opacity = "0";

    function animateDiv() {
        animatedDiv.style.opacity = "1";
        animatedDiv.style.left = "20px";

        // Play the notification sound
        notificationSound.play();

        setTimeout(() => {
            animatedDiv.style.left = "-200px";
            animatedDiv.style.opacity = ".3";
        }, 4000);
    }

    animateDiv();
});
