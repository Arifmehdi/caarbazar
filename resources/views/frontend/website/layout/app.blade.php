@include('frontend.website.layout.header')
@include('frontend.website.layout.topbar')
@include('frontend.website.layout.sidebar')
@stack('css')
<style>
    /* Basic styling for the modal */
    #locationModal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.5);
    }



    @media (max-width: 991px) {
    .horizontalMenu > .horizontalMenu-list > li > a.active {
        background-color: rgb(3, 154, 165);
        color: white !important;
    }

    .horizontalMenu > .horizontalMenu-list > li.active > ul.sub-menu > li.active {
        background-color: rgb(3, 154, 165);
        color: white !important;
    }

}


/* location modal design  start*/


#locationModal.show {
    opacity: 1;
}

#locationModalContent {
    background-color: #fff;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    text-align: center;
    max-width: 400px;
    width: 100%;
    margin: 15% auto;
}

#locationModalContent p {
    font-size: 18px;
    margin-bottom: 20px;
    color: #333;
}

#locationModalContent p span {
    color: #ff5722;
}

#denyLocation, #allowLocation {
    border: none;
    padding: 10px 20px;
    margin: 5px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 16px;
}

#denyLocation {
    background-color: #f44336;
    color: #fff;
}

#denyLocation:hover {
    background-color: #d32f2f;
}

#allowLocation {
    background-color: #4caf50;
    color: #fff;
}

#allowLocation:hover {
    background-color: #388e3c;
}



/* location modal design  End*/


#locationModal {
    display: none; /* Initially hidden */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* semi-transparent background */
    justify-content: center;
    align-items: center;
    animation: fadeIn 0.5s ease forwards; /* Animation for fade-in */
}

#locationModalContent {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    max-width: 400px;
    text-align: center;
    animation: slideUp 0.5s ease forwards; /* Animation for sliding up */
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideUp {
    from {
        transform: translateY(30px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}


#footer_copyright p a{
    color: white;
}

#footer_copyright p a:hover
{
    color: rgb(18, 176, 197) !important;
    list-style-type: square;
}
</style>
<body>
    <div id="body-overlay" class="body-overlay"></div>
    @yield('content')

      <!-- Location Access Modal -->


  </body>



@include('frontend.website.layout.footer')


@stack('js')

