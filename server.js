const express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');
const path = require('path');
const app = express();
const port = process.env.PORT || 3000;  // Pour Heroku ou autre

// Configuration de body-parser pour lire les requêtes JSON
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Servir les fichiers statiques du dossier "public"
app.use(express.static(path.join(__dirname, 'public')));

// Route pour envoyer le produit PDF par email
app.post('/send-product-email', (req, res) => {
    const { email, productName, productPdfData } = req.body;  // Récupérer les données du frontend

    // Configurer le transporteur Nodemailer pour Hotmail
    const transporter = nodemailer.createTransport({
        service: 'hotmail',  // Utiliser le service "hotmail"
        auth: {
            user: 'kiquemarrec@hotmail.fr',  // Remplacez par votre adresse email Hotmail
            pass: 'votre_mot_de_passe_hotmail'  // Remplacez par votre mot de passe Hotmail
        }
    });

    // Configurer l'email avec le PDF en pièce jointe
    const mailOptions = {
        from: 'kiquemarrec@hotmail.fr',
        to: email,  // Email de l'utilisateur
        subject: `Votre produit ${productName} est prêt !`,
        text: `Merci pour votre achat de ${productName}. Le PDF est en pièce jointe.`,
        attachments: [
            {
                filename: `${productName}.pdf`,  // Nom du fichier PDF
                content: productPdfData,         // Contenu du PDF en base64
                encoding: 'base64'               // Encoder en base64
            }
        ]
    };

    // Envoyer l'email
    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            console.error('Erreur lors de l\'envoi de l\'email:', error);
            return res.status(500).send('Erreur lors de l\'envoi de l\'email');
        } else {
            console.log('Email envoyé: ' + info.response);
            return res.status(200).send('Email envoyé avec succès');
        }
    });
});

// Démarrer le serveur
app.listen(port, () => {
    console.log(`Serveur en cours d'exécution sur le port ${port}`);
});
const express = require('express');
const cors = require('cors');
const app = express();

// Middleware
app.use(cors());
app.use(express.json());

// Simuler un utilisateur valide (idéalement, utilisez une base de données)
const adminUser = { email: 'kiquemarrec@hotmail.com', password: 'Onepiece91710!' };

// Route d'authentification
app.post('/api/login', (req, res) => {
    const { email, password } = req.body;

    if (email === adminUser.email && password === adminUser.password) {
        res.json({ success: true });
    } else {
        res.json({ success: false, message: 'Email ou mot de passe incorrect.' });
    }
});

// Lancer le serveur
app.listen(3000, () => {
    console.log('Serveur en écoute sur le port 3000');
});
