<?php

namespace App\Services;

use Google\Cloud\Storage\StorageClient;

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

    //to clean
    public function download(String $fileNameWithExtension, String $filePathToSave) {

        // foreach ($buckets as $bucket) {
        //     echo $bucket->name() . PHP_EOL;
        // };

        $bucket = $this->storage->bucket($this->STORAGE_LINK_BUCKET_NAME);
        $object = $bucket->object($fileNameWithExtension);
        $object->downloadToFile($filePathToSave);
        // $this->storage->getBucket();
        // $object = $bucket->upload($file, [
        //     'name' => "Pictures"
        // ]);
    }

    public function upload(String $filePath) {
        $bucket = $this->storage->bucket($this->STORAGE_LINK_BUCKET_NAME);
        $bucket->upload(
            fopen($filePath, 'r'),
            [
                'predefinedAcl' => 'publicRead'
            ]
        );
        // $buckets = $this->storage->buckets();

        // foreach ($buckets as $bucket) {
        //     echo $bucket->name() . PHP_EOL;
        // };

        // $this->storage->getBucket();
        // $object = $bucket->upload($file, [
        //     'name' => "Pictures"
        // ]);
    }
}
