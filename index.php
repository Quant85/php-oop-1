<?php
/* Istruzioni:
  Create una classe per descrivere un entitá, assegnatele degli attributi, utilizzate il constructor. Create alcune istanze della classe. Stampate a schermo gli attributi di ogni istanza.
  Per chi non ha fantasia ecco qualche entitá che potete usare:
  Animale, Persona, Casa, Computer, Hotel, Film, Videogioco, Sport, Bicicletta, Veicolo, Nazione etc. */

/**class Fumetti
 * @author Antonio Q. antonio.85.q@gmail.com
 * @copyright 2021 A.Q.
 * 
 */

class Fumetti {
  public $disponibile;
  public $cover;
  public $titolo;
  public $titolo_alternativo;
  public $autori;
  public $anno_uscita;
  public $tipo;
  public $generi;
  public $isbn;
  public $prezzo;

  public function __construct(bool $disponibile = false, string $cover, string $titolo, array $titolo_alternativo, string $autori, int $anno_uscita, string $trama, string $tipo, array $generi, float $prezzo)
  {
    $this->disponibile = $disponibile;
    $this->cover = $cover;
    $this->titolo = $titolo;
    $this->titolo_alternativo = $titolo_alternativo;
    $this->autori = $autori;
    $this->anno_uscita = $anno_uscita;
    $this->trama = $trama;
    $this->tipo = $tipo;
    $this->generi = $generi;
    $this->prezzo = $prezzo;
  }
  /**
   * Funzione di check magazzino
   * @author Antonio antonio.85.q@gmail.com
   * @copyright 2021 A.Q.
   * @return string info sull'acquistabilità immediata o su ordinazione
   */
  public function magazzino()
  {
      return $this->disponibile ? "acquistabile" : "da ordinare";
  }
}
$fumetti = [
  new Fumetti(
    true,
    './img/fumetti/berserk.jpg',
    'Berserk',
    ['Beruseruku'],
    'Kentarō Miura',
    1989,
    'Berserk è la storia di Gatsu, un trovatello che viene allevato da un condottiero di ventura. iniziato alle arti militari già a 6 anni diviene ben presto un guerriero molto forte che, nonostante proposte di carriera molto “allettanti” che lo porterebbero a non vivere più il terrore della morte, sogno di ogni poveretto che disgraziatamente si guadagna da vivere come mercenario, decide di vagare di battaglia in battaglia. Si unisce ad un gruppo mercenario capitanato da un ragazzo di non nobili origini, Grifis, che lo sconfigge in duello conquistando così la sua vita (“tu mi appartieni, deciderò io quando morirai”)...',
    'manga seinen',
    ['Azione','Avventura','Fantasy','Horror','Psicologico','Seinen','Soprannaturale','Tragico']
    ,2.28),
    new Fumetti(
    false,
    './img/fumetti/black_cat.jpg',
    'Black Cat',
    ['Burakku Kyatto','Gato Negro','Kuro Neko'],
    'Yabuki Kentaro',
    2000,
    'Protagonista di quest\'anime è Train, un giovane ragazzo che svolge il ruolo di assassino su incarico di una società di livello globale. La vita di Train cambia però radicalmente nel momento in cui incontra Saya, una ragazza che mette in dubbio le sue convenzioni, già precarie, e le sue ideologie. ',
    'manga shounen',
    ['Azione','Avventura','Commedia','Drammatico','Sci-fi']
    ,3.20),
    new Fumetti(
    true,
    './img/fumetti/black_clover.jpg',
    'Black Clover',
    ['Kara Yonca','Noir Clover',' Schwarzer Klee','Trifoglio Nero','Trevo Negro'],
    'Tabata Yuuki',
    2014,
    'Asta e Yuno sono stati abbandonati da neonati nello stesso giorno presso la stessa chiesa, e son da allora divenuti inseparabili. Fin da bambini si son promessi che avrebbero lottato con tutte le loro forze per poter diventare il prossimo Wizard King. Una volta cresciuti però, la differenza di capacità tra loro è diventata evidente: mentre Yuno si dimostra molto abile in campo magico, con un potere e controllo incredibili, Asta non è proprio in grado di usare la magia. In un mondo dove la magia è tutto e le abilità fisiche sono nulla, Asta si è allenato ogni giorno per poter realizzare anche solo l\'incantesimo più semplice, ma senza alcun risultato. Un giorno però, quando Yuno si trova in difficoltà e viene catturato da un cavaliere magico ormai decaduto, ecco che si risvegliano i misteriosi poteri magici di Asta...',
    'manga shounen',
    ['Azione','Avventura','Commedia','Drammatico','Fantasy','Soprannaturale']
    ,4.65),
    new Fumetti(
    true,
    './img/fumetti/bleach.jpg',
    'Bleach',
    ['Блич'],
    'Kubo Tite',
    2001,
    'La storia segue la vita di Ichigo Kurosaki, uno studente quindicenne con l\'abilità di vedere i fantasmi, e di Rukia Kuchiki, uno Shinigami che lo incontra durante una caccia ad un Hollow (uno spirito maligno). Durante lo scontro con lo spirito, Rukia rimane gravemente ferita ed è costretta a trasferire parte dei suoi poteri ad Ichigo, che accetta la proposta della Shinigami nel tentativo di proteggere i suoi familiari, alimentando così la speranza di Rukia che lui sconfigga l\'Hollow al suo posto. Tuttavia, durante il processo di trasferimento qualcosa va storto, e Ichigo assorbe tutti i poteri di Rukia, diventando uno Shinigami a pieno titolo. Da qui parte la loro avventura.',
    'manga shounen',
    ['Azione','Avventura','Commedia','Drammatico','Soprannaturale']
    ,6.17),
    new Fumetti(
    false,
    './img/fumetti/one_punch_man.jpg',
    'One Punch Man',
    ['Nana Reloaded','Haha'],
    'Yusuke Murata, ONE',
    2012,
    'One-Punch Man segue la vita di Saitama, un eroe medio che dopo costanti e faticosi allenamenti riesce ora a vincere tutte le sue battaglie con un solo pugno! Questo finisce per essere la causa di un sacco di frustrazioni poiché egli non sente più l\'emozione e l\'adrenalina di combattere una dura battaglia. Forse non valeva la pena di intraprendere il suo rigoroso allenamento per diventare forte. Dopo tutto, cosa c\'è di buono nell\'avere un potere così schiacciante?',
    'manga shoujo',
    ['Azione','Avventura','Commedia','Drammatico','Sci-fi','Soprannaturale']
    ,6.17),
    new Fumetti(
    true,
    './img/fumetti/nana.jpg',
    'Nana',
    ['Nana Reloaded','Haha'],
    'Yazawa Ai',
    2000,
    'Questa è la storia di due ragazze che decidono di cambiare vita, trasferendosi dalla provincia giapponese a Tokyo. Hanno lo stesso nome (“Nana”, cioè “sette”) e le loro storie stanno per incrociarsi. La diciannovenne Nana Komatsu, una di quelle persone innamorate dell’amore, lavora in un video-nolo e ha una storia a distanza con Shoji, che si è trasferito a Tokyo per studiare all\'università. Nana Osaki è invece una cantante punk rock e, finora, ha militato in una band chiamata Blast, dove ha conosciuto il ragazzo di cui si è poi innamorata: Ren Honjo...',
    'manga seinen',
    ['Commedia','Drammatico','Maturo','Romantico','Slice of life','Tragico']
    ,4.27),
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Planet Manga</title>
</head>
<body>
  <main class="vetrina" style="width: 100vw; 
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;">
  <?php foreach ($fumetti as $fumetto) { ?>
    <div class="card-fumetto" style="display: flex; flex-wrap: wrap;max-width: 50%;
    max-height: 580px">
      <div class="cover">
      <img style="width: 300px;
      min-height: 480px;
      padding: 2rem;
      border: 1px solid black;
      border-radius:  8px;" src="<?php echo $fumetto->cover;?>" alt="">
      </div>
      <div class="info" style="max-width: 45%;
      margin: 0 2rem;
      display: flex;
      flex-flow: column wrap;
      justify-content: space-around;
      ">
      <h2 class="titolo" style="margin: 12px 0"> Titolo: <?php echo $fumetto->titolo;?></h2>
      <h4 class="titolo-alternativo" style="margin: 8px 0;"> Titoli alternativi: </h4>
      <ul class="box-titoli" style="margin: 8px 0">
        <?php foreach ($fumetto->titolo_alternativo as $titoli) { ?>
          <li><?php echo $titoli;?></li>
        <?php } ?>
      </ul>
      <h3 style="margin: 8px 0;">Anno di pubblicazione: <?php echo $fumetto->anno_uscita;?></h3>
      <h3 style="text-transform: capitalize;margin: 8px 0;">Tipo: <?php echo $fumetto->tipo;?></h3>
      <div class="generi">
        <span style="font-weight: bold;">Generi: </span>
        <?php foreach ($fumetto->generi as $genere) { ?>
          <span style="color:aliceblue;
          display: inline-block;
          font-size: 1rem;
          line-height: 1.6rem;
          background-color: orangered;
          padding: 0.2rem 0.8rem;
          border-radius:  4px;
          margin: 4px;">
            <?php echo $genere;?>
          </span>
        <?php } ?>
      </div>
      <!-- /.generi -->
      <p class="trama" style="max-height: 110px;
      overflow: hidden;
      text-overflow: ellipsis;
      margin: 8px 0;">
          Trama: <?php echo $fumetto->trama;?>
      </p>
      <h4 style="margin: 8px 0;
      text-transform: capitalize;">Disponibilità : <?php echo $fumetto->magazzino();?></h4>
      <span><?php echo $fumetto->disponibile ? "{$fumetto->prezzo} €" : "";?> </span>
      </div>
      <!-- /.info -->

    </div>
  <?php } ?>
  </main>
</body>
</html>