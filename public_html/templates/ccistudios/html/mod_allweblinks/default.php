<?php
  // no direct access
  defined('_JEXEC') or die('Restricted access');
  
  # Clear the content from other modules
  $cs=0;
  $trow=0;
  $Itemid=1;
  $mod_id = $module->id;
  $relpath = JURI::base(true);

  $days_new = $params->get('Ldaysnew', 3);
  $txt_new = $params->get('Ltxtnew', '*');
  $shownew = $params->get('Lshownew', 0);
  $showhits = $params->get('Lshowhits', 0);
  $shownumlnk = $params->get('Lshownumlnk', 1);
  $showheader = $params->get('Lshowheader', 1);
  $showcdes = $params->get('Lshowcdes', 0);
  $showldes = $params->get('Lshowldes', 0);
  $lengthoftitle = $params->get('Llengthoftitle', 23);
  $dotaddlenght = $params->get('Ldotaddlenght', 20);
  $titlepopup = $params->get('Ltitlepopuptxt', '');
  $lnkicon = $params->get('Licon', '');
  $moduleclass_sfx = $params->get('moduleclass_sfx', '');
  $dropdown = $params->get('Ldropdown', 1);
  $caticons = $params->get('Lcaticons', '');
  $caticonh = $params->get('Lcaticonh', '');
  if ($params->get('Lpopuplinks')==1) {$target="target='_blank'"; } else {$target="";};

  $today = getdate();
  $newitem1 = mktime(0, 0, 0, date("m"), date("d")-$days_new, date("Y"));
  $newitem = date("Y-m-d",$newitem1);

  # Put the output on screen
  /* head */

  $doc =& JFactory::getDocument(); 
  $doc->addStyleSheet($relpath.'/modules/mod_allweblinks/res/allweblinks.css'); /*always loads only once*/

  if ($dropdown) {
  $doc->addScript($relpath.'/modules/mod_allweblinks/res/dropdown.js'); /*always loads only once*/

  if (!defined('css_loaded')) { /* load only once when multiple instances of module*/
  $css_style = "      li.treeMenu_opened, li.treeMenu_closed { cursor: pointer; list-style-type: none; background-image: none !important; }\n"
        . "      li.treeMenu_opened ul { display: block; cursor: text; }\n"
        . "      li.treeMenu_closed ul { display: none; cursor: text; }";
  define('css_loaded', true);
  } 
    if ($caticons != "-1") { 
      if ($caticons == "") {
        $css_style .= "\n      #awl_dropdown".$mod_id." li.treeMenu_closed span.caticon { background: url('".$relpath."/modules/mod_allweblinks/res/plus.png') no-repeat center !important; margin-left: -24px; padding: 2px 12px; }";
      } else {
        $iconsize = getimagesize("images/M_images/".$caticons); $icon_p = ($iconsize[0] / 2) + 4; $icon_m = -1 * ($icon_p * 2);
        $css_style .= "\n      #awl_dropdown".$mod_id." li.treeMenu_closed span.caticon { background: url('".$relpath."/images/M_images/".$caticons."') no-repeat center !important; margin-left:".$icon_m."px; padding: 2px ".$icon_p."px;}";
      }
    }
    if ($caticonh != "-1") { 
      if ($caticonh == "") {
        $css_style .= "\n      #awl_dropdown".$mod_id." li.treeMenu_opened span.caticon { background: url('".$relpath."/modules/mod_allweblinks/res/minus.png') no-repeat center !important; margin-left: -24px; padding: 2px 12px; }";
      } else { 
        $iconsize = getimagesize("images/M_images/".$caticonh); $icon_p = ($iconsize[0] / 2) + 4; $icon_m = -1 * ($icon_p * 2);
        $css_style .= "\n      #awl_dropdown".$mod_id." li.treeMenu_opened span.caticon { background: url('".$relpath."/images/M_images/".$caticonh."') no-repeat center !important; margin-left:".$icon_m."px; padding: 2px ".$icon_p."px;}";
      }
    }
  $doc->addStyleDeclaration( $css_style );
  }


  /* body */
  //$content = "<ul id=\"awl_dropdown".$mod_id."\" class=\"awl".$moduleclass_sfx."\">";
  $content = "<ul>";

  foreach ($list as $row) {
	if ("$titlepopup" != "") {
    	$title="title=\"".htmlspecialchars($titlepopup)."\"";
	} else {
		if ("$row->description"=="") {
			$title="title=\"".htmlspecialchars($row->title)."\"";
		} else {
			$title="title=\"".htmlspecialchars($row->description)."\"";
		}
	}

	if(strlen($row->title) > $lengthoftitle) {
		$row->title = substr($row->title,0,$dotaddlenght);
		$row->title .= "...";
	}
  	$title = "";
  
	$Corder = $row->catid;
	if ($Corder != $cs ) { # new category
    	if (("$cs" != "0")) {
			$content .= "</ul></li>\n"; #end of each category
			$trow=0;
		}

		/* insert category title */
		$content .= "\n<li class=\"cats\">";
		if ($dropdown)
			$content .= "<span class=\"caticon\">&nbsp;</span>";
			
		if ($showheader)
			$content .= "<span class=\"cat_title".$moduleclass_sfx."\">".htmlspecialchars($row->ctitle)."</span>";
			
		/* get & show number of links in each category */
		$numlnk=0;
		foreach ($list as $lnk) {
			if ("$lnk->catid"=="$row->catid") $numlnk += 1;
    	}
    
		if ($shownumlnk) $content .= "&nbsp;<span class=\"numlnk".$moduleclass_sfx."\">(".$numlnk.")</span>";
    	/* show category description */
    	if ($showcdes) { //ugly workaround for line breakes that are inserted by editors in the Category descriptions (done for: Tiny, FCK and none)
			if ("$row->cdes"!="" && "$row->cdes"!="<br />" && "$row->cdes"!="<br>" && "$row->cdes"!="<p><br></p>" && "$row->cdes"!="<p>&#160;</p>" && "$row->cdes"!="<div>&#160;</div>")
      			$content .= "<br /><span class=\"cdes".$moduleclass_sfx."\">".$row->cdes."</span>";
			}
	
			/*List start for links*/
			$content .="\n<ul class=\"\">\n";
			$cs = $row->catid;
  		}
    	$trow+=1;

    	/* start link list, insert link and icon */
    	$URL=JRoute::_("index.php?option=com_weblinks&view=weblink&catid=".$row->catslug."&id=".$row->slug);

    	if ($lnkicon == "-1") {
      		$content .= "<li><a class=\"link\" ".$target." ".$title." href=\"".$URL."\">".$row->title."</a>";
    	} else {
      		$content .= "<li><a class=\"link\" style=\"background: url('".$relpath."/images/M_images/".$lnkicon."') no-repeat; padding: 0 0 5px 25px;\" ".$target." ".$title." href=\"".$URL."\">".$row->title."</a>";
	    }
    
    	/* show hits */
    	if ($showhits) $content .= "&nbsp;<span class=\"hits".$moduleclass_sfx."\">(".$row->hits.")</span>";
    	/* Check & show if links is new */
    	$rdate = $row->cdate;
    	$tstNew = $rdate > $newitem ;
    	if ( $tstNew ) { $new = "&nbsp;<span class=\"new".$moduleclass_sfx."\">$txt_new</span>"; } else { $new=""; }
    	if ($shownew) $content .= "$new";
    	/* show link description */
    	if ($showldes) {
      		if ("$row->description"!="") $content .= "<br /><span class=\"ldes".$moduleclass_sfx."\">".htmlspecialchars($row->description)."</span>";
	    }

    	$content .= "</li>\n";
  	}
  	$content .= "</ul></li>\n</ul>\n";

  	if ($dropdown) {
    	$content .= "<script type=\"text/javascript\">\n<!--\n  treeMenu_init(document.getElementById(\"awl_dropdown".$mod_id."\"), '');\n  (typeof excludeModules!='undefined') ? excludeModules += \",".$mod_id."\" : '';\n-->\n</script>";
  }
?>

