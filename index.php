<?php
require_once('vendor/autoload.php');

$mysqli = new mysqli("localhost", "root", "", "categories");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit(1);
}

$res = $mysqli->query("select * from credentials limit 1");
$credentials = $res->fetch_assoc();

$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken($credentials['ebay_prod_oauth_token']);
$apiInstance = new Swagger\Client\Api\CategoryTreeApi(
    new GuzzleHttp\Client(),
    $config
);

function dump_category($categoryNode, $parentID, mysqli& $mysqli) {
    $id = $categoryNode->getCategory()->getCategoryId();
    $name = $mysqli->real_escape_string($categoryNode->getCategory()->getCategoryName());
    if(!$mysqli->query("INSERT INTO ebay_categories(id, name, parentId) VALUES ($id, '$name', $parentID)")) {
        echo "Error inserting row:", PHP_EOL;
        echo "ID ", $id, PHP_EOL;
        echo "Name ", $name, PHP_EOL;
        echo "ParentID", $parentID, PHP_EOL;
    }
    if (!$categoryNode->getLeafCategoryTreeNode()) {
        $children = $categoryNode->getChildCategoryTreeNodes();
        foreach ($children as $cat) {
            dump_category($cat, $id, $mysqli);
        }
    }
}

try {
    $result = $apiInstance->getDefaultCategoryTreeId("EBAY_DE");
    echo "Category tree ID is:", $result->getCategoryTreeId();
    $categories = $apiInstance->getCategoryTree($result->getCategoryTreeId());
    $rootCategory = $categories->getRootCategoryNode();
    dump_category($rootCategory, 0, $mysqli);
} catch (Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

?>
