    //footer
    const header = document.querySelector("header");
    window.addEventListener("scroll", function() {
        /*
        Sie gibt die Anzahl der Pixel zurück, 
        um die das Dokument (die Webseite) vertikal 
        von oben im Browserfenster gescrollt wurde.
        */
        x = window.pageYOffset;
        if(x > 0) {
            header.classList.add("sticky");
        }
        else {
            header.classList.remove("sticky");
        }
    })

    //header
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img"); /*NodeList, wie Array*/
    const imgContainer = document.querySelector(".aspect-ratio-169");/*1. Element mit diesem Class*/
    const dotItem = document.querySelectorAll(".dot");

    let imgNumber = imgPosition.length;
    let index = 0;

    imgPosition.forEach(function (image, index) {
        image.style.left = index * 100 + "%";

        dotItem[index].addEventListener("click", function () {
            slider(index);
        })
    })

    function imgSlide() {
        /*Erhöhen Sie den Indexwert um 1, um zum nächsten Bild zu gelangen.*/
        index++;

        console.log(index);
        if (index >= imgNumber) { index = 0 }
        /*Verschieben Sie den Container nach links, indem Sie die Eigenschaft left ändern*/
        imgContainer.style.left = "-" + index * 100 + "%";
        slider(index);
    }

    function slider(index) {
        imgContainer.style.left = "-" + index * 100 + "%";
        const dotActive = document.querySelector(".active");
        dotActive.classList.remove("active");
        dotItem[index].classList.add("active");
    }

    /*Diese Funktion ruft die imgSlide-Funktion alle 5000 ms 
    (d. h. 5 Sekunden) auf und erstellt so eine Diashow, 
    die alle 5 Sekunden automatisch zwischen den Bildern wechselt.*/
    setInterval(imgSlide, 5000); 

    /*--- Menu slidebar cartegory */
    const itemSlidebar = document.querySelectorAll(".cartegory-left-li");
    itemSlidebar.forEach(function(menu,index) {
        menu.addEventListener("click", function(event) {
            event.preventDefault(); /* oder
            <li class="cartegory-left-li"><a href="#">Damen</a> 
            auch ähnlich mit # in Herren*/
            menu.classList.toggle("block");
        })
    })

    /* photos effects */
    const bigImg = document.querySelector(".product-content-left-big-img img");
    const smallImg = document.querySelectorAll(".product-content-left-small-img img");

    smallImg.forEach(function(imgItem, x) {
        imgItem.addEventListener("click", function() {
            bigImg.src = imgItem.src;
        })
    })

    /*--- product bottom ---*/
    const aufbewahrung = document.querySelector(".product-content-right-bottom-content-title-item.aufbewahrung");
    const detail = document.querySelector(".product-content-right-bottom-content-title-item.detail");

    if (aufbewahrung) {
        aufbewahrung.addEventListener("click", function() {
            document.querySelector(".product-content-right-bottom-content-detail").style.display = "none";
            document.querySelector(".product-content-right-bottom-content-aufbewahrung").style.display = "block";
        })
    }

    if (detail) {
        detail.addEventListener("click", function() {
            document.querySelector(".product-content-right-bottom-content-aufbewahrung").style.display = "none";
            document.querySelector(".product-content-right-bottom-content-detail").style.display = "block";
        })
    }

    const spanButton = document.querySelector(".product-content-right-bottom-top span");
    if(spanButton){
        spanButton.addEventListener("click", function() {
            // document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeProduct");
            // danach css für .activeProduct {display: none};
            const content = document.querySelector(".product-content-right-bottom-content-big")
            if (content.style.display === "none" || content.style.display === ""){
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        })
    }