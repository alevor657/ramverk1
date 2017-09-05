---
title: "Report"
...
<article class="text" markdown="1">
Report
=========================

##### kmom01 #####  
<hr>
###### Gör din egen kunskapsinventering baserat på PHP The Right Way, berätta om dina styrkor och svagheter som du vill förstärka under det kommande året.

Jag har läst igenom hela PHP The Right Way sidan och det verkar som att jag har väldigt mycket att lära mig. Jag kunde fatta vad alla begrepp innebär, det kvarstående är att faktiskt öva på alla dessa saker som jag har aldrig gjort, vilket inte är lätt. Jag har absolut ingen erfarenhet i testing i PHP, eller jo, det hade vi gjort lite, men det går inte att säga att jag kan tester om jag har gjort bara en enda enhetstest, som inte var bra. Dessutom så märkte jag att koden jag producerade i oophp kursen var uppenbarligen icke testbar, så nej, jag vet ingenting om tester.

Design patterns har jag aldrig gjort också. Jag vet vad det är men jag har aldrig en möjlighet att faktiskt implementera de själv i php.  Aldrig gjort localisation eller virtualisation. Har bara hört talats om CI och aldrig gjort det. Automatiserade tester låter som en gåta för mig.
Det är mycket att göra!

###### Vilket blev resultatet från din mini-undersökning om vilka ramverk som för närvarande är mest populära inom PHP (ange källa var du fann informationen)?

Det verkar som att att Laravel är fortfarande det mest populära ramverket inom php världen från år 2014 då Mos gjorde sin undersökning.
</article>

<figure class="figure">
  <img src="https://coderseye.com/wp-content/uploads/google-trends-best-php-frameworks-comparison.png" class="figure-img img-fluid rounded" alt="graph">
  <figcaption class="figure-caption" markdown="1">
  [Källan](https://coderseye.com/best-php-frameworks-for-web-developers/)
  </figcaption>
</figure>

<article class="text" markdown="1">
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
</article>
