(function ($) {
  "use strict";

  // Dropdown on mouse hover
  $(document).ready(function () {
    function toggleNavbarMethod() {
      if ($(window).width() > 992) {
        $(".navbar .dropdown")
          .on("mouseover", function () {
            $(".dropdown-toggle", this).trigger("click");
          })
          .on("mouseout", function () {
            $(".dropdown-toggle", this).trigger("click").blur();
          });
      } else {
        $(".navbar .dropdown").off("mouseover").off("mouseout");
      }
    }
    toggleNavbarMethod();
    $(window).resize(toggleNavbarMethod);
  });

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });

  // Vendor carousel
  $(".vendor-carousel").owlCarousel({
    loop: true,
    margin: 29,
    nav: false,
    autoplay: true,
    smartSpeed: 1000,
    responsive: {
      0: {
        items: 2,
      },
      576: {
        items: 3,
      },
      768: {
        items: 4,
      },
      992: {
        items: 5,
      },
      1200: {
        items: 6,
      },
    },
  });

  // Related carousel
  $(".related-carousel").owlCarousel({
    loop: true,
    margin: 29,
    nav: false,
    autoplay: true,
    smartSpeed: 1000,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 2,
      },
      768: {
        items: 3,
      },
      992: {
        items: 4,
      },
    },
  });

  // Product Quantity
  $(".quantity button").on("click", function () {
    var button = $(this);
    var oldValue = button.parent().parent().find("input").val();
    if (button.hasClass("btn-plus")) {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 0;
      }
    }

    button.parent().parent().find("input").val(newVal);
  });

  $("#btnOrder").on("click", function() {
    const firstName = $(":input.payment-form")[0];
    const lastName = $(":input.payment-form")[1];
    const email = $(":input.payment-form")[2];
    const mobileNumber = $(":input.payment-form")[3];
    const address = $(":input.payment-form")[4];
    const posCode = $(":input.payment-form")[5];
    const priceTotal = $("#total").html();
    const orderId = new Date().getTime();

    //payment method
    const isBankTrans = false;
    const isCOD = $(":input.payment-form")[6].checked;

    // if user doesn't logged in, should redirect to login page
    if($('#btnLogout').text() === 'Login') {
      window.location.href = "login.php";
    }

    // if payment method none
    if(!isBankTrans && !isCOD) {
      return alert("Anda belum memilih metode pembayaran");
    }

    if (isBankTrans) {
      const Url = "https://api.sandbox.midtrans.com/v2/charge";
      const va = null;

      var payload = {
        // "payment_type": "bank_transfer",
        // "bank_transfer": {
        //   "bank": "permata",
        //   "permata": {
        //     "recipient_name": "SUDARSONO"
        //   }
        // },
        // "transaction_details": {
        //   "order_id": "H17550",
        //   "gross_amount": 145000
        // },
        // client_key:SB-Mid-client-pvndhZ8BVTAp8A5w&payment_type=bank_transfer&bank=bca&va_number=1234432&gross_amount=20000
        "client_key": "SB-Mid-client-pvndhZ8BVTAp8A5w",
        "payment_type": "bank_transfer",
        "transaction_details": {
            "gross_amount": 10000,
            "order_id": orderId
        },
        "customer_details": {
            "email": "budi.utomo@Midtrans.com",
            "first_name": "budi",
            "last_name": "utomo",
            "phone": "+6281 1234 1234"
        },
        "item_details": [
        {
          "id": "1388998298204",
          "price": 5000,
          "quantity": 1,
          "name": "Ayam Zozozo"
        },
        {
          "id": "1388998298205",
          "price": 5000,
          "quantity": 1,
          "name": "Ayam Xoxoxo"
        }
      ],
      "bank_transfer":{
        "bank": "bca",
        "va_number": "111111",
        "free_text": {
              "inquiry": [
                    {
                        "id": "Free Text ID Free Text ID Free Text ID",
                        "en": "Free Text EN Free Text EN Free Text EN"
                    }
              ],
              "payment": [
                    {
                        "id": "Free Text ID Free Text ID Free Text ID",
                        "en": "Free Text EN Free Text EN Free Text EN"
                    }
              ]
        },
        "bca": {
            "sub_company_code": "00000"
        }
      }
    };
    var json = JSON.stringify(payload); 

      $.ajax({
          url: Url,
          method: "POST",
          // headers: {
          //   "Content-Type": "application/x-www-form-urlencoded",
          //   "origin": "http://localhost",
          //   "Accept": "application/json",
          //   "Authorization": "Basic U0ItTWlkLXNlcnZlci1wZ2JOYjNoUkVaTGRsRmpjM19GT2JKZ3o6"
          // },
          dataType: 'json',
          contentType: "application/json",
          data: json,
          success: function (result) {
              console.log(result);
          },
          error: function (error) {
              console.log(`Error ${error}`);
          },
      });

      if(va) {
          window.location.href = `payment.php?method=bankTransfer&va=`;
      }
      return;
    }

    if(isCOD) {
      window.location.href = `payment.php?method=COD&nama=${firstName+lastName}&price=${priceTotal}&orderId=${orderId}`;
    }
  });
})(jQuery);
