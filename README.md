# Projet Complet: Gestion des Étudiants - Guide Pas à Pas


             Étape 1 : Installation et Configuration de XAMPP
             

1.1 Télécharger et installer XAMPP :


<img width="368" height="308" alt="Capture d&#39;écran 2026-05-21 171911" src="https://github.com/user-attachments/assets/8cc137af-1f1c-4db3-a10b-0c8fce06b603" />


1.2 Démarrer les services :

             Ouvrir XAMPP Control Panel
             

Cliquer sur Start pour Apache (port 80, 443)


Cliquer sur Start pour MySQL (port 3306)


<img width="507" height="332" alt="Capture d&#39;écran 2026-05-21 173205" src="https://github.com/user-attachments/assets/31fbc425-d5c6-4fd7-a834-e37b7e4fe449" />



->  Vérifier que les deux services sont verts (running) 



                     Étape 2 : Création de la Base de données MySQL

                     

2.1 Accéder à phpMyAdmin :


<img width="958" height="428" alt="Capture d&#39;écran 2026-05-21 173233" src="https://github.com/user-attachments/assets/3c0c90ba-a7cc-4c44-ac2d-8524016f67d4" />


-> Ouvrir un navigateur (Chrome/Firefox)

Taper: http://localhost/phpmyadmin

L'interface phpMyAdmin s'ouvre



2.2 Créer la base de données :

avec

CREATE DATABASE school1;


<img width="557" height="356" alt="Capture d&#39;écran 2026-05-21 173308" src="https://github.com/user-attachments/assets/e13cbe1c-9d24-4809-94e0-6d6371c1d28f" />



2.3 Créer la table Etudiant :



<img width="433" height="236" alt="Capture d&#39;écran 2026-05-21 173433" src="https://github.com/user-attachments/assets/d616b5d0-4e94-406b-90fe-e6f8523937ae" />




<img width="481" height="169" alt="Capture d&#39;écran 2026-05-21 173344" src="https://github.com/user-attachments/assets/26823356-2652-426b-b1e0-3eb2d978d3b9" />




<img width="914" height="201" alt="Capture d&#39;écran 2026-05-21 173542" src="https://github.com/user-attachments/assets/801dc150-3704-4058-8b1e-aa3613398265" />



2.4 Définir les colonnes:




<img width="515" height="134" alt="Capture d&#39;écran 2026-05-21 173948" src="https://github.com/user-attachments/assets/c987824a-26dc-490f-977e-1c2245201f2e" />




2.5 Ajouter des données de test :



<img width="601" height="112" alt="Capture d&#39;écran 2026-05-21 174225" src="https://github.com/user-attachments/assets/6268795a-3323-44b5-adb1-6b27d314baf2" />




<img width="467" height="88" alt="Capture d&#39;écran 2026-05-21 174301" src="https://github.com/user-attachments/assets/e72282c0-4484-4758-94d5-f8c7363263c9" />


                      
                      Étape 3 : Création du Projet PHP

   3.1 Créer la structure des dossiers :
   

   <img width="475" height="365" alt="Capture d&#39;écran 2026-05-21 174843" src="https://github.com/user-attachments/assets/985ef345-aa64-408d-a0b3-a005fffa6af6" />



   <img width="881" height="460" alt="Capture d&#39;écran 2026-05-21 180039" src="https://github.com/user-attachments/assets/0a1de66c-d1d5-4ea1-b11b-10acace1e2ce" />




Fichier 1: connexion/Connexion.php :




<img width="601" height="451" alt="image" src="https://github.com/user-attachments/assets/07d1e95a-8b06-4f3d-8439-fc3f6302784d" />




Fichier 2 : classes/Etudiant.php




<img width="617" height="443" alt="image" src="https://github.com/user-attachments/assets/ddb3ba0b-b1a1-427c-8d57-33d90d1b58c2" />




Fichier : dao/IDao.php




<img width="402" height="250" alt="image" src="https://github.com/user-attachments/assets/c989f895-072f-4167-b1c2-6b6784eb3f2a" />




Fichier : service/EtudiantService.php




<img width="601" height="442" alt="image" src="https://github.com/user-attachments/assets/0264df16-734e-42f1-baea-d5827d22b4ed" />


             Étape 6 : Web Services PHP
             
ws/createEtudiant.php :


<img width="835" height="445" alt="image" src="https://github.com/user-attachments/assets/e7e07151-c250-4242-9137-80de4b360f69" />


ws/loadEtudiant.php


<img width="655" height="457" alt="image" src="https://github.com/user-attachments/assets/8f4c7697-5930-4120-9c0e-66ebfb5c01b4" />




          Étape 7 – Tester les Web Services avec Advanced REST Client

<img width="923" height="478" alt="image" src="https://github.com/user-attachments/assets/77594adf-1f1e-4ad5-9c7d-4cb4406e5eba" />





                Rechercher Advanced REST Client


                
                

<img width="779" height="384" alt="image" src="https://github.com/user-attachments/assets/8397ccdc-3b06-4834-ad9e-6f62f9c33ef0" />


<img width="389" height="194" alt="image" src="https://github.com/user-attachments/assets/223fe1b3-ed49-4c37-be46-e2965211dfdc" />




<img width="374" height="243" alt="image" src="https://github.com/user-attachments/assets/0640a5f0-8484-4c0a-92a9-ac886dc28141" />


               2. Test du service d’ajout d’un étudiant


# Method POST :


<img width="655" height="326" alt="image" src="https://github.com/user-attachments/assets/8fae86cc-4cf3-4452-af43-9fca5b311c1e" />



<img width="581" height="337" alt="image" src="https://github.com/user-attachments/assets/96eb5799-45b7-471b-b25b-45115f878b0c" />



<img width="581" height="325" alt="image" src="https://github.com/user-attachments/assets/3c9b05c8-9d61-4b78-b4bc-b108bb8615d9" />


               
               3. Test du service de lecture des étudiants

               

<img width="584" height="326" alt="image" src="https://github.com/user-attachments/assets/62ebba04-1886-43c8-bade-6520d284473d" />


                  Résultat


<img width="596" height="332" alt="image" src="https://github.com/user-attachments/assets/e9698b13-b442-40ed-bd48-cb6a24043ebb" />



            
            Partie 3 — Application Android (Volley + Gson)





