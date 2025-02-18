document.getElementById('sendEmailBtn').addEventListener('click', () => {
    const email = document.getElementById('emailInput').value;
    
    if (!selectedProduct) {
        alert('Veuillez sélectionner un produit avant de l\'envoyer.');
        return;
    }

    if (email) {
        const emailData = {
            email: email,
            productName: selectedProduct.name,
            productPdfData: selectedProduct.pdfData  // PDF encodé en Base64
        };

        // Envoyer une requête POST au serveur pour envoyer l'email
        fetch('/send-product-email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(emailData)
        })
        .then(response => response.text())
        .then(data => {
            alert('Le produit a été envoyé à votre adresse email.');
        })
        .catch(error => {
            console.error('Erreur lors de l\'envoi de l\'email:', error);
        });
    } else {
        alert('Veuillez entrer une adresse email valide.');
    }
});
