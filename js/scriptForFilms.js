var offset = 0;
var maxNumber = 15;
var sortBy = 'name';
$('#sort').on('change', function () {
    if ($('#sort').val() == 'name') {
        offset = 0;
        sortBy = 'name';
        getFilms(offset);
    } else if ($('#sort').val() == 'budget') {
        offset = 0;
        sortBy = 'budget';
        getFilms(offset);
    }

});
function getFilms(offset){
    $.post("server/get_films.php",
            {
                sort: sortBy,
                max: maxNumber,
                offset: offset
            },
            function (data, status) {
                //console.log(data);
                updateTable(JSON.parse(data));
            });
}
function updateTable(data){
    $('#list_of_films tbody').html('');
    if (offset == 0) {
        $('#list_of_films #prev').css({ 'visibility': 'hidden' });
    } else {
        $('#list_of_films #prev').css({ 'visibility': 'visible' });
    }
    if(data.length < maxNumber){
        $('#list_of_films #next').css({'visibility': 'hidden'});
    } else {
         $('#list_of_films #next').css({'visibility': 'visible'});
    }
    for (var i = 0; i < data.length; i++ ){
        $('#list_of_films tbody').append('<tr><td>' + data[i].name + '</td><td>' + data[i].country + '</td><td>'  + data[i].genre + '</td><td>'  + data[i].year + '</td><td>'  + data[i].budget + '</td><td>'  + data[i].director + '</td></tr>');
    }
       
}
$('#list_of_films #prev').on('click', function (event) {
    event.preventDefault();
    if (offset < maxNumber) {
        offset = 0;

    } else {
        offset = offset - maxNumber;

    }
    getFilms(offset);
});
$('#list_of_films #next').on('click', function (event) {
    event.preventDefault();
    offset = offset + maxNumber;
    getFilms(offset);
});
$('#add-film-btn').on('click', function (event) {
    event.preventDefault();
    var name = $('#name').val();
    var country = $('#country').val();
    var year = $('#year').val();
    var genre = $('#genre').val();
    var budget = $('#budget').val();
    var director = $('#director').val();
    if (name.match(/[A-zА-я0-9]/g)) {
        $('#add-film-feedback').text('');
    } else {
        $('#add-film-feedback').text('Вкажіть назву фільму');
        return;
    }
    if (country == '') {
        $('#add-film-feedback').text('Виберіть країну');
        return;
    }
    if (genre == '') {
        $('#add-film-feedback').text('Виберіть жанр');
        return;
    }
    if (year == '') {
        $('#add-film-feedback').text('Виберіть рік');
        return;
    }
    if (budget == '') {
        $('#add-film-feedback').text('Вкажіть бюджет');
        return;
    }
    var onlyLetters = /[^А-ЯA-ZІ\s-]/i;
    if (director == '' || onlyLetters.test(director)) {
        $('#add-film-feedback').text('Вкажіть режисера');
        return;
    }

    $.post("server/add_film.php",
            {
                data: {
                    name: name,
                    country: country,
                    year: year,
                    genre: genre,
                    budget: budget,
                    director: director

                }
            },
            function (data, status) {
                $('#add-film-feedback').text(data);
            });

});
getFilms(offset);

