<?php
			/*$messages = [
				  'type'=> 'template',
				  'altText'=> 'this is a confirm template'
				
				  'template'=> (
				      'type'=> 'confirm',
				      'text'=> 'Are you sure?',
				      'actions'=> (
					  (
					    'type'=> 'message',
					    'label'=> 'Yes',
					    'text'=> 'yes'
					  ),
					  )
					    'type'=> 'message',
					    'label'=> 'No',
					    'text'=> 'no'
					  )
				      )
				  )

					];*/
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
//echo $messages['type'];
