<?php
class PeerFlow_Database {
    public static function create_tables() {
        global $wpdb;
        
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'peerflow_submissions';

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            author_id mediumint(9) NOT NULL,
            title varchar(200) NOT NULL,
            abstract text NOT NULL,
            thematic_session varchar(100) NOT NULL,
            status varchar(20) DEFAULT 'pending',
            submission_date datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}