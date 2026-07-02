document.addEventListener("DOMContentLoaded", () => {

    const links = document.querySelectorAll(".menu-btn");

    links.forEach(link => {

        if (link.href === window.location.href) {

            link.style.backgroundColor = "#05538e";
            link.style.color = "#ffffff";

        }

    });

});