<!DOCTYPE html>
<html lang="ja" prefix="og: https://ogp.me/ns#">
  <head>
    <meta charset="UTF-8" />

    <?php get_template_part("template-parts/ogp"); ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Noto+Sans+JP:wght@500;700&display=swap"
      rel="stylesheet"
    />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/viewport-extra@1.0.4/dist/viewport-extra.min.js"></script>

    <script>
      (function () {
        var ua = navigator.userAgent;
        var sp =
          ua.indexOf("iPhone") > -1 ||
          (ua.indexOf("Android") > -1 && ua.indexOf("Mobile") > -1);

        var tab =
          !sp &&
          (ua.indexOf("iPad") > -1 ||
            (ua.indexOf("Macintosh") > -1 && "ontouchend" in document) ||
            ua.indexOf("Android") > -1);

        if (tab) new ViewportExtra(1131);

        if (sp) new ViewportExtra(375);

        var browser = ua.toLowerCase();
      })();
    </script>
    <script>
      $(function () {
        $("#js-heroSlider").slick({
          arrows: true,
          centerMode: true,
          centerPadding: "120px",
          variableWidth: true,
          slidesToShow: 1,
          dots: true,
          autoplay: true,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                arrows: false,
              },
            },
          ],
        });
        $("#js-projectPost").slick({
          autoplay: true,
          dots: false,
          arrows: false,
          slidesToShow: 3,
          arrows: true,
          centerMode: true,
          centerPadding: "9%",
          responsive: [
            {
              breakpoint: 1580,
              settings: {
                slidesToShow: 3,
              },
            },
            {
              breakpoint: 1280,
              settings: {
                slidesToShow: 3,
              },
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
                arrows: true,
                centerMode: true,
                centerPadding: "15%",
              },
            },
          ],
          // autoplay: true,
          // autoplaySpeed: 0,
          // speed: 6000,
          // cssEase: "linear",
          // dots: false,
          // arrows: true,
          // slidesToShow: 6,
          // swipe: false,
          // pauseOnFocus: false,
          // pauseOnHover: true,
          // responsive: [
          //   {
          //     breakpoint: 1680,
          //     settings: {
          //       slidesToShow: 5,
          //     }
          //   },
          //   {
          //     breakpoint: 1280,
          //     settings: {
          //       slidesToShow: 4,
          //     }
          //   },
          //   {
          //     breakpoint: 768,
          //     settings: {
          //       autoplaySpeed: 2000,
          //       speed: 1000,
          //       slidesToShow: 1,
          //       arrows: true,
          //       centerMode: true,
          //       centerPadding: '15%',
          //       cssEase: "ease",
          //     }
          //   }
          // ]
        });
        if (window.matchMedia("(max-width: 767px)").matches) {
          $("#js-infoSlider").slick({
            autoplay: true,
            dots: false,
            arrows: false,
            slidesToShow: 4,
            responsive: [
              {
                breakpoint: 768,
                settings: {
                  slidesToShow: 1,
                  arrows: true,
                  centerMode: true,
                  centerPadding: "15%",
                },
              },
            ],
          });
        }
        //モーダルを閉じると動画（YouTube）も停止する
        $(document).on("closing", ".remodal-movie", function (e) {
          var $this = $(this).find("iframe"),
            tempSrc = $this.attr("src");
          $this.attr("src", "");
          $this.attr("src", tempSrc);
        });
      });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=G-EBK5SGY79L"
    ></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "G-EBK5SGY79L");
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js"></script>
    <script
      type="text/javascript"
      src="/wp-content/themes/saitamayouthnet-theme/js/PopupIE.js"
    ></script>
    <?php wp_head(); ?>
  </head>

  <body class="home" id="top">


