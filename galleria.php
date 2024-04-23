<?php
class Galleria{
    public static function getProdotti(){
        include 'connection.php';
        include 'item.php';
        include 'config.php';
        $query = "SELECT * FROM ".$prefix."prodotto";
        $result1 = $conn->query($query);
        $prodotti = array();

        while($row = $result1->fetch_assoc()){
            $query = "SELECT Path FROM ".$prefix."foto WHERE idProdotto = ".$row['ID'];
            $result2 = $conn->query($query);
            $foto = $result2->fetch_assoc();
            $prodotti[] = new Item($row['ID'], $row['Nome'], $row['Descrizione'], $row['Prezzo'], $row['Quantita'], $foto['Path']);
        }
        return $prodotti;
    }

    public static function render($prodotti){
        $html = '<div class="container" style="display: flex; flex-wrap: wrap;">';
        foreach($prodotti as $prodotto){
            $html .= $prodotto->getRender();
        }
        $html .= '</div>';
        return $html;
    }
}
?>