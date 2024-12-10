<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <title>@yield('meta_title', config('app.name'))</title>
    <meta name="description" content="@yield('meta_description', 'Discover the top businesses, services, and local companies in Fujairah. Browse our Fujairah business directory for trusted listings today!')">
    <meta name="keywords" content="@yield('meta_keywords', 'Fujairah business directory,Fujairah companies,Business listings in Fujairah')">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/template/fav.png') }}">
    <link href="{{ asset('assets/css/style.css') }}?v=5.0.0" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/chat.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/accessibility.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="@yield('meta_title', 'Fujtown Fujairah Business Directory')">
        <meta property="og:description" content="@yield('meta_description', 'Discover the top businesses, services, and local companies in Fujairah. Browse our Fujairah business directory for trusted listings today!')">
        <meta property="og:image" content="@yield('image', asset('assets/imgs/template/fav.png'))">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta name="twitter:card" content="summary_large_image">

    @yield('additional_css')
  </head>
  <body>
  <div id="chatWrapper">
    <!-- Chat Button -->
    <button id="chatButton">Chat</button>

    <!-- Chat Container -->
    <div id="chatContainer">
        <div id="chatbox"></div>
        <div id="chatInputContainer">
            <input type="text" id="userInput" class="form-control" placeholder="Type your message...">
            <button id="sendButton" class="btn btn-brand-1">Send</button>
        </div>
    </div>
</div>
 
  <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="page-loading">
            <div class="page-loading-inner">
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- include Header Here -->
    @include('front.inc.header')
    @include('front.inc.mobile-header')


            
        @yield('content')

  @include('front.inc.footer')
<script src="{{asset('assets/js/vendors/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/waypoints.js')}}"></script>
    <script src="{{asset('assets/js/vendors/wow.js')}}"></script>
    <script src="{{asset('assets/js/vendors/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/vendors/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/isotope.js')}}"></script>
    <script src="{{asset('assets/js/vendors/scrollup.js')}}"></script>
    <script src="{{asset('assets/js/vendors/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/noUISlider.js')}}"></script>
    <script src="{{asset('assets/js/vendors/slider.js')}}"></script>
    <!-- Count down-->
    <script src="{{asset('assets/js/vendors/counterup.js')}}"></script>
    <script src="{{asset('assets/js/vendors/jquery.countdown.min.js')}}"></script>
    <!-- Count down-->
    <script src="{{asset('assets/js/vendors/jquery.elevatezoom.js')}}"></script>
    <script src="{{asset('assets/js/vendors/slick.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="{{asset('assets/js/main.js?v=5.0.0')}}"></script>
    <script src="{{asset('assets/js/ali-animation.js')}}?v=1.0.0"></script>
   
    @yield('script')
    @stack('scripts')

   <script>

document.addEventListener("DOMContentLoaded", function () {
    const banner = document.getElementById("cookie-banner");
    const acceptButton = document.getElementById("accept-cookies");
    const rejectButton = document.getElementById("reject-cookies");

    // Check if cookie preference is already set
    if (!localStorage.getItem("cookieConsent")) {
        // Show the banner after 3 seconds
        setTimeout(() => {
            banner.style.display = "block";
        }, 3000); // 3000 milliseconds = 3 seconds
    }

    // Handle "Confirm" button click
    acceptButton.addEventListener("click", function () {
        localStorage.setItem("cookieConsent", "accepted");
        banner.style.display = "none";
    });

    // Handle "Cancel" button click
    rejectButton.addEventListener("click", function () {
        localStorage.setItem("cookieConsent", "rejected");
        banner.style.display = "none";
    });
});



       function toggleReciteHeader() {
    const reciteHeader = document.getElementById('reciteHeader');
    if (reciteHeader.style.display === 'none') {
        reciteHeader.style.display = 'block';
    } else {
        reciteHeader.style.display = 'none';
    }
}

function confirmCloseAccessibility() {
    const userConfirmed = confirm("Are you sure you want to close accessibility tools?");
    if (userConfirmed) {
        document.getElementById('reciteHeader').style.display = 'none';
    }
}
   </script>
    <script>
    $(document).ready(function() {
        // Store the original font sizes as a data attribute for each element
        $('body p, body h1, body h2, body h3, body h4, body h5, body h6, body span, body a, body li').each(function() {
            const originalFontSize = $(this).css('font-size');
            $(this).data('original-font-size', originalFontSize); // Store original font size
        });

        // Decrease font size by 1px on button click
        $('.btn-minus').click(function() {
            $('body p, body h1, body h2, body h3, body h4, body h5, body h6, body span, body a, body li').each(function() {
                let currentFontSize = parseInt($(this).css('font-size'));
                let newFontSize = currentFontSize - 1;
                $(this).css('font-size', newFontSize + 'px').css('font-size', newFontSize + 'px', 'important');
            });
        });

        // Increase font size by 1px on button click
        $('.btn-plus').click(function() {
            $('body p, body h1, body h2, body h3, body h4, body h5, body h6, body span, body a, body li').each(function() {
                let currentFontSize = parseInt($(this).css('font-size'));
                let newFontSize = currentFontSize + 1;
                $(this).css('font-size', newFontSize + 'px').css('font-size', newFontSize + 'px', 'important');
            });
        });

        // Reset font size to original on reset button click
        $('.btn-reset').click(function() {
            $('body p, body h1, body h2, body h3, body h4, body h5, body h6, body span, body a, body li').each(function() {
                const originalFontSize = $(this).data('original-font-size');
                $(this).css('font-size', originalFontSize).css('font-size', originalFontSize, 'important');
            });
        });

          // Apply default white cursor class on page load
    $('body').addClass('white-cursor');

           // Show the modal
    $('#openModal').click(function() {
        $('#cursorModal').show();
    });
    
    // Close the modal
    $('.close').click(function() {
        $('#cursorModal').hide();
    });

    // Reset to default
    $('#resetCursor').click(function() {
        $('body').removeClass('small-cursor medium-cursor large-cursor xlarge-cursor white-cursor black-cursor');
    });

    // Apply cursor changes based on the selected options
    $('input[name="cursorSize"]').change(function() {
        // Remove existing size classes
        $('body').removeClass('small-cursor medium-cursor large-cursor xlarge-cursor');
        
        // Add the selected size class
        let selectedSize = $(this).val() + '-cursor';
        $('body').addClass(selectedSize);
    });

    $('input[name="cursorColor"]').change(function() {
        // Remove existing color classes
        $('body').removeClass('white-cursor black-cursor');
        
        // Add the selected color class
        let selectedColor = $(this).val() + '-cursor';
        $('body').addClass(selectedColor);
    });
 
 
    });

    document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("colorThemeModal");
    const btn = document.querySelector(".btn-color");
    const span = document.querySelector(".close-modal");
    const colorOptions = document.querySelectorAll(".color-option");
    const body = document.body;

    // Open the modal when the button is clicked
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Close the modal when the close button (x) is clicked
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Apply the background color to all elements inside the body except colorThemeModal
    colorOptions.forEach(option => {
        option.addEventListener("click", function() {
            const color = this.getAttribute("data-color");
            const allElements = document.querySelectorAll("body *");

            allElements.forEach(element => {
                // Apply background color only if the element is not within the modal
                if (!modal.contains(element)) {
                    element.style.backgroundColor = color;
                }
            });

            modal.style.display = "none";
        });
    });


    // Enable monochrome mode
    document.getElementById("enableMonochrome").addEventListener("click", function() {
        body.style.filter = "grayscale(100%)";
        modal.style.display = "none";
    });

   // Reset to default settings
   document.getElementById("resetDefault").addEventListener("click", function() {
        const allElements = document.querySelectorAll("body *");

        allElements.forEach(element => {
            if (!modal.contains(element)) {
                element.style.backgroundColor = ""; // Reset background color
            }
        });

        document.body.style.filter = "none";
        modal.style.display = "none";
    });

      // Function to handle text-to-speech
      function speakText(text) {
        const speech = new SpeechSynthesisUtterance(text);
        speech.lang = "en-US"; // Set language (you can change this based on requirements)
        window.speechSynthesis.speak(speech);
    }

    // Listen for mouseup events to detect text selection
    document.addEventListener("mouseup", function() {
        const selectedText = window.getSelection().toString().trim();
        
        // If text is selected, speak the selected text
        if (selectedText) {
            speakText(selectedText);
        }
    });

    // Optional: Stop speech if new text is selected
    document.addEventListener("mousedown", function() {
        if (window.speechSynthesis.speaking) {
            window.speechSynthesis.cancel(); // Stop any ongoing speech
        }
    });
});
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,es,fr,de,zh-CN,ar,hi,ur,bn'
        }, 'google_translate_element');
    }
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("languageModal");
    const btnLanguage = document.querySelector(".btn-language");
    const closeModal = document.querySelector(".close");
    const translateButton = document.getElementById("translateButton");
    const languageSelect = document.getElementById("languageSelect");

    // Show modal on button click
    btnLanguage.addEventListener("click", function() {
        modal.style.display = "block";
    });

    // Hide modal on close button click
    closeModal.addEventListener("click", function() {
        modal.style.display = "none";
    });

    // Hide modal when clicking outside of the modal
    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    // Handle translation on button click
    translateButton.addEventListener("click", function() {
        const selectedLanguage = languageSelect.value;

        // Change Google Translate language
        const googleTranslateFrame = document.querySelector(".goog-te-combo");
        if (googleTranslateFrame) {
            googleTranslateFrame.value = selectedLanguage;
            googleTranslateFrame.dispatchEvent(new Event("change"));
        }

        modal.style.display = "none"; // Close the modal after selection
    });

 

});

</script>

<script>
    $(document).ready(function () {
        // Show/hide chatbox when the button is clicked
        $('#chatButton').click(function () {
            $('#chatContainer').toggle();
        });

        // Send message on button click or Enter key
        $('#sendButton').click(function () {
            sendMessage();
        });

        $('#userInput').keypress(function (e) {
            if (e.which === 13) {
                sendMessage();
            }
        });

        // Function to send a message
        function sendMessage() {
            let userInput = $('#userInput').val().trim();
            if (userInput === '') return;

            $('#chatbox').append('<div class="user-message"><strong>You:</strong> ' + userInput + '</div>');

            $.ajax({
                url: '{{ route("chat.respond") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    message: userInput
                },
                success: function (response) {
                    $('#chatbox').append('<div class="bot-message"><strong>Bot:</strong> ' + response.response + '</div>');
                    $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);
                },
                error: function () {
                    $('#chatbox').append('<div class="bot-message"><strong>Bot:</strong> Sorry, there was an error processing your request.</div>');
                }
            });

            $('#userInput').val('');
        }

        // Click on any message to get a response
        $('#chatbox').on('click', '.user-message, .bot-message', function () {
            let messageText = $(this).text().replace('You: ', '').replace('Bot: ', '').trim();
            $('#userInput').val(messageText);
            sendMessage();
        });
    });
</script>
  </body>
</html>