<?php
    require_once('../assets/template/header.php');
?>
<section class="wrapper">
    <!-- <img class="logo" src="./logo.jpeg" alt=""> -->
    <div class="search">
        <input placeholder="Recherchez un film" type="text" class="search-input">
        <button class="submit" type="submit">Go!</button>
        <button class="btn-list">Mes prefs</button>
    </div>
    <div class="choice-search">
        <button>Geographie</button>
        <button>Histoire</button>
        <button>Aventure</button>
        <button>Horreur</button>
    </div>

    <ul class="list"></ul>
</section>
<?php
    require_once('../assets/template/footer.php')
?>