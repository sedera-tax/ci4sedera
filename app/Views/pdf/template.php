<?php
helper('image_helper');

$image1Path = FCPATH . "assets/images/close-up-face-young-woman-relaxing-gentle_158595-4585.jpg";
$image2Path = FCPATH . "assets/images/ssdf-min.jpg";
$image3Path = FCPATH . "assets/images/ggfg.jpg";

$image1 = imageToBase64($image1Path);
$image2 = imageToBase64($image2Path);
$image3 = imageToBase64($image3Path);
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>TEST</title>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700">
    <style class="u-style">.u-section-2 {
            background-image: linear-gradient(#e8f5fb, #fbeced);
        }
        .u-section-2 .u-sheet-1 {
            min-height: 700px;
        }
        .u-section-2 .u-layout-wrap-1 {
            margin: 60px 0 60px auto;
        }
        .u-section-2 .u-layout-cell-1 {
            min-height: 600px;
            background-image: none;
        }
        .u-section-2 .u-container-layout-1 {
            padding: 30px 20px;
        }
        .u-section-2 .u-text-1 {
            text-transform: uppercase;
            font-size: 3rem;
            font-weight: 400;
            margin: 0;
        }
        .u-section-2 .u-text-2 {
            font-weight: 400;
            font-size: 1.125rem;
            line-height: 1.8;
            margin: 40px 0 0;
        }
        .u-section-2 .u-text-3 {
            margin: 40px 51px 0 0;
        }
        .u-section-2 .u-btn-1 {
            border-style: none none solid;
            padding: 0;
        }
        .u-section-2 .u-btn-2 {
            border-style: none;
            background-image: none;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: 0.875rem;
            margin: 20px auto 0 0;
            padding: 10px 34px 10px 32px;
        }
        .u-section-2 .u-image-1 {
            min-height: 287px;
        }
        .u-section-2 .u-container-layout-2 {
            padding-right: 0;
        }
        .u-section-2 .u-container-layout-3 {
            padding: 30px;
        }
        .u-section-2 .u-image-2 {
            min-height: 313px;
        }
        .u-section-2 .u-container-layout-4 {
            padding-left: 0;
        }
        .u-section-2 .u-container-layout-5 {
            padding: 30px;
        }
        .u-section-2 .u-image-3 {
            min-height: 600px;
        }
        .u-section-2 .u-container-layout-6 {
            padding: 30px;
        }
        @media (max-width: 1199px) {
            .u-section-2 .u-sheet-1 {
                min-height: 593px;
            }
            .u-section-2 .u-layout-wrap-1 {
                margin-right: initial;
                margin-left: initial;
            }
            .u-section-2 .u-layout-cell-1 {
                min-height: 495px;
            }
            .u-section-2 .u-text-3 {
                margin-right: 0;
            }
            .u-section-2 .u-image-1 {
                min-height: 237px;
            }
            .u-section-2 .u-image-2 {
                min-height: 258px;
            }
            .u-section-2 .u-image-3 {
                min-height: 495px;
            }
        }
        @media (max-width: 991px) {
            .u-section-2 .u-sheet-1 {
                min-height: 1402px;
            }
            .u-section-2 .u-layout-cell-1 {
                min-height: 520px;
            }
            .u-section-2 .u-image-1 {
                min-height: 350px;
            }
            .u-section-2 .u-container-layout-2 {
                padding-right: 0;
            }
            .u-section-2 .u-image-2 {
                min-height: 405px;
            }
            .u-section-2 .u-container-layout-4 {
                padding-left: 0;
            }
            .u-section-2 .u-image-3 {
                min-height: 313px;
            }
        }
        @media (max-width: 767px) {
            .u-section-2 .u-sheet-1 {
                min-height: 1309px;
            }
            .u-section-2 .u-layout-cell-1 {
                min-height: 100px;
            }
            .u-section-2 .u-container-layout-1 {
                padding-left: 10px;
                padding-right: 10px;
            }
            .u-section-2 .u-image-1 {
                min-height: 525px;
            }
            .u-section-2 .u-container-layout-3 {
                padding-left: 10px;
                padding-right: 10px;
            }
            .u-section-2 .u-image-2 {
                min-height: 608px;
            }
            .u-section-2 .u-container-layout-5 {
                padding-left: 10px;
                padding-right: 10px;
            }
            .u-section-2 .u-image-3 {
                min-height: 686px;
            }
            .u-section-2 .u-container-layout-6 {
                padding-left: 10px;
                padding-right: 10px;
            }
        }
        @media (max-width: 575px) {
            .u-section-2 .u-sheet-1 {
                min-height: 895px;
            }
            .u-section-2 .u-text-1 {
                font-size: 2.75rem;
            }
            .u-section-2 .u-image-1 {
                min-height: 331px;
            }
            .u-section-2 .u-image-2 {
                min-height: 383px;
            }
            .u-section-2 .u-image-3 {
                min-height: 477px;
            }
        }
    </style>

</head>
<body class="u-body">

    <section class="u-clearfix u-gradient u-section-2" id="sec-9a64">
        <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-xl u-sheet-1">
            <div class="u-clearfix u-expanded-width u-gutter-20 u-layout-wrap u-layout-wrap-1">
                <div class="u-gutter-0 u-layout">
                    <div class="u-layout-row">
                        <div class="u-size-22 u-size-60-md">
                            <div class="u-layout-row">
                                <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-60 u-layout-cell-1">
                                    <div class="u-container-layout u-valign-middle u-container-layout-1">
                                        <h2 class="u-custom-font u-font-oswald u-text u-text-1">facial treatments</h2>
                                        <p class="u-large-text u-text u-text-variant u-text-2">Malesuada fames ac turpis egestas sed tempus urna. Quis enim lobortis scelerisque fermentum dui faucibus in ornare. Enim nunc faucibus a pellentesque sit amet porttitor. Id ornare arcu odio ut sem nulla pharetra diam sit.<br>
                                        </p>
                                        <a href="#" class="u-black u-btn u-btn-round u-button-style u-radius-50 u-btn-2">learn more</a>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="u-size-13 u-size-30-md">
                            <div class="u-layout-col">
                                <div class="u-align-right u-container-style u-image u-layout-cell u-size-30 u-image-1" data-image-width="626" data-image-height="417">
                                    <img src="<?php echo $image1;?>" width="626" height="417" />
                                    <div class="u-container-layout u-container-layout-2">
                                        <div class="u-container-layout u-container-layout-3"></div>
                                    </div>
                                </div>
                                <div class="u-align-left u-container-style u-image u-layout-cell u-size-30 u-image-2" data-image-width="1500" data-image-height="1000">
                                    <img src="<?php echo $image2;?>" width="1500" height="1000" />
                                    <div class="u-container-layout u-container-layout-4">
                                        <div class="u-container-layout u-container-layout-5"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="u-size-25 u-size-30-md">
                            <div class="u-layout-row">
                                <div class="u-container-style u-image u-layout-cell u-left-cell u-size-60 u-image-3" data-image-width="800" data-image-height="964">
                                    <img src="<?php echo $image3;?>" width="800" height="964" />
                                    <div class="u-container-layout u-container-layout-6"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>