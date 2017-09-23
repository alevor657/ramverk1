---
title: "Report"
class: "report"
...
Report
=========================

##### kmom01 #####

---------------------------------------

###### Gör din egen kunskapsinventering baserat på PHP The Right Way, berätta om dina styrkor och svagheter som du vill förstärka under det kommande året.

Jag har läst igenom hela PHP The Right Way sidan och det verkar som att jag har väldigt mycket att lära mig. Jag kunde fatta vad alla begrepp innebär, det kvarstående är att faktiskt öva på alla dessa saker som jag har aldrig gjort, vilket inte är lätt. Jag har absolut ingen erfarenhet i testing i PHP, eller jo, det hade vi gjort lite, men det går inte att säga att jag kan tester om jag har gjort bara en enda enhetstest, som inte var bra. Dessutom så märkte jag att koden jag producerade i oophp kursen var uppenbarligen icke testbar, så nej, jag vet ingenting om tester.

Design patterns har jag aldrig gjort också. Jag vet vad det är men jag har aldrig en möjlighet att faktiskt implementera de själv i php.  Aldrig gjort localisation eller virtualisation. Har bara hört talats om CI och aldrig gjort det. Automatiserade tester låter som en gåta för mig.
Det är mycket att göra!

###### Vilket blev resultatet från din mini-undersökning om vilka ramverk som för närvarande är mest populära inom PHP (ange källa var du fann informationen)?

Det verkar som att att Laravel är fortfarande det mest populära ramverket inom php världen från år 2014 då Mos gjorde sin undersökning.

<figure class="figure">
  <img src="https://coderseye.com/wp-content/uploads/google-trends-best-php-frameworks-comparison.png" class="figure-img img-fluid rounded" alt="graph">
  <figcaption class="figure-caption" markdown="1">
  [Källan](https://coderseye.com/best-php-frameworks-for-web-developers/)
  </figcaption>
</figure>

År 2014 hade alla stora ramverk ungefär samma antal sökningar. Det intressanta är att Laravel kom upp i populäritet ganska snabbt, det ser man på det stigande kurvan. Det visade sig till slut att det är det mest populära ramverket nuförtiden.

En annan intressant sak är att alla dessa kurvor går ner väldigt snabbt i slutet av grafen. Vad kan det betyda? Kan det vara så att php håller på och dö? Det får vi se. Det kan ha en anknytning till att folk börjar flytta till Python för att driva webben.

###### Berätta om din syn/erfarenhet generellt kring communities och specifikt communities inom opensource och programmeringsdomänen.

Jag tycker att varje community är en positiv sak oberoende på vad den handlar om. Att man delar sina kunskaper med andra gör att folk lär sig snabbare, vilket leder till en snabbare utveckling. I tekniskt sammanhang betyder det att folk blir bättre på vad de gör, detta gör att produkten som programmerare producerar får högre kvalitetsnivå. Är inte det trevligt?

Dessutom så skapas det mycket i sådana communities. Folk kommer upp med nya lösningar som förbättrar vardagen, helt enkelt. Skulle det inte finnas communities i programmering då skulle vi inte ha så mycket information och mjukvara som finns nuförtiden.
Varje individ kan välja bland massa av olika tekniker som passar bäst till det man håller på.

Jag har aldrig varit med i någon programmeringscommunity om man inte räknar med dbwebb. Personligt så tycker jag att det är väldigt givande att dela med sig och lyssna eller läsa på vad folk berättar. Detta hjälper att skapa både förståelse och intresse.

###### Vad tror du om begreppet “en ramverkslös värld” som framfördes i videon?

Jag tycker att det precis det som programmering i sig har alltid strävat efter. Från början ville man dela på koden, göra så att den blir modulär och återanvändbar. OOP handlar mycket om detta. Det finns massa problem med detta, det största är att bestämma hur exakt bygger man sådana system som är så att säga utbytbara. Det är därför man har till exempel PHP-FIG, en organisation som försöker att standardisera allt inom phpvärlden.

Jag håller med idén att man bör ta ett steg ifrån limma mellan olika delar av ramverket och sträva efter mer frihet. Just nu så pågår exakt detta inte para i php världen, men också i frontend. Facebook hade kommit upp med sin React, till exempel.

###### Hur gick dina förberedelser inför kommentarssystemet?

Jag tycker att det bästa sättet att komma igång med en sådant system är att modulera en databas. Så jag ser det som så:

1. Det finns ett tema, tråd eller vad är det nu är, som äger sina kommentarer.
2. Kommentarerna är kopplade till temat och ligger i en tabell, det blir one-to-many relation. En kommentar kan ha ett tema, tema har många kommentarer.
3. Kommentar kan ha många underkommentarer som också ligger i en separat tabell. Nu tänker jag på det viset som Stackoverflow fungerar.
4. I kommentartabellen ligger det användarnamn, datum för när det läggs in, raderingsdatum, uppdateringsdatum, tillsammans med dess text.
5. Underkommentar är kopplat till sin förälderkommentar.

Det jag kan återanvända är loginsystemet och databasmodulen, dock så ska jag bearbera koden igen så att det blir inga bekymmer och för att få tillfredsställelsen.

##### kmom02 #####

---------------------------------------

###### Vilka tidigare erfarenheter har du av MVC? Använde du någon speciell källa för att läsa på om MVC? Kan du med egna ord förklara någon fördel med kontroller/modell-begreppet, så som du ser på det?

Jag har använt flask i samband med oopython kursen, annars så har jag inte erfarenheter som inblandar designmönster.
För att läsa mer om MVC arkitektur så använde jag de källor som fanns med i kmom. Det var väldigt spännande att titta på konferenser tycker jag. De ger en överblick av världen omkring, och det är ofta folk som är värda att lyssna på.
Om man delar kod i en kontroller och modell som implementerar funktionaliteten då kan man byta ut modellen man använder eller dela den med andra. Detta bidrar till det som kallar en ramverkslös värld och OOP generellt. Det finns ett lager som utför arbete, och den ska ju utföra bara det den ska, inte mer eller mindre. Kontrollern behandlar request, modellen lyfter vikt liksom.

###### Kom du fram till vad begreppet SOLID innebar och vilka källor använde du? Kan du förklara SOLID på ett par rader med dina egna ord?

SOLID är en akronym som kom fram i slutet av nittitalet och har att göra först och främst med OOP. Den formulerar ett tankesätt som en programmerare ska hålla sig till om den skapar OOP kod. Det känns lite flummigt och oklart, men jag tror att det kommer lösas med tiden.

S står för Single responsability, och det innebär att varje klass ska göra en enda sak.
O står för Open Closed principle vilket innebär att program ska vara stängda för modifikation men tillåta extension, precis som vi gör med anax moduler.
L är Liskov substitution principle. Den säger att objekt i programmet ska vara utbytbara mot sina subtyper utan att något i programmet går fel.
I står för interface segregation. Den säger att interfaces ska vara så specifika som möjligt.
D står för dependency inversion. Tanken är att beroenden ska vara en abstraktion, inte något konkret.

###### Gick arbetet med REM servern bra och du lyckades integrera den i din me-sida?

Det var väldigt enkelt, inga konstigheter. Artikeln var väldigt bra, som vanligt. Dessutom så fick vi ett exempel på hur strukturerar man koden.

###### Berätta om arbetet med din kommentarsmodul, hur långt har du kommit och hur tänker du?

Jag har valt att ta databasvägen direkt, så jag sparar inget i cookies för att jag känner att det är fel, dessutom så får jag inte göra om det sedan. Så jag kör som vanligt, anax db modulen, MySQL databas. Just nu så är det bara en tabell med allt som behövs, men det kommer ju att bli lite med avancerat med tiden.
Just nu så har jag ett fungerande kommentarsystem som är kopplat till bluray. Jag har lyckats att strukturera kod enligt anvisningarna i en kontroller och modell, det kändes trevligt att göra det. Saker faller på sin platts nu och jag får mer uppfattning om anax arkitektur i helhet.

##### kmom03 #####

---------------------------------------

###### Hur känns det att jobba med begreppen kring dependency injection, service locator och lazy loading?

Jag hade väldigt få problem med implementationen, allt föll på sin plats. Det är smidigt att använda dependency injection och lazy loadnig, det känns trevligt när man vet att man använder best practices. Men rent kodmässigt blev det find och replace för mig.

###### Hur känns det att göra dig av med beroendet till $app, blir $id bättre?

Rent användarmässigt känns det lite obekvämt, först måste man lägga till alla tjänster som sta användas I variabler innan man faktiskt använder de. Det blir mer kodrader, vilket känns lite konstigt. Men annars så har jag absolut inga problem med detta, jag använder inte app där den inte ska användas.

###### Hur känns det att återigen göra refaktoring på din me-sida, blir det förbättringar på kodstrukturen, eller bara annorlunda?

Det känns som att det blir bara annorlunda, jag tror inte att man inte kan få en känsla av det man gör I en sån liten projekt som vi har. Sedan oopython kursen så var jag van med utseende på routern som vi hade då. Det kändes lite konstigt att bygga om till det vi fick. Det blev bara svårare att fatta för min del. På den andra sidan så vet jag att vi använder de bästa praktiken. Hoppas på att jag kommer att faktiskt få en känsla av varför det ska vara på det sättet som det är. Det är svårt att förstå fördelar med en sådan upplägg om man aldrig har haft behov av en liknande struktur. Men rent teoretiskt så fattar jag varför det är som det är.

###### Lyckades du införa begreppen kring DI när du vidareutvecklade ditt kommentarssystem?

Oja, absolut. Det var väldigt få ändringar för mig, det gick smärtfritt om man inte räknar med problemet att min data variabeln som jag skickade till vyn inte funkade. Men det löste sig.
Påbörjade du arbetet (hur gick det) med databasmodellen eller avvaktar du till kommande kmom?

Jag valde att avvakta för att jag redan har en databas och vill inte göra om så mycket I nästa kmom. Jag kommer att ta det steg för steg. Jag vill börja med active record direkt. Tycker att det blir mer optimalt.

Allmänna kommentare kring din me-sida och dess kodstruktur?


Nu blev det mer MVC likt tycker jag. Det finns platser där $app fortfarande används, Routern är helt ombyggd, så jag använder aldrig app, om jag inte missar något. Jag saknar lite docblockkommentarer, men det är lugnt såhär långt tycker jag. Annars så försöker jag mitt bästa att använda allting anax erbjuder, till exempel regioner. Har också fått bort html ifrån md filer. Så det blev bra, tycker jag.
