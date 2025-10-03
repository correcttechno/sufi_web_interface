(function ($) {
  "use strict";

  // ==========================================
  //      Start Document Ready function
  // ==========================================
  $(document).ready(function () {


    // =========================== Dropdown menu Js Start =======================
    $('.dropdown-menu').on('click', function (event) {
      event.stopPropagation();
    });

    // Remove Dropdown Menu
    $('.close-dropdown').on('click', function () {
      $('.dropdown-menu').removeClass('show');
      $('.dropdown-btn').removeClass('show');
      $('.dropdown-btn').setAttribute('aria-expanded', 'false')
    });
    // =========================== Dropdown menu Js End =======================


    // =========================== Submenu Open & Close Js Start =======================
    $('.has-dropdown').on('click', function () {
      $('.has-dropdown').removeClass('activePage');
      $('.has-dropdown').not($(this)).find('.sidebar-submenu').slideUp(400);

      $(this).find('.sidebar-submenu').slideToggle(400);
      $(this).toggleClass('activePage');
    });

    // $('.sidebar-menu__item.activePage').find('.sidebar-submenu').slideDown(400);
    // =========================== Submenu Open & Close Js End =======================


    // ========================== add active class to ul>li top Active current page Js Start =====================
    function dynamicActiveMenuClass(selector) {
      let FileName = window.location.pathname.split("/").reverse()[0];

      selector.find("li").each(function () {
        let anchor = $(this).find("a");
        if ($(anchor).attr("href") == FileName) {
          $(this).addClass("activePage");
        }
      });
      // if any li has activePage element add class
      selector.children("li").each(function () {
        if ($(this).find(".activePage").length) {
          $(this).addClass("activePage");
        }
      });
      // if no file name return
      if ("" == FileName) {
        selector.find("li").eq(0).addClass("activePage");
      }
    }
    if ($('ul').length) {
      dynamicActiveMenuClass($('ul'));
    }
    // ========================== add active class to ul>li top Active current page Js End =====================


    //  =========================== Submenu Open & Active Dropdown menu while page active ========================
    if ($('.sidebar-menu__item').hasClass('activePage')) {
      $('.sidebar-menu__item.activePage').find('.sidebar-submenu').slideDown(400);
    }
    //  =========================== Submenu Open & Active Dropdown menu while page active End ========================


    //  =========================== Sidebar Open & Close Start ===============================
    $('.toggle-btn').on('click', function () {
      $('.sidebar').addClass('active')
      $('.side-overlay').addClass('show')
    });

    $('.side-overlay, .sidebar-close-btn').on('click', function () {
      $('.side-overlay').removeClass('show')
      $('.sidebar').removeClass('active')
    });
    //  =========================== Sidebar Open & Close End ===============================


    // =========================== Tooltip Js Start ===============================
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    // =========================== Tooltip Js End ===============================

    // ============================= Image Upload Js Start ==============================
    $(function () {
      $("#fileUpload").fileUpload();
    });
    // ============================= Image Upload Js End ==============================


    // ============================= Image Upload Js Start ==============================
    $('.text-counter').on('input', function () {
      const characterCount = $(this).val().length;
      console.log(characterCount);
      $('#current').text(characterCount);
    });
    // ============================= Image Upload Js End ==============================


    // ============================= Course Details Accordion Js Start ==============================
    $('.course-item__button').on('click', function () {

      $('.course-item__button').not($(this)).removeClass('active');
      $('.course-item__button').not($(this)).closest('.course-item').find('.course-item-dropdown').slideUp();

      $(this).toggleClass('active');
      $(this).closest('.course-item').find('.course-item-dropdown').slideToggle();
    });

    $('.course-list__item.active .circle i').removeClass('ph ph-circle');
    $('.course-list__item.active .circle i').addClass('ph-fill ph-check-circle text-main-600');

    // ============================= Course Details Accordion Js End ==============================


    // ================== Password Show Hide Js Start ==========
    $(".toggle-password").on('click', function () {
      $(this).toggleClass("active");
      var input = $($(this).attr("id"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
    // ========================= Password Show Hide Js End ===========================

    // ========================= Billing Radio Checked Js Start ===========================
    $('.form-check-input.payment-method-one').on('change', function () {
      $('.payment-method.payment-method-one').removeClass('active');
      $(this).closest('.payment-method.payment-method-one').addClass('active');
    });

    $('.form-check-input.payment-method-two').on('change', function () {
      $('.payment-method.payment-method-two').removeClass('active');
      $(this).closest('.payment-method.payment-method-two').addClass('active');
    });
    // ========================= Billing Radio Checked Js End ===========================


    // ========================= List Grid View Js Start ===========================
    $('.list-grid-view li.activePage').each(function () {
      var icon = $(this).find('a i');
      if (icon.hasClass('ph-rows')) {
        icon.removeClass('ph-rows').addClass('ph-fill ph-rows');
      } else if (icon.hasClass('ph-squares-four')) {
        icon.removeClass('ph-squares-four').addClass('ph-fill ph-squares-four');
      }
    });

    $('.list-view-btn').on('click', function () {
      $(this).addClass('active');
      $('.grid-view-btn').removeClass('active');
      $('.list-view').removeClass('d-none');
      $('.grid-view').addClass('d-none');
    });

    $('.grid-view-btn').on('click', function () {
      $(this).addClass('active');
      $('.list-view-btn').removeClass('active');
      $('.grid-view').removeClass('d-none');
      $('.list-view').addClass('d-none');
    });
    // ========================= List Grid View Js End ===========================


    // ========================= Toggle Search Box Js Start ===========================
    $('.toggle-search-btn').on('click', function () {
      $(this).toggleClass('bg-main-600 border-main-600 text-white');
      $('.toggle-search-box').slideToggle();
    });
    // ========================= Toggle Search Box Js End ===========================

  });
  // ==========================================
  //      End Document Ready function
  // ==========================================

  // ========================= Preloader Js Start =====================
  $(window).on("load", function () {
    $('.preloader').fadeOut();
  })
  // ========================= Preloader Js End=====================

  // ========================= Header Sticky Js Start ==============
  $(window).on('scroll', function () {
    if ($(window).scrollTop() >= 260) {
      $('.header').addClass('fixed-header');
    }
    else {
      $('.header').removeClass('fixed-header');
    }
  });
  // ========================= Header Sticky Js End===================

  var selectPicker = $('.selectpicker').selectpicker({


    countSelectedText: '[$1] öğe seçildi',
    dropupAuto: false,

    liveSearch: true,
    liveSearchPlaceholder: 'Axtar...',

    selectedTextFormat: 'count > 3',
    showSubtext: true,
    size: 7,
    style: 'btn-primary',
    tickIcon: 'ph ph-check-fat',
    width: '100%'

  });

  var selectPicker2 = $('.selectpicker2').selectpicker({

    dropupAuto: false,
    liveSearch: true,
    liveSearchPlaceholder: 'Axtar...',
    size: 5,
    width: '100%'

  });


  function write_form_element(object, item, value) {

    if (object.find('[name=' + item + ']:not([type=file])').length > 0) {

      if (object.find('[name=' + item + '].word').length > 0) {
        object.find('[name=' + item + '].word').froalaEditor('html.set', value);
      }

      if (object.find('[name=' + item + '].word_2').length > 0) {
        object.find('[name=' + item + '].word_2').froalaEditor('html.set', value);
      }

      ////
      if (object.find('[name=' + item + ']').attr('type') != undefined) {
        if (object.find('[name=' + item + ']').attr('type') == 'checkbox' || object.find('[name=' + item + ']').attr('type') == 'radio') {
          if (value == 'false' || value == false) {
            object.find('[name=' + item + ']').prop('checked', false);
          }
          else {
            object.find('[name=' + item + ']').prop('checked', true);
          }

        } else {
          object.find('[name=' + item + ']').val(value);
        }
      } else {
        object.find('[name=' + item + ']').val(value);
      }



    } else {
      if (item == 'image') {
        if (object.find('img.form-image').length > 0) {
          object.find('img.form-image').attr('src', value);
        } else {
          object.find('.form-image').html(value);
        }
      }

      //custom json for users
      else if (item == "languages" && value != 'null') {
        var dat = JSON.parse(value);
        $('#languages').find("option").removeAttr("selected");
        for (var i = 0; i < dat.length; i++) {
          $('#languages').find("option[value=" + dat[i] + "]").attr("selected", true);
        }
        selectPicker.selectpicker("refresh");
      }

      else if (item == "subjects" && value != 'null') {
        var dat = JSON.parse(value);
        $('#subjects').find("option").removeAttr("selected");
        for (var i = 0; i < dat.length; i++) {
          $('#subjects').find("option[value=" + dat[i] + "]").attr("selected", true);
        }
        selectPicker.selectpicker("refresh");
      }

    }


    if(item=="status"){
      if(value=="manager")
        $('#select_department').removeClass('d-none');
      else
        $('#select_department').addClass('d-none');
    }
    console.log(value);
  }

  var base_url = $('#base_url').val().replace("room_scheduling/", "");
  base_url = new URL(base_url);
  base_url.search = '';
  base_url = base_url.toString();
  $('form:not([data-stop])').ajaxForm({
    beforeSend: function () {
      $('form').addClass('loading');
    },
    uploadProgress: function (h, o, t, faiz) {

    },
    complete: function (x) {
      $('form').removeClass('loading');
      var result = x.responseText;
      var json = JSON.parse(result);
      $.each(json, function (i, item) {
        $('[data-error=' + i + ']').html(item);
      });

      if (json.status != undefined && json.status == true) {
        $('form input,form select').val('');
        location.reload();
      }
    }
  });

  $('#addModal').on('hidden.bs.modal', function () {
    $('#addModal').find('input[name=id]').val(0);
    $('#addModal').find('input,select,textarea').val('');
  });

  $(document).on('click', '[data-delete-id]', function () {
    $('#deleteModal').find('input[name=delete_id]').val($(this).attr('data-delete-id'));
    if ($(this).attr('data-o-id') != undefined) {
      $('#deleteModal').find('input[name=o_id]').val($(this).attr('data-o-id'));
    }
    else {
      $('#deleteModal').find('input[name=o_id]').val(0);
    }
    $('#deleteModal').modal('show');
  })

  $('button[type=reset]').click(function () {
    $('.modal').modal('hide');
  })

  function read_row_data(id) {
    // Mevcut URL'yi alın
    let url = new URL(base_url);

    // URL'den sorgu parametrelerini al
    let params = url.searchParams;

    // 'f' parametresini kaldır
    params.delete("f");

    // Güncellenmiş URL'yi alın
    url.search = params.toString();

    $.ajax({
      url: url.toString() + '/read_row',
      dataType: "json",
      data: { 'id': id },
      method: 'post',
      success: function (e) {
        $.each(e, function (item, value) {

          write_form_element($('#addModal,#answerModal'), item, value);

        })
      },
    });
  }

  $(document).on('click', '[data-edit-id]', function () {
    $('#addModal').modal('show');
    read_row_data($(this).attr('data-edit-id'));
  })

  $(document).on('click', '[data-answer-id]', function () {
    $('#answerModal').find('textarea').val();
    $('#answerModal').modal('show');
    read_row_data($(this).attr('data-answer-id'));
  })



  $('#notanswer').click(function () {
    $('input[name=status]').val("notanswer");
    //return false;
  })

  $('#answer').click(function () {
    $('input[name=status]').val("answered");
    //return false;
  })

  $('#task_filter').change(function () {
    window.location.href = $(this).val();
  })

  $('#noftButton').click(function () {
    $.post(base_url + "/readallnoft", {}, function (e) {
      $('#alarm').remove();
    });
  })

  $('.reports_check').click(function () {
    var task_id = $(this).attr('id');
    var customer_id = $(this).attr('data-id');
    $('#alertModal').modal("show").find('input[name=a_id]').val(task_id);
    $('#alertModal').modal("show").find('input[name=b_id]').val(customer_id);
    //  return false;
  });

  $('#select_month').change(function () {
    $('#month_form').submit();
  })

  $('#subject_id').change(function () {
    $('#teacher_id,#teacher_id2,#teacher_id3').empty();
    $.post(base_url.replace("/dashboard", "") + "/teachers/read_by_subject", { 'id': $(this).val(), 'group_id': $('#group').val() }, function (e) {
      var json = JSON.parse(e);
      $('#teacher_id,#teacher_id2,#teacher_id3').append("<option value='0'>--seçim--</option>")
      $.each(json, function (i, item) {
        $('#teacher_id,#teacher_id2,#teacher_id3').append('<option value="' + item.id + '">' + item.firstname + ' ' + item.lastname + '</option>');
      });
    });
  });

  $('#dvider').change(function () {
    $('.group2').toggleClass('d-none');
  });

  $('#print_btn').click(function(){
    window.print();
  })


  $('#status').change(function(){
    if($(this).val()=='manager'){
      $('#select_department').removeClass('d-none');
    }
    else{
      $('#select_department').addClass('d-none');
    }
  })

  /*reamore js*/
  $('.readmore').readmore({
    speed: 300,                // Açılma animasyonu süresi (ms)
    collapsedHeight: 30,        // Başlangıçta gösterilecek yükseklik (px)
    moreLink: '<a href="#" class="btn btn-sm btn-link text-main-600 text-12">Ardına bax</a>',
    lessLink: '<a href="#" class="btn btn-sm btn-link text-main-600 text-12">Daha Az göstər</a>'
  });

  /*clenadar */

  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();
  /*  className colors
  className: default(transparent), important(red), chill(pink), success(green), info(blue)
  */
  /* initialize the external events
  -----------------------------------------------------------------*/
  $('#external-events div.external-event').each(function () {
    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
    // it doesn't need to have a start or end
    var eventObject = {
      title: $.trim($(this).text()) // use the element's text as the event title
    };
    // store the Event Object in the DOM element so we can get to it later
    $(this).data('eventObject', eventObject);
    // make the event draggable using jQuery UI
    $(this).draggable({
      zIndex: 999,
      revert: true,      // will cause the event to go back to its
      revertDuration: 0  //  original position after the drag
    });

  });
  /************** initialize the calendar *********************
  -----------------------------------------------------------------*/
  var newUrl = new URL(window.location.href);
  var teacher_id=newUrl.searchParams.get("teacher_id");

  var calendar = $('#calendar').fullCalendar({
    header: {
      left: '',//'agendaDay,month,agendaWeek',
      center: '',
      right: ''
    },
    editable: false,
    firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
    selectable: true,
    defaultView: 'agendaWeek',
    minTime: '08:00:00',
    maxTime: '21:00:00',
    axisFormat: 'HH:mm',
    columnFormat: {
      month: 'ddd',    // Ay görünümünde (Örnek: "Pzt")
      week: 'ddd', // Hafta görünümünde (Örnek: "Pzt 2/5")
      day: 'dddd M/D'  // Gün görünümünde (Örnek: "Pazartesi 2/5")
    },
    titleFormat: {
      month: 'MMMM yyyy', // September 2009
      week: "yyyy MMMM", // September 2009
      day: 'MMMM yyyy'  // Tuesday, Sep 8, 2009
    },
    dayNames: ['Bazar', 'Bazar ertəsi', 'Çərşənbə axşamı', 'Çərşənbə', 'Cümə axşamı', 'Cümə', 'Şənbə'],
    dayNamesShort: ['Bazar', 'Bazar ertəsi', 'Çərşənbə axşamı', 'Çərşənbə', 'Cümə axşamı', 'Cümə', 'Şənbə'],
    allDaySlot: false,//cambie a true
    selectHelper: true,
    //hiddenDays:[0,6],

    dayClick: function (date, jsEvent, view) {

    },

    eventClick: function (event, jsEvent, view) {
      $('#blockModal').modal('show').find('.content').html(event.title);
      $('#deleteModal').find('input[name=delete_id]').val(event.id);
      // read_row_data(event.id);
    },
    select: function (startDate, endDate, allDay) {

    },
    droppable: true, // this allows things to be dropped onto the calendar !!!
    drop: function (date, allDay) { // this function is called when something is dropped

    },

    events: base_url.replace('schedules','') + '/read/' + $('#group').val() + "/" + $('#weektype').val()+"/"+teacher_id,
  });

  $('#delete_event').click(function () {
    $('#deleteModal').modal('show');
  })

  /*  $('#edit_event').click(function(){
     $('#addModal').modal('show');
   }) */


  $('#group').change(function () {
    var selectedValue = $(this).val();
    var currentUrl = window.location.href;
    var newUrl = new URL(currentUrl);
    newUrl.searchParams.set("group", selectedValue);
    window.location.href = newUrl;
  });

  $('#weektype').change(function () {
    var selectedValue = $(this).val();
    var currentUrl = window.location.href;
    var newUrl = new URL(currentUrl);
    newUrl.searchParams.set("weektype", selectedValue);
    window.location.href = newUrl;
  });

  $('#startDate').change(function () {
    var startTime = $(this).val();
    var timeParts = startTime.split(":");
    var hours = parseInt(timeParts[0]);
    var minutes = parseInt(timeParts[1]);
    minutes += 95;
    if (minutes >= 60) {
      hours += Math.floor(minutes / 60);
      minutes = minutes % 60;
    }
    var newTime = ("0" + hours).slice(-2) + ":" + ("0" + minutes).slice(-2);
    $("#endDate").val(newTime);
  });

})(jQuery);
