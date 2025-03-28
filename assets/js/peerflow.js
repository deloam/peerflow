jQuery(document).ready(function ($) {
  // Submissão de Trabalhos
  $("#peerflow-submission-form").submit(function (e) {
    e.preventDefault();

    $.ajax({
      url: peerflow_vars.ajaxurl,
      type: "POST",
      data: {
        action: "peerflow_submit_work",
        title: $("#peerflow-title").val(),
        abstract: $("#peerflow-abstract").val(),
        security: peerflow_vars.nonce,
      },
      beforeSend: function () {
        $("#peerflow-submit-btn").prop("disabled", true).text("Enviando...");
      },
      success: function (response) {
        if (response.success) {
          alert(response.data.message);
          $("#peerflow-submission-form")[0].reset();
          location.reload(); // Atualiza o dashboard
        } else {
          alert("Erro: " + response.data.message);
        }
      },
      complete: function () {
        $("#peerflow-submit-btn")
          .prop("disabled", false)
          .text("Enviar Trabalho");
      },
    });
  });
});
