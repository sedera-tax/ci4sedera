<?php

function imageToBase64(string $path): string
{
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    return 'data:image/' . $type . ';base64,' . base64_encode($data);
}

if (! function_exists('imageToBase64Url'))
{
    /**
     * @param string $pathOrUrl
     * @return string
     */
    function imageToBase64Url(string $pathOrUrl): string
    {
        $context = stream_context_create( [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);

        $type = pathinfo($pathOrUrl, PATHINFO_EXTENSION);

        $file_headers = get_headers($pathOrUrl, 0, $context);
        if(strpos($file_headers[0], '404') !== false){
            //File Doesn't Exists!"
            return '';
        } else {
            //File exist
            $data = file_get_contents($pathOrUrl, false, $context);
            return 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
    }
}