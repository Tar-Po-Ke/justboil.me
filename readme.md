JustBoil.me Images is a simple, elegant image upload plugin for TinyMCE. It is free, opensource and licensed under Creative Commons Attribution 3.0 Unported License.

# Added Image Upload with AWS S3

#### SetUp For S3 in config.php
$config['img_path'] = '/images';

$config['img_path_key'] = 'images';

$config['aws_s3_upload'] = true;

#### Upload file will save in your local image path when you use AWS S3. so if don't want it, you can do with $config['local_file_remove'] key that default is false.

$config['local_file_remove'] = true;

#### Please Download AWS S3 PHP SDK from this link and place in ci/application/libraries folder
http://docs.aws.amazon.com/aws-sdk-php/v3/download/aws.phar

#### Replace with Your aws s3 region and aws s3 bucket name in ci/application/libraries/Awss3functions.php

protected $region = 'your-aws-region';

protected $bucketName = 'your-aws-bucket';



Enjoy... :-)

Original Repo: https://github.com/vikdiesel/justboil.me
Docs & stuff at: http://justboil.me
Donation gives you the right to remove attribution: http://justboil.me/donate/

--
Have a nice day! ))
