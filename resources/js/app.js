import lodash from 'lodash';
import '../sass/app.scss';
import './lightgallery';
import './lg-utils';
import './observers';

const {
    intersection
} = lodash;





window.addEventListener('load', (e) => {
    preload(e);



    function preload(e) {
        if (e) {
            document.body.classList.remove('preload');
        }
    }

});

document.addEventListener("DOMContentLoaded", function () {
        document.addEventListener('click', (e) => {

            closeModal(e);

            // cookie(e);
        });
        document.addEventListener('scroll', (e) => {

            scrollbar(e);

        });

        document.addEventListener('change', (e) => {

            overflowHidden(e);


        });

        function closeModal(e) {
            if (e.target.id == 'closeModal') {
                document.getElementById("showModal").remove('modal-active');
            }
        }


        function overflowHidden(e) {

            if (e.target.id == 'menuToggle') {

                if (e.target.checked) {
                    return document.body.classList.add('active');

                } else {
                    return document.body.classList.remove('active');
                }
            }

        };


        // Scrollbar
        function scrollbar(e) {
            if (e = window.screen.availWidth) {

                if (e > 767) {
                    if (document.documentElement.scrollTop > 1) {
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

lightGallery(document.getElementById('anchor-tag'));

lightGallery(document.querySelector("div.attachment-gallery"), {
    selector: 'a',
});
