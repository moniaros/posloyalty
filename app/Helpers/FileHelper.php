<?php

namespace App\Helpers;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 *
 * @author Ervinne Sodusta
 */
interface FileHelper {

    public function upload(UploadedFile $rawFile);
}
