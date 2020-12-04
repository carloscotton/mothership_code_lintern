/*NAVIGATION.JS*/
/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
function genericCta(){
  window.dataLayer.push({ 'event': 'inArticle_generic_cta' });
  console.log("Generic CTA Click");
}
( function() {
  var container, button, menu, links, i, len;

  container = document.getElementById( 'site-navigation' );
  if ( ! container ) {
    return;
  }

  button = container.getElementsByTagName( 'button' )[0];
  if ( 'undefined' === typeof button ) {
    return;
  }

  menu = container.getElementsByTagName( 'ul' )[0];

  // Hide menu toggle button if menu is empty and return early.
  if ( 'undefined' === typeof menu ) {
    button.style.display = 'none';
    return;
  }

  menu.setAttribute( 'aria-expanded', 'false' );
  if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
    menu.className += ' nav-menu';
  }

  button.onclick = function() {
    if ( -1 !== container.className.indexOf( 'toggled' ) ) {
      container.className = container.className.replace( ' toggled', '' );
      button.setAttribute( 'aria-expanded', 'false' );
      menu.setAttribute( 'aria-expanded', 'false' );
    } else {
      container.className += ' toggled';
      button.setAttribute( 'aria-expanded', 'true' );
      menu.setAttribute( 'aria-expanded', 'true' );
    }
  };

  // Get all the link elements within the menu.
  links    = menu.getElementsByTagName( 'a' );

  // Each time a menu link is focused or blurred, toggle focus.
  for ( i = 0, len = links.length; i < len; i++ ) {
    links[i].addEventListener( 'focus', toggleFocus, true );
    links[i].addEventListener( 'blur', toggleFocus, true );
  }

  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
    var self = this;

    // Move up through the ancestors of the current link until we hit .nav-menu.
    while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

      // On li elements toggle the class .focus.
      if ( 'li' === self.tagName.toLowerCase() ) {
        if ( -1 !== self.className.indexOf( 'focus' ) ) {
          self.className = self.className.replace( ' focus', '' );
        } else {
          self.className += ' focus';
        }
      }

      self = self.parentElement;
    }
  }

  /**
   * Toggles `focus` class to allow submenu access on tablets.
   */
  ( function( container ) {
    var touchStartFn, i,
      parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

    if ( 'ontouchstart' in window ) {
      touchStartFn = function( e ) {
        var menuItem = this.parentNode, i;

        if ( ! menuItem.classList.contains( 'focus' ) ) {
          e.preventDefault();
          for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
            if ( menuItem === menuItem.parentNode.children[i] ) {
              continue;
            }
            menuItem.parentNode.children[i].classList.remove( 'focus' );
          }
          menuItem.classList.add( 'focus' );
        } else {
          menuItem.classList.remove( 'focus' );
        }
      };

      for ( i = 0; i < parentLink.length; ++i ) {
        parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
      }
    }
  }( container ) );
} )();

/*SKIP-LINK-FOCUS-FIX.JS*/
/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
  var isIe = /(trident|msie)/i.test( navigator.userAgent );

  if ( isIe && document.getElementById && window.addEventListener ) {
    window.addEventListener( 'hashchange', function() {
      var id = location.hash.substring( 1 ),
        element;

      if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
        return;
      }

      element = document.getElementById( id );

      if ( element ) {
        if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
          element.tabIndex = -1;
        }

        element.focus();
      }
    }, false );
  }
} )();

$( document ).ready(function() {
    $("#show-searchbox").on("click", function(){
      $('#hc_hero_search').toggleClass('search-active');
      $('#show-searchbox').toggleClass('show-searchbox-active');
      $('#s').focus();
    });

  // Get the modal
  var modal = document.getElementById('hc_hero_search');

  window.onclick = function(event) {
    if (event.target == modal) {
      console.log('modal');
      $('#hc_hero_search').toggleClass('search-active');
    $('#show-searchbox').toggleClass('show-searchbox-active');
    }
  }

  
    $(".related_topics__title").click(changeClass);

    function changeClass() {
      $(this).toggleClass("related_topic_show");
    }

    $('sup').each(function(index, value) {
      valuei = $(value).text();
      citationTitle = $('#citation-'+valuei).html();
      $(value).attr('data-citation',valuei);
      $(value).children().attr('data-html','true');
      $(value).children().attr('title',citationTitle);
      $(value).addClass('sup-class');
    });

    $( ".sup-class" ).click(function( event ) {
      event.preventDefault();
      citation = $(this).attr('data-citation');
      $('html, body').animate({ scrollTop: $('#citation-'+citation).offset().top }, 2000);
    });

    $('sup[data-citation] a').tooltip({ trigger: "hover" });

    $( ".mapa" ).click(function() {
      var valuemap = $(this).data('map');
      $('.mapa').removeClass('active-a');
      $(this).addClass('active-a');
      $('.acf-map').removeClass('active');
      $('#'+valuemap).addClass('active');
    });

    //$(".ginput_container_phone input").mask("(999) 999-9999");

    $(".ginput_container_phone input").on("blur", function(){
        var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

        if( last.length == 3 ) {
            var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
            var lastfour = move + last;
            var first = $(this).val().substr( 0, 9 );

            $(this).val( first + '-' + lastfour );
        }
    });

  $( ".article_helpful_question input[type=radio]" ).bind( "click", function() {
    var radioSelected = $(this).val();

    if(radioSelected == 1){
      $(".article_helpful_form .article_helpful_email").show();
      $(".article_helpful_form .article_helpful_options").hide();
      $(".article_helpful_form .article_helpful_question").hide();
      $(".article_helpful_form .article_helpful_thanks").show();
      $(".article_helpful_form .gform_footer").show();
    }else{
      $(".article_helpful_form .article_helpful_options").show();
      $(".article_helpful_form .article_helpful_question").hide();
      $(".article_helpful_form .gform_footer").hide();
    }

  });

  $( ".article_helpful_options input[type=radio]" ).bind( "click", function() {
    var radioSelected = $(this).val();

    if(radioSelected == "Other"){
      $(".article_helpful_form .article_helpful_other_line").show();
      $(".article_helpful_form .article_helpful_options").hide();
    }else{
      $(".article_helpful_form .article_helpful_other_line").hide();
    }

    $(".article_helpful_form .gform_footer").show();
  });

  $( ".article_helpful_options li" ).bind( "click", function() {
    $(this).siblings().removeClass("article_helpful_option_selected");
    $(this).addClass("article_helpful_option_selected");
  });

  $('.article_helpful_form textarea').attr('readonly','readonly');
});