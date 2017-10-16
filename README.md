# Weibo Ads API SDK for PHP
## Installation
### Require
The PHP SDK requires PHP 5.5 or greater    
The PHP SDK requires [composer](https://getcomposer.org/download/) to manage dependencies.

### Composer
Add the following configuration to your `composer.json` file:

```json
{
    "require": {
        "weibo/ads-sdk-php": "1.0.*"
    }
}  
```
     
```json   
{
  "respositories" : [
    "type":"git",
    "url" : "https://github.com/weiboad/weibo-ads-php-sdk.git"
  ]
}
```  
then install it with composer:

```shell
php composer.phar install --no-dev
```

This SDK and its dependencies will be installed under `./vendor`.

## Usage

#### Init api 
```php
use WeiboAd\Api;

$api = new Api('your_app_id', 'your_app_secret', 'your_access_token');
```
#### Get account
```php
use WeiboAd\Core\AccountApi;  

$accountApi = new AccountApi($this->api);
$account = $accountApi->read();
```

#### Add and update Campaign
```php
use WeiboAd\Core\CampaignApi;  
use WeiboAd\Core\Entity\Campaign;
use WeiboAd\Core\Constant\ConfiguredStatus;
use WeiboAd\Core\Constant\MarketingObjective;

//create campaign
$campaignApi = new CampaignApi($this->api);
$campaign = new Campaign();
$campaign->setName('campaign name');
$campaign->setConfiguredStatus(ConfiguredStatus::PAUSE);
$campaign->setObjective(MarketingObjective::BRAND_AWARENESS);
$campaign->setLifetimeBudget(600);
$campaign->setGuaranteedDelivery(false);
$retCampaign = $campaignApi->create($campaign);

//update campaign budget
$campaign = $campaignApi->read($id);
$campaign->setLifetimeBudget(1000);
$retCampaign = $campaignApi->update($campaign);
```

## Tests

### Install dependencies

```shell
php composer.phar install --dev
```
### Execute unit tests 

```shell
./vendor/bin/phpunit
```

### Execute unit tests include some integration api tests 
find phpunit.xml file then add annotation
```shell
<!-- <exclude>tests/IntegrationTest.php</exclude>-->
```
then execute phpunit command line
```shell
./vendor/bin/phpunit
```
