<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* download this file: http://docs.aws.amazon.com/aws-sdk-php/v3/download/aws.phar */
require(APPPATH . 'libraries/aws.phar');

/*
Class Name: AWSS3 Functions
author name: Nay Win (Tar Po Ke)

S3 - Example Usage
-------------------------------

$keyName = 'images/' . $destination_file_name;
$file = '/' . $keyName;

$awsFunc = new AwsS3Functions();
$uploadS3 = $awsFunc->Upload($keyName, $file);
if($uploadS3 === true) {
    $success = true;
    $s3Image = $awsFunc->Download($keyName);
} else {
    $error = true;
    $error_msg = $uploadS3;
}
*/

class Awss3functions
{
    protected $instance = null;

    protected $region = 'your-aws-region'; // replace with your aws region

    protected $version = 'latest';

    protected $bucketName = 'your-aws-bucket'; // replace with your aws s3 bucket

    public function __construct()
    {
        $sdk = new Aws\Sdk(array('region' => $this->region, 'version' => $this->version));

        $this->instance = $sdk->createS3();

        return $this;
    }

    public function Upload($keyName, $file)
    {
        try {
            $this->instance->putObject(
                array(
                    'Bucket'=>$this->bucketName,
                    'Key' =>  $keyName,
                    'SourceFile' => $file,
                    'StorageClass' => 'REDUCED_REDUNDANCY'
                )
            );

            return true;
        } catch (S3Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function Download($keyName) 
    {
        try {
            $result = $this->instance->getObject(
                array(
                    'Bucket' => $this->bucketName,
                    'Key'    => $keyName
                )
            );

            return $result['@metadata']['effectiveUri'];
        } catch (S3Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function deleteLocalImage($file) 
    {
        try {
            unlink($file);
            return true;
        } catch (S3Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}

?>
