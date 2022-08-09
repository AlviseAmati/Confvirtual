<?php require('./Components/head.php'); ?>
<?php require('./Components/navbar.php'); ?>

<title>Homepage</title>

<section>
  <div class="col-12">
    <h1>Operazioni Admin:</h1>
    <h3>Crea Conferenza:</h3>
    <form method="POST" action="Actions/creaConferenza.php">
     <label for="Anno">Anno Edizione:</label><br>
     <input type="text" id="Anno" name="AnnoEdizione" value="1999"><br>
     <label for="Acronimo">Acronimo:</label><br>
     <input type="text" id="Acronimo" name="Acronimo" value="C1"><br>
     <label for="name">Nome:</label><br>
     <input type="text" id="name" name="Nome" value="Conferenza1"><br>
     <label for="date">Data Svolgimento:</label><br>
     <input type="text" id="date" name="DataSvolgimento" value="2022/01/07"><br>
     <label for="logo">Logo:</label><br>
     <input type="text" id="logo" name="Logo" value="http:..."><br><br>
     <input type="submit" value="Submit">
    </form>
    <br>
    <h3>Visualizza Conferenze:</h3>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
            <th scope="col">Anno Edizione</th>
            <th scope="col">Acronimo</th>
            <th scope="col">Nome</th>
            <th scope="col">Data Svolgimento</th>
            <th scope="col">Logo </th>
            <th scope="col">Bottone </th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>l</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
            </tr>
        </tbody>
    </table>
    <div id="Catalogo"><a id="Scopri" href="/NoloNolo/Progetto_TW/NoloNolo/Actions/catalogo.php">Scopri le nostre conferenze</a></div>
  </div>

  <div class="container textarea">
    <div class="row align-items-center justify-content-center margin-top col-12"> 
      
    <div>   
  </div>
</section>

 <?php include('./Components/footer.php'); ?> 