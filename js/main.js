// Injecting svg sprite in the beginning of document
// var ajax = new XMLHttpRequest();
// ajax.open('GET', 'img/sprite.svg', true);
// ajax.responseType = 'document';
// ajax.onload = function(e) {
//   document.body.insertBefore(
//     ajax.responseXML.documentElement,
//     document.body.childNodes[0]
//   );
// };
// ajax.send();

// $(window).on('resize', () => {
//   if ($(window).width() > 1023) {
//     enableScrolling();
//   } else {
//     if ($('.page-header__checkbox').is(':checked')) {
//       disableScrolling();
//     }
//   }
// });

// $('.page-header__checkbox').on('change', function (e) {
//   if (this.checked) {
//     disableScrolling();
//   } else {
//     enableScrolling();
//   }
// });

// function disableScrolling() {
//   if ($(document).height() > $(window).height()) {
//     var scrollTop = $('html').scrollTop()
//       ? $('html').scrollTop()
//       : $('body').scrollTop(); // Works for Chrome, Firefox, IE...
//     $('html')
//       .addClass('disable-scrolling')
//       .css('top', -scrollTop);
//   }
// }

// function enableScrolling() {
//   var scrollTop = parseInt($('html').css('top'));
//   $('html').removeClass('disable-scrolling');
//   $('html,body').scrollTop(-scrollTop);
// }
