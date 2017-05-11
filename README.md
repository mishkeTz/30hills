## Sta treba promeniti:

1. config.json 	- Informacije o DB konekciji
2. .htaccess 	- Promeniti putanju za RewriteBase 
3. public/.htaccess - Promeniti putanju za RewriteBase

## Tabele Baze podataka:

1. Export-ovana verzija tabela zajedno sa podacima u njima se nalaze u DB_tables 
2. Podaci se mogu uneti automatski u bazu (ukoliko su tabele kreirane) pokretanjem ~/home/insertallusers 

## Koriscenje:

1. Prikaz svih korisnika iz baze ~/home/users
2. Prikaz odrenjenog korisnika iz baze ~/home/user/{user_id}
3. Kada se prikaze korisnik, izlistavaju se njegovi direktni prijatelji i prijatelji njegovih prijatelja
4. Ukoliko se unese pogresan URL, ako korisnik sa odredjenim ID-om ne postoji ucitava se error/404.php - (u pitanju je jednostavna provera prosledjenog parametra)
