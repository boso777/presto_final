# Documentazione Modifiche Frontend - Presto.it

Questo documento elenca le modifiche apportate per rinnovare il frontend dell'applicazione in stile minimalista.

## Visione Generale
L'obiettivo è stato quello di trasformare l'interfaccia da una struttura Bootstrap standard a un design moderno, pulito e "squadrato", utilizzando una palette di colori caldi e neutri.

## Palette Colori Utilizzata
- **Primario (#cb997e):** Utilizzato per bottoni principali, brand e accenti forti.
- **Sfondo Principale (#fff1e6):** Colore di sfondo di tutte le pagine.
- **Sfondo Alternativo (#f0efeb):** Utilizzato per sezioni secondarie e card.
- **Sfondo Morbido (#eddcd2):** Utilizzato per la sezione Hero e dropdown.
- **Testo (#4a4a4a):** Grigio scuro per una leggibilità ottimale senza il contrasto netto del nero puro.
- **Muted (#b7b7a4):** Per testi secondari e bordi sottili.

## Modifiche Strutturali e di Stile
1.  **Forme Squadrate:** È stato forzato il `border-radius: 0` su tutti gli elementi (bottoni, card, input, dropdown, alert) per un look architettonico e pulito.
2.  **Tipografia:** Integrato il font **Inter** da Google Fonts per una resa moderna e professionale.
3.  **Minimalismo del Testo:**
    *   Utilizzo prevalente del **lowercase** per link e descrizioni brevi.
    *   Rimozione di ombre pesanti, preferendo bordi sottili o ombre molto sfumate (`shadow-sm`).
    *   Aumento del **white space** (padding e margin) per far "respirare" i contenuti.

## Componenti Rifatti
-   **Navbar:** Semplificata, con brand in maiuscolo e link in minuscolo. Rimossa la barra di ricerca standard per pulizia visiva (accessibile dalle pagine dedicate).
-   **Footer:** Ridotto all'essenziale con link legali e pulsante per diventare revisore.
-   **Card Articolo:** Design pulito con immagine a tutta larghezza (senza bordi arrotondati), tipografia gerarchica e prezzo in evidenza.

## Viste Principali
-   **Welcome (Home):** Aggiunta una sezione **Hero** d'impatto con titolo display e sottotitolo minimalista.
-   **Dettaglio Articolo (Show):** Redesign completo. Immagini grandi con analisi AI integrata (per i revisori), breadcrumbs minimali e focus sulla descrizione.
-   **Pagine Articoli:** Griglia pulita e spaziosa.
-   **Login/Register:** Form centrati, puliti, con etichette in maiuscolo piccolo e input alti per un tocco premium.
-   **Dashboard Revisore:** Interfaccia più leggibile per l'analisi delle immagini e l'approvazione rapida.

## Note Tecniche
*   Tutti i colori e i parametri base sono definiti come **CSS Variables** in `resources/css/style.css` per una facile manutenzione futura.
*   Utilizzo di utilità Bootstrap 5 mantenendo però lo stile personalizzato tramite override globali.
