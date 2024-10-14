<?php
?>

<ul>
    <li>
        <a href="http://127.0.0.1:8000/">Accueil</a>
    </li>
    <li>
        <a href="test.php">test</a>
    </li>
    <li>
        <a href="test.php">test</a>
    </li>
</ul>
<h2 class="font-semibold text-xl text-gray-800 leading-tight" style="border: 4px solid black; padding: 10px;">
    <center>Annuaire des anciens élèves !</center>
    <div class="search-container">
        <form action="//127.0.0.1:8000">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Submit</button>
        </form>
    </div>
</h2>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<table>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Promotion</th>
        <th>Secteur d'activité</th>
    </tr>
</table>
