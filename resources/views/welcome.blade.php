<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>Reminder</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/jumbotron/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }
    </style>


</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>

    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="40" height="32" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd">
                        <g><path style="opacity:0.979" fill="#030202" d="M 511.5,239.5 C 511.5,259.5 511.5,279.5 511.5,299.5C 510.145,312.365 508.645,325.365 507,338.5C 496.431,389.735 465.931,422.235 415.5,436C 402.617,438.601 389.617,439.601 376.5,439C 374.266,437.362 372.933,435.195 372.5,432.5C 373.322,430.611 374.155,428.611 375,426.5C 375.75,425.874 376.584,425.374 377.5,425C 420.591,425.874 454.091,408.708 478,373.5C 485.26,360.719 489.927,347.053 492,332.5C 497.899,289.488 497.899,246.488 492,203.5C 483.372,160.042 457.872,132.042 415.5,119.5C 408.148,117.088 400.481,115.755 392.5,115.5C 393.66,122.782 394.493,130.116 395,137.5C 395.326,161.172 395.326,184.838 395,208.5C 396.029,213.565 397.362,218.565 399,223.5C 404.699,233.187 410.366,242.853 416,252.5C 419.899,271.481 413.399,285.648 396.5,295C 373.792,303.344 350.459,309.177 326.5,312.5C 324.09,348.844 305.423,372.01 270.5,382C 234.684,387.342 208.184,374.175 191,342.5C 187.107,332.869 184.941,322.869 184.5,312.5C 161.186,309.67 138.519,304.17 116.5,296C 98.2548,287.009 91.0881,272.509 95,252.5C 100.634,242.853 106.301,233.187 112,223.5C 113.638,218.565 114.971,213.565 116,208.5C 115.653,184.839 115.653,161.172 116,137.5C 116.507,130.116 117.34,122.782 118.5,115.5C 110.127,115.34 102.127,116.673 94.5,119.5C 85.3493,121.719 76.6826,125.219 68.5,130C 66.1667,130.667 63.8333,130.667 61.5,130C 60.5291,128.519 59.1958,127.685 57.5,127.5C 57.3359,124.813 57.5026,122.146 58,119.5C 70.4312,110.54 84.2645,104.706 99.5,102C 106.919,101.221 114.252,100.054 121.5,98.5C 136.764,44.7592 172.43,16.2592 228.5,13C 255.357,10.5798 282.023,11.9132 308.5,17C 351.677,28.011 378.677,55.1776 389.5,98.5C 433.764,101.664 467.931,121.664 492,158.5C 500.739,173.718 506.073,190.052 508,207.5C 509.114,218.324 510.281,228.991 511.5,239.5 Z"/></g>
                        <g><path style="opacity:1" fill="#f6e868" d="M 336.5,295.5 C 298.722,290.271 265.056,275.771 235.5,252C 222.25,239.609 211.583,225.443 203.5,209.5C 205.151,204.96 205.651,200.293 205,195.5C 203.451,191.13 200.951,187.463 197.5,184.5C 198.504,183.317 199.338,181.984 200,180.5C 200.667,174.5 200.667,168.5 200,162.5C 197.592,159.38 194.426,158.047 190.5,158.5C 186.272,114.649 192.272,72.316 208.5,31.5C 215.732,29.7947 223.066,28.6281 230.5,28C 258.163,25.9151 285.496,27.9151 312.5,34C 338.535,42.0346 357.035,58.5346 368,83.5C 374.673,99.862 378.673,116.862 380,134.5C 380.459,159.842 380.459,185.175 380,210.5C 381.458,218.421 383.791,226.087 387,233.5C 391.667,240.833 396.333,248.167 401,255.5C 404.315,267.896 400.149,276.729 388.5,282C 371.645,288.454 354.311,292.954 336.5,295.5 Z"/></g>
                        <g><path style="opacity:1" fill="#f3c755" d="M 208.5,31.5 C 192.272,72.316 186.272,114.649 190.5,158.5C 188.525,159.646 187.025,161.313 186,163.5C 185.501,168.489 185.334,173.489 185.5,178.5C 168.005,174.004 155.171,179.671 147,195.5C 145.717,207.43 150.55,215.93 161.5,221C 178.317,226.799 192.317,222.966 203.5,209.5C 211.583,225.443 222.25,239.609 235.5,252C 265.056,275.771 298.722,290.271 336.5,295.5C 262.962,311.011 190.628,306.178 119.5,281C 110.98,275.45 107.48,267.616 109,257.5C 114,249.5 119,241.5 124,233.5C 127.107,226.071 129.441,218.404 131,210.5C 130.623,185.173 130.623,159.839 131,134.5C 132.435,110.866 139.101,88.8661 151,68.5C 165.147,48.5017 184.313,36.1683 208.5,31.5 Z"/></g>
                        <g><path style="opacity:1" fill="#d1d1fd" d="M 415.5,119.5 C 416.201,126.506 417.034,133.506 418,140.5C 418.354,163.506 418.354,186.506 418,209.5C 421.125,218.42 425.792,226.42 432,233.5C 445.122,260.983 440.956,285.483 419.5,307C 406.741,315.704 392.741,321.704 377.5,325C 367.565,327.651 357.565,329.984 347.5,332C 333.829,378.661 302.662,403.494 254,406.5C 215.076,404.049 187.076,385.383 170,350.5C 167.831,344.484 165.664,338.484 163.5,332.5C 144.677,329.044 126.343,323.878 108.5,317C 80.8816,303.942 68.7149,282.108 72,251.5C 75.0564,239.384 80.7231,228.717 89,219.5C 90.6369,216.283 91.9702,212.95 93,209.5C 93.1252,194.505 92.9585,179.505 92.5,164.5C 92.0988,150.052 93.0988,135.718 95.5,121.5C 95.4573,120.584 95.1239,119.917 94.5,119.5C 102.127,116.673 110.127,115.34 118.5,115.5C 117.34,122.782 116.507,130.116 116,137.5C 115.653,161.172 115.653,184.839 116,208.5C 114.971,213.565 113.638,218.565 112,223.5C 106.301,233.187 100.634,242.853 95,252.5C 91.0881,272.509 98.2548,287.009 116.5,296C 138.519,304.17 161.186,309.67 184.5,312.5C 184.941,322.869 187.107,332.869 191,342.5C 208.184,374.175 234.684,387.342 270.5,382C 305.423,372.01 324.09,348.844 326.5,312.5C 350.459,309.177 373.792,303.344 396.5,295C 413.399,285.648 419.899,271.481 416,252.5C 410.366,242.853 404.699,233.187 399,223.5C 397.362,218.565 396.029,213.565 395,208.5C 395.326,184.838 395.326,161.172 395,137.5C 394.493,130.116 393.66,122.782 392.5,115.5C 400.481,115.755 408.148,117.088 415.5,119.5 Z"/></g>
                        <g><path style="opacity:1" fill="#edebfe" d="M 94.5,119.5 C 95.1239,119.917 95.4573,120.584 95.5,121.5C 93.0988,135.718 92.0988,150.052 92.5,164.5C 92.9585,179.505 93.1252,194.505 93,209.5C 91.9702,212.95 90.6369,216.283 89,219.5C 80.7231,228.717 75.0564,239.384 72,251.5C 68.7149,282.108 80.8816,303.942 108.5,317C 126.343,323.878 144.677,329.044 163.5,332.5C 165.664,338.484 167.831,344.484 170,350.5C 187.076,385.383 215.076,404.049 254,406.5C 302.662,403.494 333.829,378.661 347.5,332C 357.565,329.984 367.565,327.651 377.5,325C 392.741,321.704 406.741,315.704 419.5,307C 440.956,285.483 445.122,260.983 432,233.5C 425.792,226.42 421.125,218.42 418,209.5C 418.354,186.506 418.354,163.506 418,140.5C 417.034,133.506 416.201,126.506 415.5,119.5C 457.872,132.042 483.372,160.042 492,203.5C 497.899,246.488 497.899,289.488 492,332.5C 489.927,347.053 485.26,360.719 478,373.5C 454.091,408.708 420.591,425.874 377.5,425C 376.584,425.374 375.75,425.874 375,426.5C 374.155,428.611 373.322,430.611 372.5,432.5C 366.203,433.32 359.869,433.653 353.5,433.5C 352.69,430.73 351.023,428.563 348.5,427C 268.763,429.971 189.097,428.638 109.5,423C 62.0976,414.599 32.2643,387.099 20,340.5C 12.7966,292.822 12.7966,245.155 20,197.5C 24.9157,179.334 33.249,163.001 45,148.5C 45.5971,145.319 45.0971,142.319 43.5,139.5C 47.8974,135.096 52.5641,131.096 57.5,127.5C 59.1958,127.685 60.5291,128.519 61.5,130C 63.8333,130.667 66.1667,130.667 68.5,130C 76.6826,125.219 85.3493,121.719 94.5,119.5 Z"/></g>
                        <g><path style="opacity:0.968" fill="#010102" d="M 43.5,139.5 C 45.0971,142.319 45.5971,145.319 45,148.5C 33.249,163.001 24.9157,179.334 20,197.5C 12.7966,245.155 12.7966,292.822 20,340.5C 32.2643,387.099 62.0976,414.599 109.5,423C 189.097,428.638 268.763,429.971 348.5,427C 351.023,428.563 352.69,430.73 353.5,433.5C 353.451,436.099 352.451,438.266 350.5,440C 346.284,441.204 341.951,441.87 337.5,442C 272.811,444.295 208.144,443.795 143.5,440.5C 140.5,440.833 137.5,441.167 134.5,441.5C 116.557,467.931 92.557,486.764 62.5,498C 40.8631,501.765 25.0298,493.931 15,474.5C 12.601,466.328 11.9343,457.994 13,449.5C 17.2748,427.799 20.1082,405.966 21.5,384C 14.2909,373.08 9.12427,361.246 6,348.5C 3.05385,332.124 0.887178,315.79 -0.5,299.5C -0.5,279.167 -0.5,258.833 -0.5,238.5C 0.992996,223.94 2.82633,209.273 5,194.5C 9.77375,173.109 19.6071,154.609 34.5,139C 37.5547,138.366 40.5547,138.532 43.5,139.5 Z"/></g>
                        <g><path style="opacity:1" fill="#050402" d="M 190.5,158.5 C 194.426,158.047 197.592,159.38 200,162.5C 200.667,168.5 200.667,174.5 200,180.5C 199.338,181.984 198.504,183.317 197.5,184.5C 191.305,186.736 187.305,184.736 185.5,178.5C 185.334,173.489 185.501,168.489 186,163.5C 187.025,161.313 188.525,159.646 190.5,158.5 Z"/></g>
                        <g><path style="opacity:1" fill="#060402" d="M 325.5,177.5 C 324.19,184.281 320.19,186.614 313.5,184.5C 310.989,180.63 309.989,176.297 310.5,171.5C 308.683,162.839 312.017,158.673 320.5,159C 321.931,159.465 323.097,160.299 324,161.5C 325.397,166.708 325.897,172.041 325.5,177.5 Z"/></g>
                        <g><path style="opacity:1" fill="#050502" d="M 235.5,170.5 C 237.857,170.337 240.19,170.503 242.5,171C 251.116,179.511 259.783,179.511 268.5,171C 278.504,170.333 281.337,174.5 277,183.5C 262.61,195.327 248.277,195.327 234,183.5C 230.287,178.589 230.787,174.256 235.5,170.5 Z"/></g>
                        <g><path style="opacity:1" fill="#fea1ab" d="M 185.5,178.5 C 187.305,184.736 191.305,186.736 197.5,184.5C 200.951,187.463 203.451,191.13 205,195.5C 205.651,200.293 205.151,204.96 203.5,209.5C 192.317,222.966 178.317,226.799 161.5,221C 150.55,215.93 145.717,207.43 147,195.5C 155.171,179.671 168.005,174.004 185.5,178.5 Z"/></g>
                        <g><path style="opacity:1" fill="#fea1ab" d="M 325.5,177.5 C 337.31,175.566 347.977,178.066 357.5,185C 368.007,198.668 366.007,210.334 351.5,220C 335.226,227.019 321.059,224.185 309,211.5C 303.239,201.242 304.739,192.242 313.5,184.5C 320.19,186.614 324.19,184.281 325.5,177.5 Z"/></g>
                        <g><path style="opacity:1" fill="#f4aa3d" d="M 304.5,339.5 C 278.86,341.263 253.194,341.763 227.5,341C 220.426,340.661 213.426,339.828 206.5,338.5C 202.191,331.519 199.857,323.852 199.5,315.5C 236.826,320.726 274.159,320.726 311.5,315.5C 310.91,324.012 308.577,332.012 304.5,339.5 Z"/></g>
                        <g><path style="opacity:1" fill="#f2c655" d="M 206.5,338.5 C 213.426,339.828 220.426,340.661 227.5,341C 253.194,341.763 278.86,341.263 304.5,339.5C 293.142,358.814 276.142,368.481 253.5,368.5C 237.268,367.967 223.768,361.634 213,349.5C 210.306,346.108 208.14,342.441 206.5,338.5 Z"/></g>
                        <g><path style="opacity:1" fill="#d0d0fc" d="M 35.5,401.5 C 58.1194,423.971 85.4527,436.471 117.5,439C 101.625,458.769 81.9583,473.435 58.5,483C 37.0206,484.187 26.8539,474.021 28,452.5C 31.3724,435.602 33.8724,418.602 35.5,401.5 Z"/></g>
                        </svg>
                    <span class="fs-4">Reminder</span>
                </a>
            </header>

            <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Reminder List</h1>
                    <ul class="list-group">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A fourth item</li>
                        <li class="list-group-item">And a fifth one</li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <div class="h-100 p-5 text-bg-dark rounded-3">
                        <h2>Create Reminder</h2>
                        <form class="row g-3" method="POST" action="{{ route('reminder.store') }}">
                            @csrf
                            <div class="col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="col-md-6">
                                <label for="category_id" class="form-label">Category</label>
                                <select id="category_id" class="form-select" name="category_id">
                                    <option selected>Choose...</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <div class="col-md-6">
                                <label for="time" class="form-label">Time</label>
                                <input type="time" class="form-control" id="time" name="time">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                        <h2>Create category</h2>
                        <form class="row g-3">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">title category</label>
                                <input type="email" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-md-12">
                                <label for="inputState" class="form-label">Main category</label>
                                <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>Birthday</option>
                                    <option>Meeting</option>
                                    <option>Holidays</option>
                                    <option>Events</option>
                                    <option>Educational</option>
                                    <option>Work</option>
                                    <option>Daily Tasks</option>
                                    <option>Miscellaneous</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <footer class="pt-3 mt-4 text-body-secondary border-top">
                &copy; 2023
            </footer>
        </div>
    </main>



</body>

</html>
