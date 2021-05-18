/************************************ Loading ************************************/
$(function () {
  // Erorr: confirm form resubmission
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  $("#loading").fadeOut();
  $(".showLoading").on("click", function () {
    showLoading();
    setTimeout(function () {
      hideLoading();
    }, 5000);
  });
  /* $('#sidebar-wrapper').css('paddingTop', $('#thenavbar').innerHeight() ); */
  /* $('#page-content-wrapper').css('paddingTop', $('#thenavbar').innerHeight() ); */
  /* $('#wrapper').css('paddingTop', $('#thenavbar').innerHeight() ); */

  // gone the msg after 5 sec
  $(".alert-gone").animate({ width: "+=1px" }, 2000);
  $(".alert-gone").fadeOut();
  // $(".alert").animate({ opacity: '1' }, 2000);
  // $(".alert").fadeOut();

  $(".my-table").DataTable({
    order: [],
    columnDefs: [
      {
        targets: "no-sort",
        orderable: false,
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Arabic.json",
      searchPlaceholder: "",
    },
  });
});
/************************************ Loading ************************************/

/************************************ DatePicker ************************************/
/* $(function(){
    jQuery('#datetimepicker2').datetimepicker({
        lang:'ar',
        timepicker:false,
        format:'d/m/Y',
        formatDate:'Y/m/d',
    });

    jQuery('#datetimepicker1').datetimepicker({
        lang:'ar',
        timepicker:false,
        format:'d/m/Y',
        formatDate:'Y/m/d',
    });
    if($('.datetimepicker').length > 0) {
        $('.datetimepicker').datetimepicker({
            format: 'DD/MM/YYYY'
        });
    }
}); */
$(function () {
  $("#datepicker1").datepicker($.datepicker.regional["ar"], {
    maxDate: $.now(),
  });
  $("#datepicker2").datepicker($.datepicker.regional["ar"], {
    maxDate: $.now(),
  });
  $("#datepicker3").datepicker($.datepicker.regional["ar"], {
    maxDate: $.now(),
  });
  $("#datepicker4").datepicker($.datepicker.regional["ar"], {
    maxDate: $.now(),
  });
  $("#datepicker5").datepicker($.datepicker.regional["ar"], {
    maxDate: $.now(),
  });
  $("#datepicker6").datepicker($.datepicker.regional["ar"], {
    maxDate: $.now(),
  });
  $("#timepicker1").mdtimepicker();
  $("#timepicker2").mdtimepicker();
  $("#timepicker3").mdtimepicker();
  $("#timepicker4").mdtimepicker();
});

$(function () {
  $(".datepicker").datepicker({
    dateFormat: "yy/mm/dd",
    showAnim: "slideDown",
    changeMonth: true,
    changeYear: true,
  });
  $(".datepickerMaxToday").datepicker({
    maxDate: "0",
    dateFormat: "yy/mm/dd",
    showAnim: "slideDown",
    changeMonth: true,
    changeYear: true,
  });
  $(".datepickerMinToday").datepicker({
    minDate: "0",
    dateFormat: "yy/mm/dd",
    showAnim: "slideDown",
    changeMonth: true,
    changeYear: true,
  });
  $(".timepicker").mdtimepicker({
    theme: "blue",
    readOnly: true,
    clearBtn: true,
  });
});

/************************************ DatePicker ************************************/

/******************************** Sidebar ********************************/
$(function () {
  $("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  $(window).resize(function (e) {
    if ($(window).width() <= 768) {
      $("#wrapper").removeClass("toggled");
    } else {
      $("#wrapper").addClass("toggled");
    }
  });
});
/******************************** Sidebar ********************************/

/******************************** Confirm button alert ********************************/
$(function () {
  // Confirm the Delete Member
  $(".confirm").click(function () {
    return confirm("هل انت متأكد ؟");
  });
});
/******************************** Confirm button alert ********************************/

/********************************** Form inputs **********************************/
//***** Must Insert Number or dot (.) Olny
function onlyNumberKey(evt, t) {
  // Only ASCII charactar in that range allowed
  var thisValue = t.value;
  var counter = 0;
  if (thisValue.includes(".")) {
    counter++;
    var ASCIICode = evt.which ? evt.which : evt.keyCode;
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) return false;
    return true;
  } else {
    var ASCIICode = evt.which ? evt.which : evt.keyCode;
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57) && ASCIICode != 46)
      return false;
    return true;
  }
}

//***** Must Insert Number Olny
function onlyNumberKeyNotDot(evt) {
  // Only ASCII charactar in that range allowed
  var ASCIICode = evt.which ? evt.which : evt.keyCode;
  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) return false;
  return true;
}

// $(function() {
//     $(".number").on("keyup", function() {
//         thisValue = this.value;
//         thisValue = parseFloat((thisValue == "" || isNaN(thisValue)) ? 0 : thisValue);
//         $(this).val(thisValue);
//     });
// });

// stay On Current Tab when submit
function stayOnCurrentTab() {
  alert("work");
  var courseAdd = document.getElementById("courseAdd");
  var diblomaAdd = document.getElementById("diblomaAdd");
  courseAdd.removeClass("active").style.display = "none";
  diblomaAdd.addClass("active").style.display = "block";
}

//***** No paste anything in input
$(function () {
  $(".no-paste").bind("cut copy paste", function (e) {
    e.preventDefault();
  });
});

//***** No insert anything in input
$(function () {
  $(".no-insert").keydown(function (e) {
    e.preventDefault();
    return false;
  });
});

//***** Show password and hide it
function togglePassword() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
    $(".toggle-password").removeClass("fa-eye-slash");
    // $(".toggle-password").removeClass("text-secondary");
    $(".toggle-password").addClass("text-primary");
    $(".toggle-password").addClass("fa-eye");
  } else {
    x.type = "password";
    $(".toggle-password").removeClass("fa-eye");
    $(".toggle-password").removeClass("text-primary");
    // $(".toggle-password").addClass("text-secondary");
    $(".toggle-password").addClass("fa-eye-slash");
  }
}

function togglePassword1() {
  var x = document.getElementById("pass1");
  if (x.type === "password") {
    x.type = "text";
    $(".toggle-password1").removeClass("fa-eye-slash");
    $(".toggle-password1").addClass("text-primary");
    $(".toggle-password1").addClass("fa-eye");
  } else {
    x.type = "password";
    $(".toggle-password1").removeClass("fa-eye");
    $(".toggle-password1").removeClass("text-primary");
    $(".toggle-password1").addClass("fa-eye-slash");
  }
}

function togglePassword2() {
  var x = document.getElementById("pass2");
  if (x.type === "password") {
    x.type = "text";
    $(".toggle-password2").removeClass("fa-eye-slash");
    $(".toggle-password2").addClass("text-primary");
    $(".toggle-password2").addClass("fa-eye");
  } else {
    x.type = "password";
    $(".toggle-password2").removeClass("fa-eye");
    $(".toggle-password2").removeClass("text-primary");
    $(".toggle-password2").addClass("fa-eye-slash");
  }
}

//***** Auto-Expanding Textarea
var textarea1 = document.querySelector("#textarea1");
var textarea2 = document.querySelector("#textarea2");
var textarea3 = document.querySelector("#textarea3");
var textarea4 = document.querySelector("#textarea4");
var textarea5 = document.querySelector("#textarea5");
var textarea6 = document.querySelector("#textarea6");

if (textarea1) {
  textarea1.addEventListener("keydown", autosize);
}
if (textarea2) {
  textarea2.addEventListener("keydown", autosize);
}
if (textarea3) {
  textarea3.addEventListener("keydown", autosize);
}
if (textarea4) {
  textarea4.addEventListener("keydown", autosize);
}
if (textarea5) {
  textarea5.addEventListener("keydown", autosize);
}
if (textarea6) {
  textarea6.addEventListener("keydown", autosize);
}

// if (textarea1) {
//     textarea1.addEventListener('mousemove', autosize);
// }
// if (textarea2) {
//     textarea2.addEventListener('mousemove', autosize);
// }
// if (textarea3) {
//     textarea3.addEventListener('mousemove', autosize);
// }
// if (textarea4) {
//     textarea4.addEventListener('mousemove', autosize);
// }
// if (textarea5) {
//     textarea5.addEventListener('mousemove', autosize);
// }
// if (textarea6) {
//     textarea6.addEventListener('mousemove', autosize);
// }

function autosize() {
  var el = this;
  setTimeout(function () {
    el.style.cssText = "height:auto; padding:0";
    // for box-sizing other than "content-box" use:
    el.style.cssText = "-moz-box-sizing:content-box";
    el.style.cssText = "height:" + (el.scrollHeight + 3) + "px";
  }, 0);
}

$(function () {
  $(".textarea").on("keydown", function autosizeTextarea() {
    $(this).css({ height: "auto" });
    $(this).css({ height: this.scrollHeight + 3 + "px" });
  });
  // $(".textarea").on("mouseover", function autosizeTextarea() {
  //     $(this).css({ "height": "auto" });
  //     $(this).css({ "height": (this.scrollHeight + 3) + "px" });
  // });
  // $(".textarea").css({ "height": "auto" }).css({ "height": (this.scrollHeight + 3) + "px" });
});
/********************************** Form inputs **********************************/

/********************************** Select Option **********************************/
function changePrivilege(str) {
  // (4 - receptionist), (7 - manager)
  if (str == 4) {
    $("#branchesForJob").slideDown();
    $("#privilegeForJob").slideDown();
  } else if (str == 7) {
    $("#branchesForJob").slideDown();
    $("#privilegeForJob").slideUp();
  } else {
    $("#branchesForJob").slideUp();
    $("#privilegeForJob").slideUp();
  }
  $(".privilege").removeProp("checked");
  $(".privilege").removeProp("disabled");
  $("#privilege" + str).prop("checked", true);
  $("#privilege" + str).prop("disabled", true);
}
/********************************** Select Option **********************************/

/********************************** Select AJAX **********************************/
function callAjaxChangeDialog(url, divsArray = [], msgsArray = []) {
  let xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(divsArray[0]).innerHTML = this.responseText;

      for (i = 1; i < divsArray.length; i++) {
        document.getElementById(
          divsArray[i]
        ).innerHTML = `<option>-- اختر ${msgsArray[i]} --</option>`;
      }
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}

function callAjaxChangeInput(url, divId) {
  let xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(divId).value = this.responseText;
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}

function callChangeInput(divId, inputValue) {
  document.getElementById(divId).value = inputValue;
}
/********************************** Select AJAX **********************************/

/********************************** Print Div **********************************/
//#region Create PDF
//Create PDf from HTML...
function CreatePDF(divId) {
  var HTML_Width = $("#" + divId).width();
  var HTML_Height = $("#" + divId).height();
  var top_left_margin = 15;
  var PDF_Width = HTML_Width + top_left_margin * 2;
  var PDF_Height = HTML_Height + top_left_margin * 2;
  // var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
  var canvas_image_width = HTML_Width;
  var canvas_image_height = HTML_Height;

  var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

  html2canvas($("#" + divId)[0]).then(function (canvas) {
    var imgData = canvas.toDataURL("image/jpeg", 1.0);
    var pdf = new jsPDF("l", "pt", [PDF_Width, PDF_Height]);
    pdf.addImage(
      imgData,
      "JPG",
      top_left_margin,
      top_left_margin,
      canvas_image_width,
      canvas_image_height
    );
    for (var i = 1; i <= totalPDFPages; i++) {
      pdf.addPage(PDF_Width, PDF_Height);
      pdf.addImage(
        imgData,
        "JPG",
        top_left_margin,
        -(PDF_Height * i) + top_left_margin * 4,
        canvas_image_width,
        canvas_image_height
      );
    }
    pdf.save("receipts.pdf");
  });
}

function CreatePDFcertificate(divId) {
  var HTML_Width = $("#" + divId).width();
  var HTML_Height = $("#" + divId).height();
  var top_left_margin = 15;
  var PDF_Width = HTML_Width;
  var PDF_Height = HTML_Height;
  // var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
  var canvas_image_width = HTML_Width;
  var canvas_image_height = HTML_Height;

  var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

  html2canvas($("#" + divId)[0]).then(function (canvas) {
    var imgData = canvas.toDataURL("image/jpeg", 1.0);
    var pdf = new jsPDF("l", "pt", [PDF_Width, PDF_Height]);
    pdf.addImage(imgData, "JPG", 0, 0, canvas_image_width, canvas_image_height);
    for (var i = 1; i <= totalPDFPages; i++) {
      pdf.addPage(PDF_Width, PDF_Height);
      pdf.addImage(
        imgData,
        "JPG",
        top_left_margin,
        -(PDF_Height * i) + top_left_margin * 4,
        canvas_image_width,
        canvas_image_height
      );
    }
    pdf.save("certificate.pdf");
  });
}

function CreatePDFreceipt(divId) {
  var HTML_Width = $("#" + divId).width();
  var HTML_Height = $("#" + divId).height();
  var top_left_margin = 10;
  var PDF_Width = 564;
  var PDF_Height = 800;

  var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

  html2canvas($("#" + divId)[0]).then(function (canvas) {
    var imgData = canvas.toDataURL("image/jpeg", 1.0);
    var pdf = new jsPDF({ orientation: "p", unit: "pt", format: "a4" });
    pdf.addImage(
      imgData,
      "JPG",
      top_left_margin,
      top_left_margin,
      PDF_Width,
      PDF_Height
    );
    for (var i = 1; i <= totalPDFPages; i++) {
      pdf.addPage();
      pdf.addImage(
        imgData,
        "JPG",
        top_left_margin,
        -(PDF_Height * i) + top_left_margin * 2,
        PDF_Width,
        PDF_Height
      );
    }
    pdf.save("receipt.pdf");
  });
}
//#endregion Create PDF
/********************************** Print Div **********************************/

/********************************** Tabs **********************************/
function openTab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
/********************************** Tabs **********************************/

/********************************** Select All **********************************/
////////////////////// Select All //////////////////////
// Use 'prop' instead of 'attr'
// 'attr' only work the first time, better use 'prop'

// add multiple select/unselect functionality
$("#selectall").on("click", function () {
  $(".case").prop("checked", this.checked);
  console.log($(".case"));
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".case").on("click", function () {
  if ($(".case").length == $(".case:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});
/********************************** Select All **********************************/
