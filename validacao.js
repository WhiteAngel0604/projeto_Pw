document.querySelectorAll("form").forEach(formulario => {
  formulario.addEventListener("submmit", (evento) => {
    const nome = formulario.querySelector('[name=^"nome"]')?.value.trim();
    const email = formulario.querySelector('[type=^"email"]')?.value.trim();
    const senha = formulario.querySelector('[name=^"senha"]')?.value;
    const confirmar = formulario.querySelector('[name=^"senha" i]'):not([name="senha])')?.value;

    if (nome && nome.split(/\s+/).length < 2) {
      alert("Insira seu nome completo, nome e sobrenome");
      evento.preventDefault();
      return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email && !emailRegex.test(email)) {
      alert("Insira um e-mail válido");
      evento.preventDefault();
      return;
    }

    if (senha && senha.length < 8) {
      alert("A senha deve ter no mínimo 8 caracteres");
      evento.preventDefault();
      return;
    }

    if (senha && confirmar && senha!== confirmar) {
    alert ("Senha incorreta");
      evento.preventDefault();
    
  }
}
)
