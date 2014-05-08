<?php

namespace AlbumTdg;

return array(
	'controllers' => array(
		'invokables' => array(
			'AlbumTdg\Controller\AlbumTdg' => 'AlbumTdg\Controller\AlbumTdgController', // Controller with File name:
		),																				// AlbumTdg\Controller\AlbumTdgController.php
	),																					// and Class name - ArticlesTdgController
	'router' => array(
		'routes' => array(
			'album_tdg' => array(
				'type' 		=> 'Literal',
				'options'	=> array(
					'route' => '/album-tdg', //URL address
					'defaults' => array(
						'__NAMESPACE__' => 'AlbumTdg\Controller', //Go to this NAMESPACE 
						'controller'    => 'AlbumTdg',			  //Go to this class
						'action' 	    => 'index',				  //Go to this method
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'default' => array(
						'type' 		=> 'Segment',
						'options' 	=> array(
							'route' 	=> '/[:controller[/:action[/:id]]]',
							'constrains' => array(
								'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
								'action'	 => '[a-zA-Z][a-zA-Z0-9_-]*',
								'id' 		 => '[0-9]*',
							),
							'defaults' => array(
							),
						),
					),
				),
			),
		),
	),
	'view_manager' => array(
		// 'template_map' => array(
		// 	'layout/Auth'			=> __DIR__ . '/../view/layout/Auth.phtml',
		// ),
		'template_path_stack' => array(
			__NAMESPACE__ => __DIR__ . '/../view'
		),
	),
);