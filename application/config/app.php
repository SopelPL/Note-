<?php

/*
*
*	Główna konfiguracja
*
*/

	/* Tytuł strony */
	$config['main_title'] = "";

	/* Słowa kluczowe */
	$config['main_keywords'] = "";

/* 
*
*	Budowa adresu URL:
*		1. Protokół ( http:// lub https:// )
*		2. Domena	( mojadomena.pl )
*		(Opcjonalnie) 3. Katalog w którym znajduje się strona
*		
*		URL, kiedy strona znajduję się w głównym katalogu strony (np. var/www/html/)
*			http://mojadomena.pl/
*			
*		URL, kiedy strona znajduję się w katalogu strona strony (np. var/www/html/strona/)
*			http://mojadomena.pl/strona/
*/


/* Protokół 
*--------------------------------
* Jeśli nie masz certyfikatu SSL:
*      http://
* Jeśli masz certyfiakt SSL:
*      https://
*/
	$config['main_protocol'] = "http://";

	/*
		Domena (pamiętaj o / na końcu!)
	*/
	$config['main_url'] = "mojadomena.pl/";
	/*
	*	Katalog w którym znajduje się strona (pamiętaj o / na końcu!)
	*	
	*	UWAGA!
	*		JEŚLI PLIKI STRONY NIE ZNAJDUJĄ SIĘ W GŁÓWNYM KATALOGU, ZMIEŃ WARTOŚĆ NA null (bez "")
	*/
	$config['main_directory'] = "katalog/";

	/*
		Tryb strony
		
		dev - Tryb developerski (nie zalecany)
		public - Tryb publiczny (zalecany)
	*/
	$config['main_mode'] = "public";


/*
*
*	Konfiguracja bazy danych
*
*/

	/*
	*	Host bazy danych
	*/
	$config['database_host'] = "";

	/*
	*	Użytkownik bazy danych
	*/
	$config['database_user'] = "";

	/*
	*	Hasło bazy danych
	*/
	$config['database_pass'] = "";

	/*
	*	Port bazy danych
	*/
	$config['database_port'] = 3306;

	/*
	*	Nazwa tabeli
	*/
	$config['database_name'] = "";

	/*
	*	Kodowanie znaków (TUTAJ ZOSTAW USTAWIENIA DOMYŚLNE!)
	*/
	$config['database_char'] = "utf8";


/*
*
*	Ustawienia licencji
*
*	UWAGA!
*		Jeśli nie posiadasz licencji, skontaktuj się ze mną w celu uzyskania klucza licencji!
*	Kontakt:
*		E-mail: sopelplyt@gmail.com
*		Forum LVLUP.PRO: SP24
*
*/

	/*
	*	Klucz licencji
	*/
	$config['license_key'] = "";

	/*
	*	Dodatkowe dane potrzebne do weryfikacji licencji
	*/
	$config['license_data'] = [
		/*
		*	E-mail przypisany do klucza licencji
		*/
		'email' => "",
	];