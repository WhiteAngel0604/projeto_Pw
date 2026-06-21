document.querySelectorAll("form").forEach(formulario => {
    formulario.addEventListener("submit", (evento) => {
  
        const nome = formulario.querySelector('[name^="nome"]')?.value.trim();
        const email = formulario.querySelector('[type="email"]')?.value.trim();
        const senha = formulario.querySelector('[name="senha"]')?.value;
        const confirmar = formulario.querySelector('[name*="senha" i]:not([name="senha"])')?.value;

        if (nome && nome.split(/\s+/).length < 2) {
            alert("Por favor, insira seu nome completo (Nome e Sobrenome).");
            evento.preventDefault(); // Trava o envio para o PHP se houver erro
            return;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailRegex.test(email)) {
            alert("Por favor, insira um e-mail válido.");
            evento.preventDefault();
            return;
        }

        if (senha && senha.length < 8) {
            alert("A senha deve conter no mínimo 6 caracteres.");
            evento.preventDefault();
            return;
        }

        if (senha && confirmar && senha !== confirmar) {
            alert("As senhas não coincidem!");
            evento.preventDefault();
        }
    });
});
