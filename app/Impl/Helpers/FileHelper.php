<?php

namespace App\Impl\Helpers;

use App\Helpers\FileHelper as FileHelperContract;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Description of FileHelper
 *
 * @author Ervinne Sodusta
 */
class FileHelper implements FileHelperContract {

    /**
     * 
     * @param \App\Helpers\UploadedFile $rawFile
     * @return String the path of the uploaded file in the server
     * @throws Exception
     */
    public function upload(UploadedFile $rawFile) {
        if (!$rawFile->isValid()) {
            throw new \Exception('Uploaded file is not valid');
        }

        $destinationPath = Config::get('app.upload_directory');
        $extension       = $rawFile->getClientOriginalExtension();

        $generatedFileName = uniqid('file_') . '.' . $extension;

        $rawFile->move($destinationPath, $generatedFileName);

        return $destinationPath . "/" . $generatedFileName;
    }

}
