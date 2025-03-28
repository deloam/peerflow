<?php
class PeerFlow_Submissions {
    public function __construct() {
        add_action('wp_ajax_peerflow_submit', [$this, 'handle_submission']);
        add_action('wp_ajax_nopriv_peerflow_submit', [$this, 'handle_submission']);
    }

    public function handle_submission() {
        set_time_limit(120);
        // Verifica nonce de segurança
        check_ajax_referer('peerflow_nonce', 'security');
    
        // Validação dos campos
        $data = [
            'title' => sanitize_text_field($_POST['title']),
            'abstract' => sanitize_textarea_field($_POST['abstract']),
            'author_id' => get_current_user_id(),
            'status' => 'pending_review'
        ];
    
        // Insere no banco de dados
        global $wpdb;
        $inserted = $wpdb->insert(
            "{$wpdb->prefix}peerflow_submissions",
            $data
        );
    
        // Resposta JSON
        if ($inserted) {
            wp_send_json_success([
                'message' => 'Trabalho submetido para avaliação!',
                'submission_id' => $wpdb->insert_id
            ]);
        } else {
            wp_send_json_error([
                'message' => 'Erro no banco de dados: ' . $wpdb->last_error
            ]);
        }
    }
    
}