<?php

/*
 * Plugin Name: myCRED github
 * Version: 1.0.0
 * Plugin URI: https://objects.ws
 * Description: 
 * Author: Objects
 * Author URI: https://objects.ws
 * Text Domain: mycred-github
 *
 * @package WordPress
 * @author Objects
 * @since 1.0
 */

function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        __( 'myCRED github', 'textdomain' ),
        'myCRED github',
        'manage_options',
        'test_github_data',
        'test_github_data'
    );
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );


function test_github_data(){
    
    require_once 'github-php-client-master/client/GitHubClient.php';

    $client = new GitHubClient();
    $username = "21a343bb79e7b444c1b2c091c50419466f4b77fe";
    echo "<pre>";
    try{
        $client->setAuthType('Oauth');
        $client->setOauthToken($username);
        $repos = $client->repos->listYourRepositories();
        /**
         * @param GitHubSimpleRepo $repo
         */
        foreach( $repos as $repo ){
            echo "ID: ".$repo->getId()."<br>";
            echo "URL: ".$repo->getUrl()."<br>";
            echo "Full Name: ".$repo->getFullName()."<br>";
            echo "Name: ".$repo->getName()."<br>";
        }
    } catch (GitHubClientException $e){
        var_dump($e->getMessage());
    }
}
