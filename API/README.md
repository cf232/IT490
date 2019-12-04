#API with PHP

1. Create a config.php file
2. Add any credentials or keys here
```php
<?php
$api_key="secretfromapiservice";
?>
```
3. Ensure .gitignore mentions "config.php" so you don't mistakenly commit it.
4. Replace $url = ""; with the desired API you're using and adjust the string with the proper replacements.
5. use file_get_contents to get data from the URL
6. Most APIs return JSON so we use
```php
$json_result = json_decode($data, true);//returns associative array
//or
$json_result = json_decode($data, false);//returns object
```
7. You may use ```php var_dump(), var_export(), or print_r()``` to see the structure of the result
8. Then you can iterate over the objects using foreach
```php
foreach($the_list_of_results as $the_individual_result_item){
	echo $the_individual_result_item["desired_element"];
}
```
