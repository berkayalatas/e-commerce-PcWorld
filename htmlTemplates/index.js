$(document).ready(function () {

    // banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });

    // most popular products owl carousel

    $("#popular-products .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    //isotope filter
    let $grid = $(".grid").isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });

    // filter items on button click
    //select button-group class
    $(".button-group").on("click", "button", function () {
        let filterValue = $(this).attr('data-filter'); //get data from data attribute
        $grid.isotope({
            filter: filterValue
        }); //pass the attribute the this method
    })


    // new computers owl carousel
    $("#new-computers .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });


    // news owl carousel
    $("#news .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            710: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })

    //increase and decrease product of number
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    //let $input = $(".qty .qty_input");

    //click on qty up button
    $qty_up.click(function () {
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        if ($input.val() >= 1 && $input.val() <= 9) {
            $input.val((i, prevValue) => {
                return ++prevValue;
            });
        }
    });

    //click on qty down button
    $qty_down.click(function () {

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        if ($input.val() > 1 && $input.val() <= 10) {
            $input.val((i, prevValue) => {
                return --prevValue;
            });
        }
    });



    //WITH JS 

    // let up = document.querySelector(".qty .qty-up");
    // let down = document.querySelector(".qty .qty-down");
    // let input = document.querySelector(".qty .qty_input");


    // up.addEventListener("click", () => {

    //     if (input.value >= 1 && input.value <= 9)
    //         (input.value++);
    // })

    // down.addEventListener("click", () => {
    //     if (input.value > 1 && input.value <= 10)
    //         (input.value--);
    // })

});