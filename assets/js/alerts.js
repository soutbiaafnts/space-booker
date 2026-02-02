const params = new URLSearchParams(window.location.search);

const messages = {
  success: {
    cancelled: "Reserva cancelada com sucesso!",
    create: "Criado com sucesso!",
    updated: "Atualizado com sucesso!",
    deleted: "Deletado com sucesso!",
  },
  error: {
    notCancelled: "Não foi possível cancelar a reserva.",
    conflict: "Já existe uma reserva nesse horário.",
    internal: "Ocorreu um erro interno.",
    emptyFields: "Campos vazios. Tente novamente!",
    emptyName: "Não é possível criar um espaço sem nome!",
    wrongUser: "Você não tem permissão para essa ação.",
    emptyUser: "Nenhum usuário identificado.",
    wrongPassword: "Senha incorreta. Tente novamente!",
    invalidTime: "Horário de encerramento deve ser antes do de início.",
  },
};

if (params.has("success")) {
  const key = params.get("success");
  if (messages.success[key]) {
    alert(messages.success[key]);
  }
}

if (params.has("error")) {
  const key = params.get("error");
  if (messages.error[key]) {
    alert(messages.error[key]);
  }
}

if (params.has("success") || params.has("error")) {
  window.history.replaceState({}, document.title, window.location.pathname);
}
