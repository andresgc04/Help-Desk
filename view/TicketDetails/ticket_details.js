function init() {}

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split("&"),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split("=");

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : sParameterName[1];
    }
  }
};

$(document).ready(function () {
  let ticketID = getUrlParameter("ticketID");

  $.post(
    "../../controller/TicketsController.php?op=listarTicketDetalle",
    { ticketID: ticketID },
    function (data) {
      $("#ticketDetalles").html(data);
    }
  );
});

$(function () {
  $(".fancybox").fancybox({
    padding: 0,
    openEffect: "none",
    closeEffect: "none",
  });
});

init();
