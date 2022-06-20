<?php

namespace App\Services;

use Google\Cloud\Storage\StorageClient;
use App\Models\StorageLink;

class StorageLinkService
{
    private $FIREBASE_CONFIG_JSON_PATH = 'C:\Users\mouau\Documents\Projects\projet_KASTHOR\KAsthorAPI\kasthorapp-firebase.json';
    private $STORAGE_LINK_BUCKET_NAME = 'kasthorapp.appspot.com';

    public function __construct() {
        // Authenticating with keyfile data.
        $this->storage = new StorageClient([
            'keyFile' => json_decode(file_get_contents($this->FIREBASE_CONFIG_JSON_PATH), true)
        ]);
    }

    public function uploadStorageLink(StorageLink $storageLink ,String $filePathToSave) {
        $this->upload($storageLink->name);
    }

    public function downloadStorageLink(StorageLink $storageLink ,String $filePathToSave) {
        $this->download($storageLink->name, $filePathToSave);
    }

    public function download(String $fileNameWithExtension, String $filePathToSave) {
        $bucket = $this->storage->bucket($this->STORAGE_LINK_BUCKET_NAME);
        $object = $bucket->object($fileNameWithExtension);
        $object->downloadToFile($filePathToSave);
    }

    public function upload(String $filePath) {
        $bucket = $this->storage->bucket($this->STORAGE_LINK_BUCKET_NAME);
        $bucket->upload(
            fopen($filePath, 'r'),
            [
                'predefinedAcl' => 'publicRead'
            ]
        );
    }
}
