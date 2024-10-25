(function ($) {
  ("use strict");

  //===== Prealoder

  $(window).on("load", function () {
    $("#preloader").addClass("zoom-out");
    setTimeout(function () {
      $("#preloader").hide();
      $("#main").show();
    }, 500);
  });

  //===== Initialize AOS

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1200,
      easing: "ease-in-out",
      once: true,
      mirror: false
    });
  });
  //===== Switch Between Sign-in and sign-up

  $("#sign-in-btn").on("click", function () {
    $("#sign-in-form").addClass("active");
    $("#sign-up-form").removeClass("active");
    $("#forget-password-form").removeClass("active");
    $(this).addClass("active border-bottom border-success");
    $("#sign-up-btn").removeClass("active border-bottom border-success");
  });

  $("#sign-up-btn").on("click", function () {
    $("#sign-up-form").addClass("active");
    $("#sign-in-form").removeClass("active");
    $("#forget-password-form").removeClass("active");
    $(this).addClass("active border-bottom border-success");
    $("#sign-in-btn").removeClass("active border-bottom border-success");
  });

  $("#forget-link").on("click", function () {
    $("#forget-password-form").addClass("active");
    $("#sign-in-form").removeClass("active");
    $("#sign-in-btn").removeClass("active border-bottom border-success");
  });

  //======== Search

  function Search() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = $("#Search");
    filter = input.val().toUpperCase();
    table = $("#Table");
    tr = table.find("tr");

    // Loop through all table rows, and hide those who don't match the search query
    tr.each(function () {
      td = $(this).find("td").eq(0);
      if (td.length) {
        txtValue = td.text() || td.text();
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      }
    });
  }

  $("#Search").on("keyup", Search);

  //============================chat bot start================================================


  // Flag to prevent multiple simultaneous requests
  var running = false;

  // Event handler for the send button click
  $('.input-send').on('click', function () {
    send();
  });

  // Function to send the user's message to the Flask API
  function send() {
    // Check if a request is already in progress
    if (running) return;

    // Get the message from the input field
    var msg = $("#message").val();

    // Do nothing if the message is empty
    if (msg === "") return;

    // Set flag to indicate a request is in progress
    running = true;

    // Add the sent message to the chat window
    addMsg(msg);

    // Send the message to the Flask API using AJAX
    $.ajax({
      url: 'http://127.0.0.1:5000/chat',  // API endpoint
      type: 'POST',  // HTTP method
      contentType: 'application/json',  // Data type
      data: JSON.stringify({ message: msg }),  // Convert message to JSON
      success: function (response) {
        // Log success response and add it to the chat window
        console.log("Success:", response);
        addResponseMsg(response.answer);
      },
      error: function (xhr, status, error) {
        // Log error and display an error message
        console.error("Error:", status, error);
        console.log("Response:", xhr.responseText);
        addResponseMsg("An error occurred. Please try again.");
      },
      complete: function () {
        // Reset flag after request completes
        running = false;
      }
    });
  }

  // Function to add the sent message to the chat window
  function addMsg(msg) {
    // Create a new div element for the sent message
    var div = $("<div>").html(
      "<span style='flex-grow:1'></span><div class='chat-message-sent'>" +
      msg +
      "</div>"
    );
    div.addClass("chat-message-div");

    // Append the message to the chat window and scroll to the bottom
    $("#message-box").append(div);
    $("#message").val("");  // Clear the input field
    $("#message-box").scrollTop($("#message-box")[0].scrollHeight);  // Scroll to the bottom
  }

  // Function to add the received message to the chat window
  function addResponseMsg(msg) {
    // Create a new div element for the received message
    var div = $("<div>").html(
      "<div class='chat-message-received'>" + msg + "</div>"
    );
    div.addClass("chat-message-div");

    // Append the response message to the chat window and scroll to the bottom
    $("#message-box").append(div);
    $("#message-box").scrollTop($("#message-box")[0].scrollHeight);  // Scroll to the bottom
  }

  // Event handler for the Enter key press in the message input field
  $("#message").on("keyup", function (event) {
    if (event.keyCode === 13) {  // Enter key
      event.preventDefault();  // Prevent the default action (e.g., form submission)
      send();  // Call send function
    }
  });

  // Event handler for the chatbot toggle button click
  $("#chatbot_toggle").on("click", function () {
    var chatbot = $("#chatbot");
    var toggleChildren = $("#chatbot_toggle").children();

    // Check if the chatbot is collapsed
    if (chatbot.hasClass("main-card-collapsed")) {
      // Expand the chatbot
      chatbot.removeClass("main-card-collapsed");
      $(toggleChildren[0]).hide();  // Hide the collapse icon
      $(toggleChildren[1]).show();  // Show the expand icon

      // Optionally add a default response after expansion (currently commented out)
      setTimeout(function () {
        // addResponseMsg("Hi");
      }, 1000);
    } else {
      // Collapse the chatbot
      chatbot.addClass("main-card-collapsed");
      $(toggleChildren[0]).show();  // Show the collapse icon
      $(toggleChildren[1]).hide();  // Hide the expand icon
    }
  });

  //============================chat bot end================================================

  //======== Password Eye

  $("#togglepassword").on("click", function () {
    var passwordField = $("#password");
    var type = passwordField.attr("type") === "password" ? "text" : "password";
    passwordField.attr("type", type);

    // Optionally change the icon based on the visibility state
    if (type === "password") {
      $(this).removeClass("ri-eye-close-line");
      $(this).addClass("ri-eye-line");
    } else {
      $(this).removeClass("ri-eye-line");
      $(this).addClass("ri-eye-close-line");
    }
  });

  //======== Show Only 3 Rows In The Table

  var rows = $("table tbody tr");
  rows.slice(3).hide();

  //======== Slider
  $("#recipeCarousel").carousel({
    interval: 10000,
  });

  $(".carousel .carousel-item").each(function () {
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(":first");
    }
    next.children(":first-child").clone().appendTo($(this));

    for (var i = 0; i < minPerSlide; i++) {
      next = next.next();
      if (!next.length) {
        next = $(this).siblings(":first");
      }

      next.children(":first-child").clone().appendTo($(this));
    }
  });

  //======== Enable Edit on Profile
  $('#btn-profile-edit').on('click', function () {
    $('#profile-edit').show();
    $('#profile-info').hide(500);

  });
  $('#btn-profile-info, #btn-cancle').on('click', function () {

    $('#profile-edit').hide();
    $('#profile-info').show(500);

  });


})(jQuery);