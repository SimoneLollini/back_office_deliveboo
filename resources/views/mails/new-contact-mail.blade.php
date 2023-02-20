<h1>Ciao ristoratore!</h1>
<p>
    Hai appena ricevuto un ordine da: {{ $lead->email }} <br>
    <br>
    Ecco i dettagli di contatto:<br>

    <br>

    Nome: {{ $lead->full_name }}<br>
    Email: {{ $lead->email }}<br>
    Numero di cellulare: {{ $lead->phone }} <br>
    Messaggio:<br>
    <br>
    @if (strlen($lead->description) > 0)
        {{ $lead->description }}
    @else
        Non è stato lasciato alcun messaggio specifico per questo ordine. <br>
    @endif

    <br>

    Accedi al tuo pannello di amministrazione per maggiori informazioni riguardo l'ordine appena effettuato
</p>
