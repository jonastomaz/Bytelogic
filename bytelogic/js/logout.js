function confirmarLogout() {

    if (confirm("Deseja realmente sair?")) {
        window.location.href = "../auth/logout.php";
    }

}