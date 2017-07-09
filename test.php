<?php
			$messages = array[
				  'type'=> 'template',
				  'altText'=> 'this is a confirm template',
				  'template'=> array(
				      'type'=> 'confirm',
				      'text'=> 'Are you sure?'
				     )

					];
$array = array(
    "foo" => "bar",
    42    => 24,
    "multi" => array(
         "dimensional" => array(
             "array" => "foo"
         )
    )
);


echo "OK";
echo $array['foo'];
echo $messages['type'];
