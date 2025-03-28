<?php
class PeerFlow_Shortcodes {
    public function __construct() {
        add_shortcode('peerflow_submission_form', [$this, 'render_submission_form']);
    }

    public function render_submission_form() {
        ob_start(); ?>
        <div class="peerflow-submission-bar" style="background: #f0f0f0; padding: 15px; margin-bottom: 20px;">
            <h3 style="margin-top:0;">Submeter Trabalho</h3>
            <form id="peerflow-submission-form">
                <input type="text" name="title" placeholder="Título do Trabalho" required style="padding: 8px; width: 300px;">
                
                <select name="thematic_session" required style="padding: 8px;">
                    <option value="">Selecione a Sessão Temática</option>
                    <option value="clima">Emergências Climáticas</option>
                    <option value="amazonia">Dinâmicas Pan-Amazônicas</option>
                </select>
                
                <textarea name="abstract" placeholder="Resumo (máx. 500 palavras)" required style="width: 100%; padding: 8px;"></textarea>
                
                <button type="submit" style="background: #2271b1; color: white; padding: 8px 15px; border: none;">Enviar</button>
            </form>
        </div>
        <?php
        return ob_get_clean();
    }
    public function render_author_dashboard() {
        if (!is_user_logged_in()) {
            return '<div class="peerflow-alert">Faça login para acessar esta área</div>';
        }
    
        global $wpdb;
        $submissions = $wpdb->get_results(
            $wpdb->prepare("SELECT * FROM {$wpdb->prefix}peerflow_submissions WHERE author_id = %d", get_current_user_id())
        );
    
        ob_start(); ?>
        <div class="peerflow-dashboard">
            <h3>Meus Trabalhos Submetidos</h3>
            <?php if ($submissions) : ?>
                <table class="peerflow-submissions">
                    <!-- Cabeçalho da tabela -->
                    <?php foreach ($submissions as $submission) : ?>
                        <tr>
                            <td><?= esc_html($submission->title) ?></td>
                            <td><?= ucfirst($submission->status) ?></td>
                            <td>
                                <a href="#" class="peerflow-action" data-submission="<?= $submission->id ?>">
                                    Ver detalhes
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <p>Nenhum trabalho submetido ainda.</p>
            <?php endif; ?>
        </div>
        <?php
        return ob_get_clean();
    }
}
