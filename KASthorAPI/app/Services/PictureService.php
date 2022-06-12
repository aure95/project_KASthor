<?php

namespace App\Services;

// use Kreait\Firebase\Contract\Storage;
// use Kreait\Firebase\Factory;
use Google\Cloud\Storage\StorageClient;

/**
 * Class PictureService.
 */
class PictureService
{

    public function __construct() {

        // Authenticating with keyfile data.
        $this->storage = new StorageClient([
            'keyFile' => json_decode(file_get_contents('C:\Users\mouau\Documents\Projects\projet_KASTHOR\KAsthorAPI\kasthorapp-firebase.json'), true)
        ]);
    }

    //to clean
    public function receive(String $source) {
        $file = fopen($source, 'r');
        $buckets = $this->storage->buckets();

        foreach ($buckets as $bucket) {
            echo $bucket->name() . PHP_EOL;
        };

        $bucket = $this->storage->bucket('kasthorapp.appspot.com');
        $object = $bucket->object('KASTHOR.jpg');
        $object->downloadToFile('../test_firebase.jpg');
        // $this->storage->getBucket();
        // $object = $bucket->upload($file, [
        //     'name' => "Pictures"
        // ]);
    }

    public function send(String $source) {
        $bucket = $this->storage->bucket('kasthorapp.appspot.com');
        $bucket->upload(
            fopen('../Test/test.jpg', 'r'),
            [
                'predefinedAcl' => 'publicRead'
            ]
        );
        $buckets = $this->storage->buckets();

        foreach ($buckets as $bucket) {
            echo $bucket->name() . PHP_EOL;
        };

        // $this->storage->getBucket();
        // $object = $bucket->upload($file, [
        //     'name' => "Pictures"
        // ]);
    }
}
