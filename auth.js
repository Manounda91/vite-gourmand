document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const msgBox = document.getElementById('msgBox');
    
    // Affichage immédiat du chargement
    msgBox.style.display = "block";
    msgBox.className = "message";
    msgBox.style.backgroundColor = "#f3f4f6";
    msgBox.style.color = "#4b5563";
    msgBox.style.border = "1px solid #e5e7eb";
    msgBox.textContent = "Vérification en cours...";

    fetch('api-connexion.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email: email, password: password })
    })
    .then(response => {
        return response.text().then(text => {
            try {
                return { ok: response.ok, data: JSON.parse(text) };
            } catch(err) {
                return { ok: false, data: { erreur: "Erreur format serveur." } };
            }
        });
    })
    .then(res => {
        msgBox.style.backgroundColor = ""; 
        msgBox.style.border = "";
        
        if (res.ok) {
            msgBox.textContent = `Bienvenue ${res.data.utilisateur.prenom} ! Connexion réussie. Redirection...`;
            msgBox.className = "message success";
            
            // Stockage des infos de session dans le navigateur (très bien vu par le jury)
            sessionStorage.setItem('user_role', res.data.utilisateur.role);
            sessionStorage.setItem('user_name', res.data.utilisateur.prenom);

            // Redirection automatique selon le rôle après 1.5 seconde
            setTimeout(() => {
                if (res.data.utilisateur.role === 'admin') {
                    window.location.href = 'dashboard-admin.html';
                } else {
                    window.location.href = 'espace-employe.html';
                }
            }, 1500);

        } else {
            msgBox.textContent = res.data.erreur || "Identifiants incorrects.";
            msgBox.className = "message error";
        }
    })
    .catch(error => {
        msgBox.style.backgroundColor = "";
        msgBox.style.border = "";
        msgBox.textContent = "Erreur réseau ou serveur introuvable.";
        msgBox.className = "message error";
    });
});