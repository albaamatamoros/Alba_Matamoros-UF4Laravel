# Alba_Matamoros-UF4Laravel

Aquest és el meu projecte de Laravel, desenvolupat com a part de la UF4. L'objectiu era **migrar una aplicació feta en PHP natiu a Laravel**, mantenint tota la seva funcionalitat original i aprofitant els avantatges del framework.

## 📁 Contingut del projecte

En aquest projecte he migrat totes les funcionalitats de la versió en PHP natiu a Laravel, incloent:

- Autenticació d'usuaris (registre, login, logout i Oauth)
- Gestió de personatges (inserció, modificació, esborrat, consulta)
- Perfil d'usuari
- Canvi de contrasenya (Email i normal)
- Arxiu pirata (Api)
- Ús de cookies per preferències d'usuari
- Control d'usuaris (admin)

## 🧩 Migració

No he migrat els següents components:

- 📷 **Lector de codis QR**
- ⚙️ **Funcionalitats amb AJAX**

Tota la resta d’unitats formatives estan correctament implementades a Laravel.

## ⚠️ Errors 500 i 404

Per provar els errors **500** i **404**, podeu **descomentar les línies de producció i 'false'** dins del fitxer `.env`.

APP_ENV=production
APP_DEBUG=false

Això us permetrà visualitzar com es gestionen els errors en mode producció.

## 🔐 Usuaris per provar

Com sempre, deixo dos usuaris preparats per poder accedir a l'aplicació:

| Usuari      | Contrasenya | Rol            |
|-------------|-------------|----------------|
| amatamoros  | P@ssw0rd    | Administrador  |
| ppica       | P@ssw0rd    | Usuari normal  |

## 🗃️ Base de dades

El fitxer que conté la base de dades i que podeu importar es diu: ddb237716.sql

---

💻 Fet per **Alba Matamoros Morales**


