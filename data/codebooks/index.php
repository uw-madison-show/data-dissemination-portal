<!DOCTYPE html>
<html lang="en" class="is-copy-enabled">
  <head>

    <?php
      $include_folder = $_SERVER['DOCUMENT_ROOT'] . '/data/includes/';
      include( $include_folder . 'head.php' );
    ?>

    <style type="text/css">
      .full-page{
        position: fixed;
        /*top: 50px;*/
        left: 0;
        right: 0;
        bottom: 0;
        height: auto;
        width: 100%;
      }
      .row-fill{
        position: relative;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        height: 100%;
        width: inherit;
        overflow: auto;
      }
      .col-fixed-1{
          position: fixed;
          top: 50px;
          left: 0;
          right: 0;
          bottom: 0;
          width: 300px;
          height: inherit;
          background:lightblue;
          overflow-y: scroll;
          overflow-x: hidden;
      }
      .col-fixed-2{
          position: fixed;
          top: 50px;
          left: 300px;
          right: 0;
          bottom: 0;
          width: 300px;
          height: inherit;
          background:lightgray;
          overflow-y: scroll;
          overflow-x: hidden;
      }
      .col-fixed-3{
          position: fixed;
          top: 50px;
          left: 600px;
          right: 0;
          bottom: 0;
          height: inherit;
          overflow: hidden;
          padding: 5px;
      }
      .embed-full{
        height: 100%;
        overflow: auto;
      }
      #codebook-iframe{
        height: 98%;
        width: inherit;
      }
      a.instrument-list-item-link {
        font-weight: bolder;
        color: #505050;
      }
      .list-group-item.codebook-list-year-header {
        font-weight: bold;
        background-color: lightblue;
        margin-top: 5px;
      }
      #codebook-list a.list-group-item {
        margin-left: 5px;
      }

    </style>
  </head>
  <body id="page-top" style="padding-top: 55px;">
    <a href="#content" class="sr-only">skip to content</a>

    <header>
      <?php include( ($include_folder . 'navbar.php') ); ?>
    </header>

    <div class="container-fluid">
      <div class="row full-page" >
        <div class="col-fixed-1">
          <h3>Survey Topics</h3>
          <ul id="instrument-list">
          </ul>
        </div>
        <div class="col-fixed-2">
          <h3>Codebooks by Year</h3>
          <div id="codebook-list" class="list-group">
          </div>
        </div>
        <div class="col-fixed-3">
            <div class="row row-fill">
              <div class="col-xs-12 embed-full">
                <iframe id="codebook-iframe">Your browser does not support iFrames.</iframe>
              </div>
            </div>
        </div>
      </div>
    </div>

  <script type="text/javascript">
    $(document).ready( function() {
      // console.log('hello world');

      // functions
      var instrumentClicked = function(e) 
      {
        // console.log('function ready');
        e.preventDefault();
        $('#codebook-iframe').attr('src', '' );
        var cb = $(this).data("codebooks");
         // console.log(cb);
        var tg = $('#codebook-list');
         // console.log(tg);
        tg.empty();

        parseInstrument(cb, tg);
      }

      var codebookClicked = function(e)
      {
        // console.log($(this));
        e.preventDefault();

        $('#codebook-iframe').attr('src', this.id );
      }

      var parseInstrument = function(codebooks, target)
      {
        var raw_cb = {};
        var derived_cb = {};
        var annotated = {};
        var years = [];

        // patterns for matching
        // set them to be case insensitive
        var derived_pat = new RegExp(/_DER$/i);
        var annotated_pat = new RegExp(/_ANNOTATED\.[pdf|doc|html]/i);

        // kludge to fix the problem with iframe caching
        var kludge = Date.now();

        $.each( codebooks, function(key, this_codebook) {
          // console.log( key );
          // console.log( this_codebook );
          
          years.push(this_codebook.year);

          if ( derived_pat.test( this_codebook.instr ) ) {
            // console.log('we have a derived codebook');
            if( !derived_cb.hasOwnProperty(this_codebook.year) ) {
              derived_cb[this_codebook.year] = [];
            }
            derived_cb[this_codebook.year].push({
              // TODO fix all the urls so they are relative to /data/codebooks but for the 
              // life of me i can not figure out how to make dev, test, and prod agree on
              // relative paths
              "src" : "/data/codebooks/instruments/" + this_codebook.instr + "_" + this_codebook.year + ".html?id=" + kludge, 
              "text" : this_codebook.title,
              "title" : "[Derived] " +this_codebook.subject
              });
          } else if ( annotated_pat.test( this_codebook.instr ) ) {
            // console.log('we have a annotated questionnaire');
            if( !annotated.hasOwnProperty(this_codebook.year) ) {
              annotated[this_codebook.year] = [];
            }
            var abbreviation = this_codebook.instr.match(/[a-zA-Z0-9-]*_/);
            abbreviation = abbreviation[0].replace('_', '');
            annotated[this_codebook.year].push({
              "src" : "/data/codebooks/annotated/" + this_codebook.year + "/" + this_codebook.instr + "?id=" + kludge,
              "text" : "[Annotated Survey] " + abbreviation,
              "title" : this_codebook.instr
            });
          } else {
            // console.log('we have a raw codebook');
            if( !raw_cb.hasOwnProperty(this_codebook.year) ) {
              raw_cb[this_codebook.year] = [];
            }
            raw_cb[this_codebook.year].push({
              "src" : "/data/codebooks/instruments/" + this_codebook.instr + "_" + this_codebook.year + ".html?id=" + kludge,
              "text" : this_codebook.title,
              "title" : "[Raw] " + this_codebook.subject
            });
          }
        }); // end for each over cb

        var years_unique = $.grep( years, function(v, k) {
                             return $.inArray(v, years) === k;
                           });
        years_unique.sort()

        // console.log(years_unique);
        // console.log(raw_cb);
        // console.log(derived_cb);
        // console.log(annotated);


        $.each( years_unique, function(key, year) {

          // make the "header" for the years
          $(target).append(
            $('<div>').attr('href', '#')
                      .text(year)
                      .addClass('list-group-item')
                      .addClass('codebook-list-year-header')
          );

          // add the raw codebook link(s) if they exist
          var rr = $('<a>').attr('href', '#')
                           .text('[Raw Variables]')
                           .addClass('list-group-item')
                           .addClass('disabled')
                           ;
          if ( raw_cb.hasOwnProperty(year) ) {
            $.each( raw_cb[year], function(key, this_cb) {
              var rr = $('<a>').attr('href', '#');
              rr.text(this_cb.text);
              rr.attr('title', this_cb.title);
              rr.addClass('list-group-item');
              rr.addClass('codebook-list-item-link');
              rr.addClass('tooltip-right');
              rr.attr('id', this_cb.src);
              $(target).append(rr);
            });
          } else {
            //$(target).append(rr); // attache the disabled link
          }
          

          // add the derived codebook link if it exists
          var dd = $('<a>').attr('href', '#')
                           .text('Derived Variables')
                           .addClass('list-group-item')
                           .addClass('disabled')
                           ;
          if ( derived_cb.hasOwnProperty(year) ) {
            $.each( derived_cb[year], function(key, this_cb) {
              var dd = $('<a>').attr('href', '#');
              dd.text(this_cb.text);
              dd.attr('title', this_cb.title);
              dd.addClass('list-group-item');
              dd.addClass('codebook-list-item-link');
              dd.addClass('tooltip-right');
              dd.attr('id', this_cb.src);
              $(target).append(dd);
            })
          } else {
            //$(target).append(dd); // attache the disabled link
          }

          // add annotated questionnaire if it exists
          var aa = $('<a>').attr('href', '#')
                           .text('Annotated Survey')
                           .addClass('list-group-item')
                           .addClass('disabled')
                           ;
          if ( annotated.hasOwnProperty(year) ) {
            $.each( annotated[year], function(key, this_cb) {
              var aa = $('<a>').attr('href', '#');
              aa.text(this_cb.text);
              aa.attr('title', this_cb.title);
              aa.addClass('list-group-item');
              aa.addClass('codebook-list-item-link');
              aa.addClass('tooltip-right');
              aa.attr('id', this_cb.src);
              $(target).append(aa);
            })
          } else {
            //$(target).append(aa); // attache the disabled link
          }
          //     $('<a>').attr('href', '#')
          //             //.attr('id', cb_year)
          //             .attr('class', 'codebook-list-item-link')
          //             .text(year)
          //             addClass('codebook-list-item').append(
          // ));
        }); // end of each years_unique
      }

      // on load 
      $.getJSON( '/data/codebooks/codebook_menu.json' , function( instruments ) {
        // make the menu items
        $.each( instruments, function(key, value) {
          // // console.log( key );
          // // console.log( value );
          $('#instrument-list').append(
            $('<li>').addClass('instrument-list-item').append(
              $('<a>').attr('href', '#')
                      .attr('id', key)
                      .attr('data-codebooks', JSON.stringify(value))
                      .attr('class', 'instrument-list-item-link')
                      .text(key)
          ));
        });
      });

      // turn on tooltips
      $('.tooltip-right').tooltip({ placement: "right",
                                    delay: 500,
                                     })

      // load up dynamic listeners
      $('#instrument-list').on('click', '.instrument-list-item-link', instrumentClicked );
      $('#codebook-list').on('click', '.codebook-list-item-link', codebookClicked );

    }); // end document ready
  </script>
  </body>

</html>
