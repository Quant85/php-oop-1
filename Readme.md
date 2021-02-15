# OOP - Object Oriented Programming - il paradigma a oggetti

L' unità principale di programmazione è "***l'oggetto***" (nei sistemi basati sui prototipi) oppure "***la classe***" ( nei sistemi basati sulle classi).
Questi  oggetti, definibili *virtuali* sono "**astrazioni concettuali**" degli oggetti reali che essi vogliono modellare.
Questi ultimi possono essere oggetti più generali (e.s un computer) oppure oggetti specifici, quindi maggiormente specializzati, (e.s scheda madre, scheda video ecc).

Noi utilizziamo tali oggetti senza sapere nulla della complessità con cui sono costruiti e comunichiamo con essi attraverso *messaggi* (e.s sposta puntatore, digitiamo caratteri) e *interfacce* (mouse, tastiera).

Essi sono dotati di ***attributi*** o caratteristiche (e.s. velocità del processore, colore del case, ecc..) che possono essere **letti**, ed in alcuni casi, **modificati**.

Questi oggetti reali vengono posti come *modello* per la costruzione di sistemi software a oggetti, dove l'oggetto (o la classe) avrà dei ***metodi*** per l'invio dei messaggi e degli ***attributi*** che rappresentano i dati da manipolare.

A tal proposito i principi fondamentali della programmazione orientata agli oggetti sono:

* Incapsulamento
* Ereditarietà
* Astrazione
* Polimorfismo

## Incapsulamento

I dati ed il codice di un *oggetto* sono ***protetti*** da accessi *arbitrari*, dove per dati e codice si intendono tutti i *membri di una classe*, sia che essi siano membri *dati* (in gergo definiti ***campi***) che  menbri *funzione* (in gergo definiti ***metodi***). La protezione dell'accesso viene effettuata applicando ai membri della classe, degli ***specificatori*** o modificatori di accesso, definiti come:

  `public`, concui si consente l'accesso a un memebro di unaclasse da parte dei metodi di altre classi;
  `protected`, con cui si consente l'accesso a un membro di una classe solo da parte di metodi appartenenti alle sue ***classi derivate***;
  `private`, con cui un membro di una classe non è accessibile nè da metodi di altre classi nè da quelli delle sue classi derivate, ma soltanto dai metodi dellasua stessa classe.

### 1.1 Public

Le proprietà e i metodi dichiarati `public`, non hanno nessun tipo di restrizione e sono utilizzabili da tutte le classi.

    <?php
      class Person {
        public $name;
        public function __construct(string $name)
        {
            $this->name = $name;
        }
        public function getName(){
            return $this->name;
        }
      }
      $son1 = new Person("Carlo Magno");
      $father1 = new Person("Pipino il Breve");
      echo "<h2>Il padre di {$son1->getName()} è {$father1->getName()} </h2>"; 
    ?>

In questo caso è possibile accedere ai membri pubblici sia dall'interno di un oggetto tramite

`$son1->getName();`

sia all'interno del *metodo* `getName`, attraverso la variabile speciale `$this`.

### 1.2 Protected

Lo *specificatore* di accesso protetto, consente alla classe derivata di accedere ai *campi* e ai *metodi* della classe base, ma non permette l'accesso globale da parte di altri oggetti e funzioni.

    <?php
      class Person {
        protected $name;
      }
      class Emperor extends Person {
        function setName($name) {
          $this->name = $name;
        }
      }
      $emperor = new Emperor();
      $emperor->setName("Carlo Magno");
      var_dump($emperor);
      $emperor->name = "Carlo Magno"; // questo provoca un errore in quanto $name è protected e non public
    ?>

In questo caso `$this->name = $name;` presente nel metodo `setName` fa riferimento al *campo* dati `$name` della classe `Person` e l'accesso è possibile in quanto la variabile `$name` è stata dichiarata come `protected` e quindi accessibile dalle classi derivate.
Di fatto in `var_dump($emperor);` restituisce

    object(Emperor)#3 (1) { ["name":protected]=> string(11) "Carlo Magno" }

A sua differenza l'istruzione `$emperor->name;` genererà un errore

    [HTTP/1.0 500 Internal Server Error 11ms]
    Stato 500 Internal Server Error

### 1.3 Private

I membri dichiarati `private` sono accessibili e modificabili soltanto all'interno delle classi che li dichiarano, cosi come i metodi privati sono richiamabili solo al loro interno.
Di fatto sono simili ai membri `protected` con la differenza che le proprietà `private` sono ***invisivibili*** anche alle classi ereditarie.

    <?php
      class Person {
        public $name;
        private $age;
        public function __construct($name, $age)
        {
          $this->name = $name;
          $this->age = $age;
        }
        private function get_age(){
          return $this->age;
        }
        public function print_age(){
          return $this->get_age();
        }
      }
      $customer1 = new Person3("Carlo Magno",34);
      echo "<ul><li>Nome:  {$customer1->name}. </li>";
      echo "<li>Anni: {$customer1->print_age()}</li></ul>";
      echo "Anni: {$customer1->age}"; // questo provoca un errore
    ?>

In questo caso la proprietà `$name` e id il metodo `print_age();` sono entrambi pubblici, quindi accessibili globalmente, mentre l'unico modo per poter accedere al valore della proprietà `age`, è tramite un metodo pubblico (per accedervi all'esterno) o un metodo protetto se vogliamo accedere solo dalle classi che godono di ereditarietà. In questo caso ci si può servire del metodo pubblico `print_age();`.

Se invece usiamo l'istruzione `$customer1->age`, essa causerà un errore poichè stiamo cercando di accedere ad un *campo* `private` fuori dalla classe.

## Ereditarietà

Mediante ***l'ereditarietà*** una classe può avere *relazioni* con altre classi, dove con ***relazione di ereditarietà*** si intende una relazione *gerarchica* di parentela *padre-figlio*, dove una classe figlio ( *classe derivata* o **sottoclasse** ) deriva da una classe padre (definita *classe base* o ***superclasse***), comprendendo i metodi e le proprietà, pubbliche e protette, oltre a quelle da essa stessa definite. Con l'ereditarietà si può creare inizialmente un modello che da principio è generico e minimal (con solo classi base), che man mano dovesse presentarsi l'esigenza, può esser esteso attraverso la creazione di sottomodelli sempre più specializzati (classi derivate a loro volta con altre sottoclassi).

Per creare relazioni di ereditarietà tra due classi si utilizza la parola chiave `extends`.

    <?php
      class classefliglio extends classepadre{
      ...
      }
    ?>
La `classefiglio` è una *classe derivata* della *superclasse* `classepadre`.

Questo ci permette di ovviare ad un problema comune che si viene a genereare spesso, che gli oggetti sono molto simili tra loro in termini di logica (metodi e funzioni) ma non sono **completamente** uguali. Grazie *all'ereditarietà* possiamo riutilizzare la logica comune  presente nella *superclasse* ed estrarre la logica univoca nella *sottoclasse*

![esempio ereditarietà](/img/uml-eredita.jpg)

Un insegnante privato è un tipo di insegnante, ma ogni insegnante è un tipo di persona.

Mettiamo il caso che ci serva gestire insegnanti pubblici e insegnanti privati, ma anche alti tipi di persone come gli studenti. Con una gerarchia di classi cosi strutturata, possiamo aggiungere alla nuova classe solo ciò che è necessario e riutilizzare la logica delle classi genitori.

## Astrazione

*L'astrazione* è un'estensione naturale *dell'incapsulamento*. Esso punta a **semplificare** un problema complesso mediante la ricerca di una soluzione **generale** e **riutilizzabile** in tutte le situazioni riconducibili ad una certa casistica.

Se immaginiamo una coda di persone al casello autostradale, esse ad ogni casello verranno servite mediante un criterio di servizio chiamato FIFO (first in, first out). <!-- (opposto a quello di servizio sugli autobus/metro italiani, chi più spinge vince) -->
Allo stesso modo se immaginiamo una catena di montaggio di automobili, le vetture che per prima entrano nella catena sequenziale di montaggio sono le prima ad uscire da essa.
Stesso concetto è applicabile alle comande di un ristorante ed altre casistiche.

Quindi se bene questi casi possano sembrare differenti tra loro, c'è una cosa che li accomuna: **la coda.**

Bene in questo caso ci siamo serviti dell'astrazione per definire un *modello generale* per risolvere casi particolari.
Nella modellizzazione della FIFO non c'interessa il tipo di elemento che sta al suo interno, ma solo che l'oggetto che entra per primo è quello servito per primo, e di conseguenza uscirà per primo.

Per tali ragioni l'astrazione è una caratteristica che rende efficente l'incapsulamento, tuttavia effettuare un'astrazione forzata potrebbe tornare controproducent, per tale modivi va definita caso per caso.

## Polimorfismo

Il *poimorfismo* ci permette di scrivere codice in modo generico ed estendibile, grazie al concetto che "*una classe base può riferirsi a tutte le sue classi derivate cambiando di fatto la sua* ***forma***.

Se avessimo un uomo, una scimmia e un leone, che eseguono l'azione di camminare, pur facendo parte di una *super classe* `EsseriViventi, ciascuno ha un suo modo di camminare.

In questo caso `EsseriViventi` è un'interfaccia comune e le classi figlio implementano i metodi in essa contenuti.

Se avessimo come *interfaccia* una *superclasse* chiamata ***FigureGeometriche***, per effettuare il calcolo di una "**non definita**" figura geometrica, in questa classe potremmo definire solo i *nomi dei metodi*, senza specificare il contenuto.

* **calcolaArea()**
* **calcolaPerimetro()**

Successivamente potremmo definire le *classi derivate* **Triangolo**,**Cerchio** e **Rettangolo**, implementnado ciò che è stato definito in **FigureGeometriche**, cioè tutte le classi avranno al loro interno due metodi chiamati **calcolaArea()** e **calcolaPerimetro()**, ma con logiche completamente differenti, poichè l'area del triangolo non si calcola come l'area del cerchio.

![esempio polimorfismo](/img/uml-polimorfismo.jpg)

Successivamente quindi potremmo creare tre oggetti di *tipo* **FigureGeometriche** e inizializzarli rispettivamente come **new Triangolo**, **new Cerchio** o **new Rettangolo**. Quando si proverà a calcolare l'area di una figura (un corrispondente oggetto di uno dei tre tipi), entra in gioco il polimosfirmo che stabilisce quale metodo di quale classe chiamare.
