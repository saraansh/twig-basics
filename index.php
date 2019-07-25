<?php

// Include the autoload.php created automatically
require 'vendor/autoload.php';

// Load the views path as Twig Loader
$loader = new Twig_Loader_Filesystem('views');

// Create a new twig instance
// A twig environment needs a loader
// There can be multiple loaders and you can also create your own
$twig = new Twig_Environment($loader);

// Creating a Twig filter
$md5filter = new Twig_SimpleFilter('md5', function($string) {
	return md5($string);
});

// Add the filter to twig instance
$twig->addFilter($md5filter);

// // To edit the syntax for blocks and tags in twig
// // Create a twig lexer
// $lexer = new Twig_Lexer($twig, array(
// 	'tag_block' => array('{', '}'),
// 	'tag_variable' => array('{{', '}}')
// ));
// // Set the new lexer
// $twig->setLexer($lexer);

// Creating a view
echo $twig->render('crew.html', array(
	'name' => 'Saraansh',
	'age' => 22,

	'users' => array(
		array('name' => 'Adam', 'age' => 21, "ph-no" => 273009),
		array('name' => 'Eve', 'age' => 24, "ph-no" => 273001),
		array('name' => 'Alex', 'age' => 23, "ph-no" => 201301)
	),

	'gender' => array(
		0 => 'Male',
		1 => 'Female'
	)
));