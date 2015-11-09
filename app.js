    // Wyświetlanie gifa ładowania
	
	function loading_show() {
        $('#loading').html("<img src='images/loading.gif'/>").fadeIn('fast');
    }

    function loading_hide() {
        $('#loading').fadeOut('fast');
    }

	// Wylogowanie

    $(document).ready(
        function() {
            $('#logout').on('click', function() {

                $.ajax({
                    url: 'logout.php',
                    type: 'post',
                    success: function(data) {
                        redirect('/bookstore', 100);
                    }
                });
                return false;
            });
        });
		
	// Ładowanie bestsellerów
		
    $(document).ready(
        function() {
            $.ajax({
                type: "POST",
                url: "load_bestsellers.php",
                success: function(msg) {
                    $("#load_bestsellers").html(msg);
                }
            });
        });
		
	// Ładowanie nowości

    $(document).ready(
        function() {
            $.ajax({
                type: "POST",
                url: "load_new_ones.php",
                success: function(msg) {
                    $("#load_new_ones").html(msg);
                }
            });
        });
		
	// Przekierowywanie	

    function redirect(to, delay) {
        window.setTimeout(function() {
            window.location.href = to;
        }, delay);
    }

	// Logowanie
	
    $(document).ready(
        function() {
            $('#login-form').on('submit', function() {
                var form = $(this);
                var contents = form.serialize();

                $.ajax({
                    url: 'login_checker.php',
                    dataType: 'json',
                    type: 'post',
                    data: contents,
                    success: function(data) {
                        redirect('/bookstore', 1);
                        $('.login-btn').hide();
                    },
					error: function(data) {
						$error_msg = 'Nieprawidłowe dane. Wpisz poprawny login oraz hasło.';
						$('#error_login').html($error_msg).show();	
					}
                });
                return false;
            });
        });

	// Rejestracja
		
    $(document).ready(
        function() {
            $('#add_user').on('submit', function() {
                var form = $(this);
                var contents = form.serialize();

                $.ajax({
                    url: 'form_response.php',
                    dataType: 'json',
                    type: 'post',
                    data: contents,
                    success: function(data) {
                        content = '<center><span class="hello-message">Witaj <b>' + data.first_name + ' ' + data.last_name + '</b>!</span></center><br/>';
                        content += 'Login: <b>' + data.login + '</b><br/> E-mail: <b>' + data.email + '</b><br/><br/>';
                        content += 'Teraz możesz zalogować się do serwisu używając swojego loginu oraz hasła podanego w formularzu. Dziękujemy za wybranie naszego serwisu!';

                        $('#add_user_success').append(content);
                    }
                });
                return false;
            });
        });
		
	
    $(document).ready(
        function() {
            $('#add_user_main_btn').on('click', function() {
                $('#add_user_box').show();
                $('#button_add_user').show();
                $('#user_added').hide();
                $('#add_user_success').hide();
                $('#add_user_box').find('form')[0].reset();
            });
        });

	// Wyświetlanie kategorii	
		
    $(document).ready(
        function() {
            $.getJSON('json.php',
                function(data) {
                    var len = data.category_names.length;
                    for (i = 0; i < len; i++) {
                        content = '<li><a class="sort_book" value="' + data.category_names[i].category_id + '"href="">' + data.category_names[i].name + '</a> (' + data.category_names[i].items_in_cat + ') </li>';
                        $('#category_names').append(content);
                    }
                }
            );
        }
    );
	
	// Sortowanie książek kategoriami

    $(document).on('click', '.sort_book', function(event) {
        var category_id = $(this).attr("value");
        var request = $.ajax({
            url: "load_book_by_cat.php",
            type: "POST",
            data: {
                category: category_id
            },
            datatype: 'json',
            success: function(msg) {
                $("#book").html(msg);
                $('html, body').animate({
                    scrollTop: 0
                }, 100);
            },
            error: function(data) {
                console.log('err');
            }
        });
        return false;
    });

	// Stortowanie książek autorami
	
    $(document).on('click', '.author_info', function(event) {
        var author_id = $(this).attr("value");
        var request = $.ajax({
            url: "load_book_by_auth.php",
            type: "POST",
            data: {
                author: author_id
            },
            datatype: 'json',
            success: function(msg) {
                $("#book").html(msg);
                $('html, body').animate({
                    scrollTop: 0
                }, 100);
            },
            error: function(data) {
                console.log('err');
            }
        });
        return false;
    });

	// Wyszukiwanie książek
	
    $(document).ready(
        function() {
            $('#type_word').on('submit', function() {
                var form = $(this);
                var contents = form.serialize();
                var request = $.ajax({
                    url: "load_book_by_type.php",
                    type: "POST",
                    data: contents,
                    datatype: 'json',
                    success: function(msg) {
                        $("#books").html(msg);
                        $("#book").html(msg);
                        $('html, body').animate({
                            scrollTop: 0
                        }, 100);
                    },
                    error: function(data) {
                        console.log('err');
                    }
                });
                return false;
            });
        });
		
	// Wyświetlanie dostępnych książek	

    $(document).ready(function() {
        function loadData(page) {
            loading_show();
            $.ajax({
                type: "POST",
                url: "load_data.php",
                data: "page=" + page,
                success: function(msg) {
                    loading_hide();
                    $("#book").html(msg);
                }
            });
        }

        loadData(1);

        $('#book').on('click', '.active', function() {
            var page = $(this).attr('p');
            loadData(page);
            $('html, body').animate({
                scrollTop: 0
            }, 100);
        });

        $('#book').on('click', '#go_btn', function() {
            var page = parseInt($('.goto').val());
            var no_of_pages = parseInt($('.total').attr('a'));
            if (page != 0 && page <= no_of_pages) {
                loadData(page);
            } else {
                alert('Wprowadź numer strony między 1 a ' + no_of_pages + '');
                $('.goto').val("").focus();
                return false;
            }
        });
    });
	
	// Wysyłanie wiadomości e-mail

	$(document).ready(
          function() {
              $('#send_email').on('submit', function() {
				$('#submited').empty();
                  var form = $(this);
                  var contents = form.serialize();
         
                  $.ajax({
                      url: 'send_email.php',
                      dataType: 'json',
                      type: 'post',
                      data: contents,
                      success: function(data) {
                      console.log(data);
					  $('#submited').append(data.feedback).show();
                      }
                  });
                 return false;
              });
          });
		  
	// Walidacja formularza rejestracji	  

    $(document).ready(function() {
        $("#add_user").validate({
            rules: {
                login: {
                    required: true,
                    remote: {
                        url: "check-login.php",
                        type: "post",
                        data: {
                            login: function() {
                                return $('#login').val();
                            }
                        }
                    }
                },
                passwd: "required",
                date_of_birth: {
                    required: true,
                    dateISO: true
                },
                email: "required",
                first_name: "required",
                last_name: "required",
                address: "required",
                country: "required",
            },
            messages: {
                login: {
                    required: '<span class="tip">* Podaj login</span>',
                    remote: jQuery.validator.format('<span class="tip">* <i>{0}</i> jest już zajęty</span>'),
                },
                passwd: '<span class="tip">* Podaj hasło</span>',
                date_of_birth: '<span class="tip">* Podaj poprawną datę narodzin</span>',
                first_name: '<span class="tip">* Podaj imię</jspan>',
                last_name: '<span class="tip">* Podaj nazwisko</span>',
                address: '<span class="tip">* Podaj adres</span>',
                country: '<span class="tip">* Podaj kraj</span>',
                email: '<span class="tip">* Podaj e-mail</span>',
            },
            submitHandler: function() {
                $('#add_user_success').empty();
                $('#add_user_box').hide();
                $('#button_add_user').hide();
                $('#user_added').show();
                $('#add_user_success').show();

            },
            success: function(label) {
                label.addClass("valid");
            },
            errorPlacement: function(error, element) {
                error.insertBefore(element);
            }
        });
    });
	
	// Walidacja formularza do wysyłania e-maila

    $(document).ready(function() {
        $('#send_email').validate({
            rules: {
                imie: "required",
                email: "required",
                temat: "required",
                wiadomosc: "required",
            },
            messages: {
                imie: '<span class="tip"> * Podaj Imię Nazwisko / Firmę</span>',
                email: '<span class="tip"> * Podaj poprawny adres e-mail</span>',
                temat: '<span class="tip"> * Podaj temat wiadomości</span>',
                wiadomosc: '<span class="tip"> * Podaj treść wiadomości</span>',
            },
            success: function(label) {
                label.addClass("valid");
            },
            errorPlacement: function(error, element) {
                error.insertBefore(element);
            }
        });
    });
	
	// Walidacja formularza logowania
	
    $(document).ready(function() {
        $('#login-form').validate({
            rules: {
                login_on: "required",
                password: "required",
            },
            messages: {
                login_on: '<span class="tip"> * Podaj login</span>',
                password: '<span class="tip"> * Podaj hasło</span>',
            },
            success: function(label) {
                label.addClass("valid");
            },
            errorPlacement: function(error, element) {
                error.insertBefore(element);
            }
        });
    });