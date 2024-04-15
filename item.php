<?php
class Item
{
    private $id;
    private $nome;
    private $descrizione;
    private $prezzo;
    private $quantita;
    private $fotoPath;

    public function __construct($id, $nome, $descrizione, $prezzo, $quantita, $fotoPath)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descrizione = $descrizione;
        $this->prezzo = $prezzo;
        $this->quantita = $quantita;
        $this->fotoPath = $fotoPath;
    }

    public function getRender()
    {
        return '<div class="card" style="width: 18rem;">
                    <img src="img/' . $this->fotoPath . '" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">' . $this->nome . '</h5>
                        <p class="card-text">Descrizione: ' . $this->descrizione . '</p>
                        <p class="card-text">Prezzo:' . $this->prezzo . '</p>
                        <form action="addProdotto.php" method="post">
                            <input type="hidden" name="idProdotto" value="' . $this->id . '">
                            Quantità (max ' . $this->quantita . '):
                            <input type="number" name="quantita" value="1" max="' . $this->quantita . '">
                            <button type="submit" class="btn btn-primary">Aggiungi al carello</button>
                        </form>
                    </div>
                </div>';
    }
}