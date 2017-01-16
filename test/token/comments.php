<?php
namespace  /*?*/ a  /*?*/ \  /*?*/ b  /*?*/ {

  if /* ignore */ (/* */ true) /* ignore */ {
  # inner statement
  } /* ignore */ else /* ignore */
    if (true /* ignore */) /* ignore */ {
    } /* ignore */ elseif /* ignore */ (/* ignore */ false /* ignore */ /* ignore */) /* ignore */ /* ignore */ {
    } /* ignore */ else /* ignore */ {
    }
  if (false) /* ignore */ : /* ignore */ ?>
  hello world <?php
  /* ignore */ endif /* ignore */;/* ignore */

  for /*?*/ ( /*?*/ $i /*?*/ = /*?*/ 0 /*?*/; /*?*/ $i /*?*/ < /*?*/ 10 /*?*/; /*?*/ $i++ /*?*/ ) /*?*/ {
    /*?*/
  }

  do /*?*/ {
    /*?*/
  } /*?*/ while /*?*/ (/*?*/ false /*?*/) /*?*/;

  while /*?*/ (/*?*/ false /*?*/) /*?*/ {
    /*?*/
  }

  foreach /*?*/ ($a /*?*/ as /*?*/ $i /*?*/ => /*?*/ $j /*?*/ ) /*?*/ {
    /*?*/
  }

  switch /*?*/ (/*?*/ $a /*?*/) /*?*/ {
    /*?*/ case /*?*/ 1 /*?*/ :
    /*?*/ break /*?*/ ;
    /*?*/ default /*?*/;
  }

  function /*?*/ &foo /*?*/ (/*?*/ array /*?*/ &$a /*?*/ = /*?*/ null /*?*/ ) /*?*/ : array /*?*/ {
    return /*?*/ null /*?*/ ; /*?*/
  } /*?*/

  foo /*?*/ ( /*?*/ true /*?*/ , /*?*/ false /*?*/ )/*?*/;

  $a /*?*/ = /*?*/ [ /*?*/ true /*?*/, /*?*/ "aa" /*?*/ => /*?*/ false /*?*/ ];

  list /*?*/ ( /*?*/ $a /*?*/,  /*?*/ ,  /*?*/ list  /*?*/ ( /*?*/ $b /*?*/ )
   /*?*/ )  /*?*/ = /*?*/ [ /*?*/ true /*?*/,
  /*?*/ "aa" /*?*/ => /*?*/ false /*?*/ ];

  for /*?*/ ( /*?*/ $i /*?*/ = /*?*/ 0 /*?*/;
  /*?*/ $i /*?*/ < /*?*/ 10 /*?*/; /*?*/ $i++ /*?*/ ) /*?*/ :
    /*?*/
  endfor /*?*/ ;

  do /*?*/ {
    /*?*/
  } /*?*/ while /*?*/ (/*?*/ false /*?*/) /*?*/;

  while /*?*/ (/*?*/ false /*?*/) /*?*/  :
    /*?*/
  endwhile /*?*/;

  foreach /*?*/ ($a /*?*/ as /*?*/ $i /*?*/ => /*?*/ $j /*?*/ ) /*?*/ :
    /*?*/
  endforeach /*?*/ ;

  switch /*?*/ (/*?*/ $a /*?*/) /*?*/ :
    /*?*/ case /*?*/ 1 /*?*/ :
    /*?*/ break /*?*/ ;
    /*?*/ default /*?*/;
  endswitch /*?*/ ; 
}
