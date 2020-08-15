<?php
if (isset($listeEmployeur)) {
?>
    <table border="2">
        <tr>
            <td>ID</td>
            <td>Nom</td>
        </tr>
        <?php
        foreach ($listeEmployeur as $r) {
        ?>
            <tr>
                <td><?php echo $r->getId(); ?> </td>
                <td><?php echo $r->getNom_employeur(); ?> </td>
            </tr>

        <?php
        }
        ?>
    </table>
<?php

}
?>