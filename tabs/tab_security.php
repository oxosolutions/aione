<?php

 global $wp_roles;
 
 $user_roles = $wp_roles->get_names();

$this->select(
	'enable_authenication',
	__( 'Enable Authentication', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' ),
		'no'      => __( 'No', 'Aione' )
	),
	__( 'User login require to view the content.', 'Aione' )
); 

 
$this->multiple(
	'select_the_role',
	__( 'Select The Role', 'Aione' ),
	 $user_roles,
	__( ' Limit access to this post content to users of the selected roles.', 'Aione' )
);

$this->textarea(
	'custom_error_messsage',
	__( 'Custom error messsage', 'Aione' ),
	__( 'Message shown to users that do no have permission to view the post.', 'Aione' )
);

?>