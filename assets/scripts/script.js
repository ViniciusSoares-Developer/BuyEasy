function toogleVisibility(id_input, id_button){
    var icon = id_button.children[0]

    id_input.type = id_input.type === 'password' ? (
        icon.classList.remove("fa-eye"),
        icon.classList.add("fa-eye-slash"),
        'text'
    ) : (
        icon.classList.remove("fa-eye-slash"),
        icon.classList.add("fa-eye"),
        'password'
    );
}