<?php
/**
 * Taylor Malamut
 * CSCI409
 * 4/13/20
 * Week 10 - Assignment 1 - Accessing an API
 * 
 * Access the position stack API to geocode an address. 
 * End result of the program should display the latitutde and longitute of the geocoded address as follows:
 * Lat: the latitude, Lon: the longitude
 */

 //api key
 $api_key = '';

 //endpoint url
 $endpoint = 'http://api.positionstack.com/v1/forward?';

 //Set up your url parameters in a key value array
 //For a complete list of parameters, refer to the API's documentation
 //Put in address to test
 //Need to get just the lat and lon - not everything else
 $params = array(
    'access_key' => $api_key,
    'query' => '100 Chanticleer Drive East',
  );

 //Convert the params to a query string
$url_params = http_build_query($params);

//Fetch data from the url
$response = file_get_contents($endpoint.$url_params);

//Decode the json response into an object that can be accessed
$coordinates = json_decode($response);

//Print out the object in a readable format
//print_r($coordinates); //don't need to do this as I just need to display the latitude and longitude (using to test)

//Access the latitude and longitude parameters (just need those two)
echo "Lat: " . $coordinates->data[0]->latitude . ", Lon: " . $coordinates->data[0]->longitude;


?>