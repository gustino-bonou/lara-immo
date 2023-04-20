La gestion d'envoie de mail est pris en compte par laravel
Il dispose du'une class Mail qu'on crée ainsi
php artisan make:mail nomMail
Les mails peuvent etre envoyés sous sous forme de texte(plus facile) ou sous forme html, ce qui demande un template déjà préconçus. Mais laravel permet de 
formater les mails html en utilisabt du markdon, ce qui est plutot pratique
Pour cela, il faut adapter la commande de creation de la classe ainsi
php artisan make:mail nomMail --markdown==chemin_de_la_vue


