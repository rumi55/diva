window.addEventListener('load', (e) => {
    preload(e);


    function preload(e) {
        if(e) {
            document.body.classList.remove('preload');
        }
    }
});

document.addEventListener("DOMContentLoaded", function () {
        document.addEventListener('click', (e) => {

            // showUserModal(e);

            // cookie(e);
        });
        document.addEventListener('scroll', (e) => {

            scrollbar(e);

        });

        document.addEventListener('change', (e) => {

            overflowHidden(e);

        });




        function overflowHidden(e) {

            if (e.target.id == 'menuToggle') {

                if (e.target.checked) {
                    return document.body.classList.add('active');


                } else {
                    return document.body.classList.remove('active');
                }
            }

        }
        // Scrollbar
        function scrollbar(e) {
            if (e = window.screen.width) {

                if (e > 767) {
                    if (document.documentElement.scrollTop > 50) {
                        document.getElementById("header").className = "onscroll";
                    } else {
                        document.getElementById("header").className = "";
                    }
                } else {
                    if (document.documentElement.scrollTop > 1) {
                        document.getElementById("header").className = "onscroll";
                    } else {
                        document.getElementById("header").className = "";
                    }
                }
            }

        }
    }),







    //Lightgallery
require('./lightgallery')
require('./lg-utils')
lightGallery(document.getElementById('anchor-tag'));
