const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signUpForm=document.getElementById('signUp');
const signInForm=document.getElementById('signIn');

signUpButton.addEventListener('click', function() {
    signInForm.style.display="none";
    signUpForm.style.display="block";
})

signInButton.addEventListener('click', function() {
    signInForm.style.display="block";
    signUpForm.style.display="none";
})


// Überprüfen, ob eine Flash-Nachricht vorhanden ist
window.onload = function () {
    const flashMessageContainer = document.querySelector('.flash-message-container');
    
    if (flashMessageContainer) {
        const alertBox = flashMessageContainer.querySelector('.alert');
        
        // Wenn eine Nachricht vorhanden ist, zeige sie an
        if (alertBox) {
            flashMessageContainer.style.display = 'flex';  // Stelle sicher, dass die Nachricht sichtbar ist
            
            // Animation der Nachricht starten
            alertBox.classList.add('show');  // Wenn die Nachricht erscheinen soll

            // Setze die Nachricht nach 5 Sekunden wieder zurück (und blendet sie aus)
            setTimeout(function () {
                alertBox.classList.remove('show'); // Entferne die 'show' Klasse für Fade-Out
                setTimeout(function () {
                    flashMessageContainer.style.display = 'none';  // Verstecke die Flash-Nachricht
                }, 500); // Verzögert das Ausblenden der gesamten Nachricht nach der Animation
            }, 5000);  // Zeige die Nachricht für 5 Sekunden
        }
    }
};