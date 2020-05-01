# Groene Regentes

Dit [Wordpress](https://wordpress.org) thema is speciaal ontwikkeld voor de website van de Groene Regentes, een groep vrijwilligers uit het Regentesse- en Valkenboskwartier in Den Haag.

## De basis

### Doel van de website

De opzet van de website is meer statisch dan de andere sociale media waar de Groene Regentes op actief is. Facebook, Twitter, Instagram en nieuwsbrieven vanuit Mailchimp zijn de kanalen die meer actief worden gebruikt.

### Plugins

Eerdere websites van de Groene Regentes gebruikten erg veel plugins om de website te laten functioneren. Nog steeds geldt Wordpress als de basis voor het content management want voor de redacteuren handig. Voor de website worden alleen strict noodzakelijke plugins gebruikt en dat zijn op dit moment de volgende:
* [HTML Forms](https://wordpress.org/plugins/html-forms/) voor het maken van formulieren
* [WPBruiser](https://wordpress.org/plugins/goodbye-captcha/) ter beveiliging van zowel login als de formulieren (zonder registratie bij Google/reCaptcha of Akismet)
* [Cache Enabler](https://nl.wordpress.org/plugins/cache-enabler/) als één van de betere (en vooral simpeler) cache plugins [getest](https://www.designbombs.com/top-wordpress-caching-plugins-compared/)
* Time.ly [All-in-one](https://wordpress.org/plugins/all-in-one-event-calendar/) kalender voor het als groep delen van activiteiten (voorlopig op deze manier, niet noodzakelijk voor de website)


## Vormgeving

In de vormgeving wordt weer teruggevallen op het oorspronkelijke thema van de eerste website. Informatie op die website werd gepresenteerd in kaders of tegels met afgeronde hoeken. Dit thema wordt ook op veel flyers en posters gebruikt en is daardoor herkenbaar. In het thema wordt gebruik gemaakt van groen en geel als basiskleuren.

### Tegels

De tegels worden weergegeven in `front-page.php` en zijn in feite berichten in Wordpress. De pagina gebruikt meerdere kolommen op een responsive manier zoals de [masonry](https://w3bits.com/labs/css-masonry/) layout. De titel van het bericht wordt als kop weergegeven, het bericht als inhoud.

Afhankelijk van de aangevinkte categorie (*Groen*, *Energie*, *Wonen*, *Vervoer*, ...) waarin het bericht thuishoort wordt er een kleurschema toegepast en een gelijknamige rubriek boven de kop weergegeven. Het aantal rubrieken ligt vast in het thema en bij uitbreiding van de categorie&euml;n vereist dat ook uitbreiding van de stylesheet.

Tegels worden ingezet om een algemene activiteit of een project aan te kondigen. Vanuit een tegel kan met een link doorverwezen worden naar een pagina of een website of bericht op bijvoorbeeld Facebook. De berichten zelf krijgen een URL (permalink) in de vorm `/bericht/...` en deze worden in `single.php` middels een redirect header weer teruggeleid naar de homepage. Zo kent een bericht geen detailpagina.

De volgorde van de tegels kan bepaald worden met de publicatiedatum van het bericht. De berichten worden getoond in kolommen vanaf linksboven waarbij het meest recente bericht links bovenaan staat en het oudste bericht rechts onderaan. Voor het oudste bericht houden we de *Over ons* en *Contact* tegels aan.

De inhoud van de tegels is vrij, er kan bijvoorbeeld ook alleen een afbeelding gekozen worden. Wanneer deze de categorie *Afbeelding* krijgt wordt deze als gehele tegel getoond zonder kop.

Het is van belang om bij de [instellingen](/wp-admin/options-reading.php#posts_per_page) in Wordpress het aantal getoonde berichten op de sitepagina omhoog te schroeven naar bijvoorbeeld 100. Zo worden tenminste alle tegels getoond die je hebt gedefinieerd als berichten.gebeurt

Met `category.php` worden de tegels van één categorie over de volle breedte getoond.

### Pagina's

Uitgebreide informatie over projecten of anderszins wordt in pagina's weergegeven. Iedere pagina kan een uitgelichte afbeelding als kop krijgen. Deze worden met een `object-fit: cover` weergegeven, dus het midden van de afbeelding wordt altijd getoond.

Eén pagina met de slug `kalender` wordt uitgezonderd want de Time.ly kalender gebruikt `ul` voor menu's en die kregen door de `wp3.css` stylesheet een verkeerde layout.


## Implementatie

### Stylesheet

Er wordt &eacute;&eacute;n stylesheet geladen. Deze is in [Sassy CSS](https://sass-lang.com/) geschreven en gebruikt [W3CSS](https://www.w3schools.com/w3css/) als basis. Het thema is daardoor responsive en puur op CSS gebaseerd. Het toont zich op de meeste moderne webbrowser goed.

Het *compileren* van het `wp3.scss` naar `wp3.css` gebeurt door middel van de [scssphp](https://leafo.net/scssphp/) module. Een script met de naam `make.php` is toegevoegd in de root van het thema om dit [handmatig](/wp-content/themes/groeneregentes/make.php) uit te kunnen voeren.

### Javascript

Onder andere [Leaflet](https://leafletjs.com/) staat klaar omdat de site een [OpenStreetmap](https://www.openstreetmap.org/) kaart bevat. Verder kent de website minimale toepassing van Javascript voor de navigatie.
