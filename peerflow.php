<?php
/**
 * Plugin Name: PeerFlow
 * Plugin URI: https://seusite.com/peerflow
 * Description: Sistema de gestão de submissões acadêmicas para eventos científicos
 * Version: 1.0.0
 * Author: Deloam
 * Author URI: https://seusite.com
 * License: GPL2
 * Text Domain: peerflow
 */
defined('ABSPATH') or die('Acesso negado!');

// Constantes
define('PEERFLOW_VERSION', '1.0');
define('PEERFLOW_PATH', plugin_dir_path(__FILE__));

// Carrega arquivos
require_once PEERFLOW_PATH . 'includes/class-database.php';
require_once PEERFLOW_PATH . 'includes/class-shortcodes.php';

// Ativação
register_activation_hook(__FILE__, ['PeerFlow_Database', 'create_tables']);

// Inicializa
new PeerFlow_Shortcodes();

// Adiciona CSS
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'peerflow-style',
        plugins_url('assets/css/peerflow.css', __FILE__)
    );
});
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script(
        'peerflow-scripts',
        plugins_url('assets/js/peerflow.js', __FILE__),
        ['jquery'],
        PEERFLOW_VERSION,
        true
    );
    
    wp_localize_script('peerflow-scripts', 'peerflow_vars', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('peerflow_nonce')
    ]);
});

defined('ABSPATH') or exit('Acesso negado!'); 

// No hook 'init'
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('peerflow-css', 
        plugins_url('assets/css/peerflow.css', __FILE__),
        [],
        filemtime(plugin_dir_path(__FILE__) . 'assets/css/peerflow.css')
    );

    wp_enqueue_script('peerflow-js', 
        plugins_url('assets/js/peerflow.js', __FILE__),
        ['jquery'],
        filemtime(plugin_dir_path(__FILE__) . 'assets/js/peerflow.js'),
        true
    );

    wp_localize_script('peerflow-js', 'peerflow_vars', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('peerflow_nonce')
    ]);
});
// Garante que o WordPress está carregado
if (!function_exists('add_action')) {
    die('Plugin requer WordPress.');
}