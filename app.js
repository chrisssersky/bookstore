// Aktualizowanie pola z ilością sztuk

$(document).on('blur', "td[contenteditable=true]", function () {
    var message_status = $("#status_change_q");
    var field_userid = $(this).attr("id");
    var value = $(this).text();
    $.ajax(
            {
                type: "POST",
                url: "edit_quantity.php",
                data: field_userid + "=" + value,
                success: function (msg)
                {
                    message_status.show();
                    message_status.html(msg);
                    setTimeout(function ()
                    {
                        message_status.hide();
                    }, 300);
                    $.ajax(
                            {
                                type: "POST",
                                dataType: 'json',
                                url: "current_price.php",
                                success: function (data)
                                {
                                    console.log(data);
                                    $('#price_shopcard').html(data.price);
                                }
                            });
                }
            });
});
// Kalendarz w formularzu rejestracji

$(document).ready(function ()
{
    $('#date_of_birth').datepicker(
            {
                format: 'yyyy-mm-dd',
                language: "pl",
                clearBtn: true
            });
});
// Ukrywanie ikonki z ilością ksiązek w koszyku

$(document).on('click', "#nav_shopcard", function (event)
{
    $('#price_shopcard').hide();
});
// Usuwanie ksiązek w koszyka

$(document).on('click', ".delete_link", function ()
{
    purchase = $(this).attr("value");
    $.ajax(
            {
                type: "POST",
                url: "delete_from_shopcard.php",
                data:
                        {
                            purchase: purchase
                        },
                success: function ()
                {
                    $('#item' + purchase + '').fadeOut(400, function ()
                    {
                        $(this).remove();
                        $('table tr').each(function (i)
                        {
                            $(this).find('#auto_num').html(i);
                        });
                    });
                    $.ajax(
                            {
                                type: "POST",
                                dataType: 'json',
                                url: "current_price.php",
                                success: function (data)
                                {
                                    if (data.price > 0) {
                                        $('#price_shopcard').html(data.price);
                                    } else
                                    {
                                        $('.table').html('<div class="nothing_here1"><i class="fa fa-exclamation-triangle"></i> Twój koszyk jest pusty. </div>');
                                        $('#price_block').hide();
                                    }
                                }
                            });
                }
            });
});

// Usuwanie ksiązek w koszyka

$(document).on('click', ".delete_link_final", function ()
{
    purchase = $(this).attr("value");
    book_id = $(this).attr("id");

    $.ajax(
            {
                type: "POST",
                url: "delete_from_final_shopcard.php",
                data:
                        {
                            purchase: purchase,
                            book_id: book_id
                        },
                success: function ()
                {
                    $('#itemfinal' + purchase + '').fadeOut(400, function ()
                    {
                        $(this).remove();

                    });
                }
            });
});

// Dodawanie recenzji

$(document).on('submit', "#send_review", function ()
{

    var form = $(this);
    var contents = form.serialize();
    
    swal({title: "Jesteś pewien?",
        text: "Twoja recenzja zostanie dadana!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#D70051",
        confirmButtonText: "Tak!",
        cancelButtonText: "Nie!",
        closeOnConfirm: false, closeOnCancel: false}, function (isConfirm) {
        if (isConfirm) {
            swal("Gotowe!", "Twoja recenzja została opublikowana!", "success");
            $.ajax(
            {
                url: "add_review.php",
                type: "POST",
                data: contents,
                success: function (msg)
                {
                    $('#success_rev').replaceWith('<button class="smaller-green">' + msg + '</button>');
                }
            });

        } else {
            swal("Anulowano!", "Twoja recenzja nie została opublikowana.", "error");
        }
    });
    
    
    return false;
});


// Realizowanie zamówienia

$(document).on('click', "#paycard", function ()
{

    swal({title: "Jesteś pewien?",
        text: "Twoje zamówienie zostanie zrealizowane!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#D70051",
        confirmButtonText: "Tak!",
        cancelButtonText: "Nie!",
        closeOnConfirm: false, closeOnCancel: false}, function (isConfirm) {
        if (isConfirm) {
            swal("Gotowe!", "Twoje zamówienie zostało zrealizowane.", "success");
            $('.multiple').each(function (i, content) {
                finalbooks = $(content).attr("value");



                $.ajax(
                        {
                            type: "POST",
                            url: "realize_order.php",
                            data:
                                    {
                                        finalbooks: finalbooks
                                    },
                            success: function ()
                            {
                                $('.table').html('<div class="nothing_here1"><i class="fa fa-exclamation-triangle"></i> Twój koszyk jest pusty. </div>');
                                $('#price_block').hide();

                                display_final_card();
                            }
                        });
            });

        } else {
            swal("Anulowano!", "Twoje zamówienie nie zostało zrealizowane.", "error");
        }
    });

});
// Dodawanie ksiązki do koszyka

$(document).on('click', ".add_purchase", function ()
{
    book_id = $(this).attr("value");
    $.ajax(
            {
                type: "POST",
                url: "add_to_shopcard.php",
                data:
                        {
                            book_id: book_id
                        },
                success: function ()
                {
                    $.ajax(
                            {
                                type: "POST",
                                dataType: 'json',
                                url: "current_price.php",
                                success: function (data)
                                {
                                    $element = data.elements;
                                    $('#show_num_addcard').html(' ' + $element).show();
                                }
                            });
                }
            });
});
// Wyświetlanie komentarzy

$(document).on('click', ".add_comment", function ()
{
    book_id = $(this).attr("value");
    $.ajax(
            {
                type: "POST",
                url: "load_comment.php",
                data:
                        {
                            book_id: book_id
                        },
                success: function (msg)
                {
                    $('#bookcomment' + book_id).html(msg);
                }
            });
    $('#bookcomment' + book_id).toggleClass("showing");
    $('#commentbox1' + book_id).toggleClass("backgrounds");
    $('#commentbox2' + book_id).toggleClass("backgrounds");
});
// Wyświetlanie panelu do recenzji

$(document).on('click', ".add_rev_rat", function ()
{
    book_id = $(this).attr("value");
    console.log(book_id);
    $('#rating_panel' + book_id).slideToggle("fast");
});
// Wyświetlanie gifa ładowania

function loading_show()
{
    $('#loading').html("<img src='images/loading.gif'/>").fadeIn('fast');
}


function loading_hide()
{
    $('#loading').fadeOut('fast');
}

function loading_show_login()
{
    $('#add_user_success1').html("<img src='images/loading.gif'/>").fadeIn('fast');
}


function loading_hide_login()
{
    $('#add_user_success1').fadeOut('fast');
}

// Wylogowanie

$(document).ready(
        function ()
        {
            $('#logout').on('click', function ()
            {
                $.ajax(
                        {
                            url: 'logout.php',
                            type: 'post',
                            success: function (data)
                            {
                                redirect('/bookstore', 100);
                            }
                        });
                return false;
            });
        });
// Ładowanie bestsellerów

$(document).ready(
        function ()
        {
            $.ajax(
                    {
                        type: "POST",
                        url: "load_bestsellers.php",
                        success: function (msg)
                        {
                            $("#load_bestsellers").html(msg);
                            var parsed = $.parseHTML(msg);
                            var len = $(parsed).find('.rating1').length;
                            for (i = 1; i < len + 1; i++)
                            {
                                var id = $(parsed).find('#bestbook' + i).attr('value');
                                $('#bestbook' + i).raty(
                                        {
                                            readOnly: true,
                                            score: id
                                        });
                            }
                        }
                    });
        });
// Ładowanie nowości

$(document).ready(
        function ()
        {
            $.ajax(
                    {
                        type: "POST",
                        url: "load_new_ones.php",
                        success: function (msg)
                        {
                            $("#load_new_ones").html(msg);
                            var parsed = $.parseHTML(msg);
                            var len = $(parsed).find('.rating1').length;
                            for (i = 1; i < len + 1; i++)
                            {
                                var id = $(parsed).find('#newbook' + i).attr('value');
                                $('#newbook' + i).raty(
                                        {
                                            readOnly: true,
                                            score: id
                                        });
                            }

                        }
                    });
        });
// Wyświetlanie koszyka

$(document).ready(
        function ()
        {
            $.ajax(
                    {
                        type: "POST",
                        url: "load_shopcard.php",
                        success: function (msg)
                        {
                            $("#load_shop_card").html(msg);
                        }
                    });
        });

// Wyświetlanie zakupionych książek

$(document).ready(function () {
    display_final_card();
});

function display_final_card()
{
    $.ajax(
            {
                type: "POST",
                url: "load_shopcard_final.php",
                success: function (msg)
                {
                    $("#final_books_card").html(msg);
                    var parsed = $.parseHTML(msg);
                    var len = $(parsed).find('.count_final_book').length;
                    for (i = 1; i < len + 1; i++)
                    {

                        $('#addreview' + i).raty({
                            click: function (score) {
                                book_id = $(this).attr("value");
                                $.ajax(
                                        {
                                            type: "POST",
                                            url: "add_rating.php",
                                            data: {
                                                book_id: book_id,
                                                score: score
                                            },
                                            success: function (msg)
                                            {
                                                swal(msg, "Twoja ocena została dodana.", "success");
                                            }
                                        });
                            }


                        });
                    }


                }
            });
}
;

// Przekierowywanie	

function redirect(to, delay)
{
    window.setTimeout(function ()
    {
        window.location.href = to;
    }, delay);
}

// Logowanie

$(document).ready(
        function ()
        {
            $('#login-form').on('submit', function ()
            {
                var form = $(this);
                var contents = form.serialize();
                $.ajax(
                        {
                            url: 'login_checker.php',
                            dataType: 'json',
                            type: 'post',
                            data: contents,
                            success: function (data)
                            {
                                redirect('/bookstore', 1);
                                $('.login-btn').hide();
                            },
                            error: function (data)
                            {
                                $error_msg = 'Nieprawidłowe dane. Wpisz poprawny login oraz hasło.';
                                $('#error_login').html($error_msg).show();
                            }
                        });
                return false;
            });
        });
// Rejestracja

$(document).ready(
        function ()
        {
            $('#add_user').on('submit', function ()
            {
                loading_show_login();
                var form = $(this);
                var contents = form.serialize();
                $.ajax(
                        {
                            url: 'form_response.php',
                            type: 'post',
                            data: contents,
                            success: function (msg)
                            {
                                loading_hide_login();
                                $('#add_user_success').html(msg);

                            }
                        });
                return false;
            });
        });
$(document).ready(
        function ()
        {
            $('#add_user_main_btn').on('click', function ()
            {
                $('#add_user_box').show();
                $('#button_add_user').show();
                $('#user_added').hide();
                $('#add_user_success').hide();
                $('#add_user_box').find('form')[0].reset();
            });
        });
// Wyświetlanie kategorii	

$(document).ready(
        function ()
        {
            $.getJSON('results.json',
                    function (data)
                    {
                        var len = data.category_names.length;
                        for (i = 0; i < len; i++)
                        {
                            content = '<li><a class="sort_book" value="' + data.category_names[i].category_id + '"href="">' + data.category_names[i].name + '</a> (' + data.category_names[i].items_in_cat + ') </li>';
                            $('#category_names').append(content);
                        }
                    }
            );
        }
);
// Sortowanie książek kategoriami

$(document).on('click', '.sort_book', function (event)
{
    var category_id = $(this).attr("value");
    $.ajax(
            {
                url: "load_book_by_cat.php",
                type: "POST",
                data:
                        {
                            category: category_id
                        },
                datatype: 'json',
                success: function (msg)
                {
                    $("#book").html(msg);
                    $('html, body').animate(
                            {
                                scrollTop: 0
                            }, 100);
                    loading_hide();
                    var parsed = $.parseHTML(msg);
                    var len = $(parsed).find('.rating').length;
                    for (i = 1; i < len + 1; i++)
                    {
                        var id = $(parsed).find('#catbook' + i).attr('value');
                        $('#catbook' + i).raty(
                                {
                                    readOnly: true,
                                    score: id
                                });
                    }
                },
                error: function ()
                {
                    console.log('err');
                }
            });
    return false;
});
// Wyświetlanie podpowiedzi

$(document).on('mouseover', '.add_purchase', function ()
{
    $('[data-toggle="tooltip"]').tooltip();
});
// Stortowanie książek autorami

$(document).on('click', '.author_info', function ()
{
    var author_id = $(this).attr("value");
    var request = $.ajax(
            {
                url: "load_book_by_auth.php",
                type: "POST",
                data:
                        {
                            author: author_id
                        },
                datatype: 'json',
                success: function (msg)
                {
                    $("#book").html(msg);
                    $('html, body').animate(
                            {
                                scrollTop: 0
                            }, 100);
                    var parsed = $.parseHTML(msg);
                    var len = $(parsed).find('.rating').length;
                    for (i = 1; i < len + 1; i++)
                    {
                        var id = $(parsed).find('#bookauth' + i).attr('value');
                        $('#bookauth' + i).raty(
                                {
                                    readOnly: true,
                                    score: id
                                });
                    }
                },
                error: function ()
                {
                    console.log('err');
                }
            });
    return false;
});
// Wyszukiwanie książek

$(document).ready(
        function ()
        {
            $('#type_word').on('submit', function ()
            {

                var form = $(this);
                var contents = form.serialize();
                $.ajax(
                        {
                            url: "load_book_by_type.php",
                            type: "POST",
                            data: contents,
                            datatype: 'json',
                            success: function (msg)
                            {
                                $("#books").html(msg);
                                $("#load_new_ones").hide();
                                $(".search").find('h1').html('Wyszukane');
                                $("#book").html(msg);
                                $('html, body').animate(
                                        {
                                            scrollTop: 0
                                        }, 100);
                                var parsed = $.parseHTML(msg);
                                var len = $(parsed).find('.rating').length;
                                for (i = 1; i < len + 1; i++)
                                {
                                    var id = $(parsed).find('#typebook' + i).attr('value');
                                    $('#typebook' + i).raty(
                                            {
                                                readOnly: true,
                                                score: id
                                            });
                                }
                            },
                            error: function ()
                            {
                                console.log('err');
                            }
                        });
                return false;
            });
        });
// Wyświetlanie dostępnych książek	

$(document).ready(function ()
{
    function loadData(page)
    {
        loading_show();
        $.ajax(
                {
                    type: "POST",
                    url: "load_data.php",
                    data: "page=" + page,
                    success: function (msg)
                    {
                        loading_hide();
                        $("#book").html(msg);
                        var parsed = $.parseHTML(msg);
                        var len = $(parsed).find('.rating').length;
                        for (i = 1; i < len + 1; i++)
                        {
                            var id = $(parsed).find('#loadbook' + i).attr('value');
                            $('#loadbook' + i).raty(
                                    {
                                        readOnly: true,
                                        score: id
                                    });
                        }
                    }
                });
    }

    loadData(1);
    $('#book').on('click', '.active', function ()
    {
        var page = $(this).attr('p');
        loadData(page);
        $('html, body').animate(
                {
                    scrollTop: 0
                }, 100);
    });
    $('#book').on('click', '#go_btn', function ()
    {
        var page = parseInt($('.goto').val());
        var no_of_pages = parseInt($('.total').attr('a'));
        if (page !== 0 && page <= no_of_pages)
        {
            loadData(page);
        } else
        {
            alert('Wprowadź numer strony między 1 a ' + no_of_pages + '');
            $('.goto').val("").focus();
            return false;
        }
    });
});
// Wysyłanie wiadomości e-mail

$(document).ready(
        function ()
        {
            $('#send_email').on('submit', function ()
            {
                $('#submited').empty();
                var form = $(this);
                var contents = form.serialize();
                $.ajax(
                        {
                            url: 'send_email.php',
                            dataType: 'json',
                            type: 'post',
                            data: contents,
                            success: function (data)
                            {
                                console.log(data);
                                $('#submited').append(data.feedback).show();
                            }
                        });
                return false;
            });
        });
// Walidacja formularza rejestracji	  

$(document).ready(function ()
{
    $("#add_user").validate(
            {
                rules:
                        {
                            login:
                                    {
                                        required: true,
                                        remote:
                                                {
                                                    url: "check-login.php",
                                                    type: "post",
                                                    data:
                                                            {
                                                                login: function ()
                                                                {
                                                                    return $('#login').val();
                                                                }
                                                            }
                                                }
                                    },
                            passwd: "required",
                            date_of_birth:
                                    {
                                        required: true,
                                        dateISO: true
                                    },
                            email: "required",
                            first_name: "required",
                            last_name: "required",
                            address: "required",
                            country: "required"
                        },
                messages:
                        {
                            login:
                                    {
                                        required: '<span class="tip">* Podaj login</span>',
                                        remote: jQuery.validator.format('<span class="tip">* <i>{0}</i> jest już zajęty</span>')
                                    },
                            passwd: '<span class="tip">* Podaj hasło</span>',
                            date_of_birth: '<span class="tip">* Podaj poprawną datę narodzin</span>',
                            first_name: '<span class="tip">* Podaj imię</jspan>',
                            last_name: '<span class="tip">* Podaj nazwisko</span>',
                            address: '<span class="tip">* Podaj adres</span>',
                            country: '<span class="tip">* Podaj kraj</span>',
                            email: '<span class="tip">* Podaj e-mail</span>'
                        },
                submitHandler: function ()
                {
                    $('#add_user_success').empty();
                    $('#add_user_box').hide();
                    $('#button_add_user').hide();
                    $('#user_added').show();
                    $('#add_user_success').show();
                },
                success: function (label)
                {
                    label.addClass("valid");
                },
                errorPlacement: function (error, element)
                {
                    error.insertBefore(element);
                }
            });
});
// Walidacja formularza do wysyłania e-maila

$(document).ready(function ()
{
    $('#send_email').validate(
            {
                rules:
                        {
                            imie: "required",
                            email: "required",
                            temat: "required",
                            wiadomosc: "required"
                        },
                messages:
                        {
                            imie: '<span class="tip"> * Podaj Imię Nazwisko / Firmę</span>',
                            email: '<span class="tip"> * Podaj poprawny adres e-mail</span>',
                            temat: '<span class="tip"> * Podaj temat wiadomości</span>',
                            wiadomosc: '<span class="tip"> * Podaj treść wiadomości</span>'
                        },
                success: function (label)
                {
                    label.addClass("valid");
                },
                errorPlacement: function (error, element)
                {
                    error.insertBefore(element);
                }
            });
});
// Walidacja formularza logowania

$(document).ready(function ()
{
    $('#login-form').validate(
            {
                rules:
                        {
                            login_on: "required",
                            password: "required"
                        },
                messages:
                        {
                            login_on: '<span class="tip"> * Podaj login</span>',
                            password: '<span class="tip"> * Podaj hasło</span>'
                        },
                success: function (label)
                {
                    label.addClass("valid");
                },
                errorPlacement: function (error, element)
                {
                    error.insertBefore(element);
                }
            });
});
