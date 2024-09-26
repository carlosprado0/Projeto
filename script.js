 // Função para exibir o pop-up após 3 segundos
 setTimeout(function() {
    document.getElementById("popup").style.display = "block";
}, 3000);

// Fechar o pop-up ao clicar no botão "X"
document.getElementById("close-btn").onclick = function() {
    document.getElementById("popup").style.display = "none";
}

$(document).ready(function() {
    $('#popupForm').on('submit', function(event) {
        event.preventDefault(); // Impede o comportamento padrão do envio do formulário

        // Captura os dados do formulário
        var formData = $(this).serialize();

        // Envia os dados via AJAX
        $.ajax({
            url: 'cadastro.php',
            type: 'POST',
            data: formData,
            dataType: 'json',  // Espera receber JSON
            success: function(response) {
                if (response.success) {
                    // Se for sucesso, exibe a mensagem de sucesso
                    $('#resultMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                    $('#popupForm')[0].reset();  // Limpa o formulário
                } else {
                    // Se houver erros, exibe os erros
                    let errorMessages = response.errors.map(error => '<li>' + error + '</li>').join('');
                    $('#resultMessage').html('<div class="alert alert-danger"><ul>' + errorMessages + '</ul></div>');
                }
            },
            error: function(xhr, status, error) {
                console.error("Erro AJAX: " + xhr.responseText);
                $('#resultMessage').html('<div class="alert alert-danger">Erro ao enviar dados. Tente novamente.</div>');
            }
        });
    });
});