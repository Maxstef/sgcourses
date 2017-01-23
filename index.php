<?php
    
   
   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Films</title>
        <link rel="stylesheet" type="text/css" href="style/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
    <body>
        <div class="ui container" id="main-container">
            <h1 class="ui header">Список фільмів</h1>
            <form class="ui form">
                <label for="sort">Сортувати</label>
                <select id="sort" class="ui column">
                        <option value="name">Назва</option>
                        <option value="budget">Бюджет</option>
                </select>
            </form>
            
            <table class="ui striped table" id="list_of_films">
              <thead>
                <tr>
                  <th>Назва</th>
                  <th>Країна</th>
                  <th>Жанр</th>
                  <th>Рік</th>
                  <th>Бюджет($)</th>
                  <th>Режисер</th>
                </tr>
              </thead>
              <tbody>
               
              </tbody>
              <tfoot>
                <tr><th colspan="6">
                  <div class="ui right floated pagination menu">
                    <a class="icon item" id="prev">
                      <i class="left chevron icon"></i>
                    </a>
                    <a class="icon item" id="next">
                      <i class="right chevron icon"></i>
                    </a>
                  </div>
                </th>
                </tr>
               </tfoot>
            </table>
            <div class="ui divider"></div>
            <form class="ui form" id="add-film-form">
              <div class="ui header">Додати новий фільм</div>
              <div class="three fields">
                <div class="field">
                  <label for="name">Назва</label>
                  <input type="text" placeholder="Назва" id="name" name="name">
                </div>
                <div class="field">
                    <label for="country">Країна</label>
                    <select id="country" name="country">
                        <option value="">Країна</option>
                        <option value="Велика Британія">Велика Британія</option>
                        <option value="Індія">Індія</option>
                        <option value="Італія">Італія</option>
                        <option value="Ірландія">Ірландія</option>
                        <option value="Канада">Канада</option>
                        <option value="Нова Зеландія">Нова Зеландія</option>
                        <option value="Росія">Росія</option>
                        <option value="США">США</option> 
                        <option value="Україна">Україна</option>
                        <option value="Франція">Франція</option>
                    </select>
                    
                </div>
                <div class="field">
                  <label for="genre">Жанр</label>
                    <select id="genre" name="genre">
                        <option value="">Жанр</option>
                        <option value="бойовик">бойовик</option>
                        <option value="вестерн">вестерн</option>
                        <option value="документальний">документальний</option>
                        <option value="драма">драма</option>
                        <option value="детектив">детектив</option>
                        <option value="жахи">жахи</option>
                        <option value="комедія">комедія</option>
                        <option value="історичний">історичний</option>  
                        <option value="триллер">триллер</option>
                        <option value="фантастика">фантастика</option>
                    </select>
                </div>
              </div>
              <div class="three fields">
                <div class="field">
                  <label for="year">Рік</label>
                  <select id="year" name="year">
                        <option value="">Рік</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>  
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>  
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>  
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>  
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                    </select>
                </div>
                <div class="field">
                  <label for="budget">Бюджет($)</label>
                  <input type="number" placeholder="Бюджет" id="budget" name="budget">
                </div>
                <div class="field">
                  <label for="director">Режисер</label>
                  <input type="text" placeholder="Режисер" id="director" name="director">
                </div>
              </div>
              <button class="ui button" type="submit" id="add-film-btn">Додати</button>
              <span id="add-film-feedback"></span>
            </form>
            <div class="ui divider"></div>
            <div class="ui container">
                <p>Середній бюджет фільмів що знімались в Україні: <span id="average-budget"></span></p>
            </div>
            <div class="ui divider"></div>
            
            <div style="min-height:  500px" class="ui container">
                <h2 class="ui header">Знайти фільм за назвою</h2>
                <div class="ui icon input">
                  <i class="search icon"></i>
                  <input type="text" placeholder="Search..." id="filter">
                </div>
                <table class="ui striped table" id="list_of_filtered_films">
                  <thead>
                    <tr>
                      <th>Назва</th>
                      <th>Країна</th>
                      <th>Жанр</th>
                      <th>Рік</th>
                      <th>Бюджет($)</th>
                      <th>Режисер</th>
                    </tr>
                  </thead>
                  <tbody>
               
                  </tbody>
              
                </table>
            </div>
            
        </div>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/scriptFilms.js"></script>
    </body>
</html>
