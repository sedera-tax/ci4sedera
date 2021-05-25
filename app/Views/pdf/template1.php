
<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>TEST</title>
</head>
<body class="u-body">
    <section>
        <div>
            <h2 class="u-custom-font u-font-oswald u-text u-text-1">facial treatments</h2>
            <p class="u-large-text u-text u-text-variant u-text-2">Malesuada fames ac turpis egestas sed tempus urna. Quis enim lobortis scelerisque fermentum dui faucibus in ornare. Enim nunc faucibus a pellentesque sit amet porttitor. Id ornare arcu odio ut sem nulla pharetra diam sit.<br></p>
        </div>
        <div>
            <div>
                <?php
                $path = FCPATH . "assets/images/close-up-face-young-woman-relaxing-gentle_158595-4585.jpg";
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                ?>
                <img src="<?php echo $base64;?>" width="626" height="417" />
            </div>
        </div>
    </section>
</body>
</html>