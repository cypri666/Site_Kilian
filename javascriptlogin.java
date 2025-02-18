function selectAvatar(button, avatar) {
    // Désélectionner tous les avatars
    const avatars = document.querySelectorAll('.avatar');
    avatars.forEach(btn => btn.classList.remove('selected'));
    // Sélectionner l'avatar cliqué
    button.classList.add('selected');
    selectedAvatar = avatar;
}
