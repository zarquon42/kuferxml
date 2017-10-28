<?php
/*
Plugin Name: Kufer XML Parser
Plugin URI: http://ifak-bochum.de
Description: Ein Plugin zur Aufbereitung des XML Exports von KuferSQL.
Version: 0.1
Author: Rafael Häusler
Author URI: http://seinplanet.de
*/

add_action('wp_print_styles', 'add_my_styles', 100);
function add_my_styles() {
	wp_register_style( 'eigenes-css', 'http://www.yourdomain.de/wp-content/plugins/kufer/styles.css');
	wp_enqueue_style( 'eigenes-css' );
}
add_action('init', 'add_my_styles');

function kuferxml(){
    $kurse = simplexml_load_file('/path/to/your/wordpress/installation/wp-content/plugins/kufer/ifak.xml');
	$result .= '<h3>Fachbereiche</h3><ul class="kufer-fachbereichsliste">';
    foreach ($kurse as $kurs):
    	$knr=(string) $kurs->knr;
	    $fachb=(string) $kurs->fachb;
        $fachbtext=(string) $kurs->fachbtext;
        $fachbereiche[$fachb] = $fachbtext;
    endforeach;
	foreach ($fachbereiche as $fbkey => $fbvalue) {
		if($_GET['fb'] == $fbkey) {
			$fbselected = 'class="fbselected"';
		}	
		else {
			unset($fbselected);
		}
		$result .= '<li '.$fbselected.'><a href="?fb='.$fbkey.'">'.$fbvalue.'</a></li>';		
	}
	$result .= '</ul><br style="clear:both"><hr>';    
	if($_GET['knr']) {
		foreach ($kurse as $kurs):
		    $knr=$kurs->knr;
		    $fachb=$kurs->fachb;
		    $titel=$kurs->haupttitel;
		    $inhalt=$kurs->inhalt;
			$mitarbeiter_planend=$kurs->mitarbeiter_planend;
		    $ort=$kurs->ort;
		    $ortaussenstelle=$kurs->ortaussenstelle;
		    $ortraumname=$kurs->ortraumname;
		    $ortgebaeude=$kurs->ortgebaeude;
		    $ortstr=$kurs->ortstr;
		    $ortplz=$kurs->ortplz;
		    $ortname=$kurs->ortname;
		    $fachbtext=$kurs->fachbtext;
		    $beginndat=$kurs->beginndat;
		    $endedat=$kurs->endedat;
		    $beginnuhr=$kurs->beginnuhr;
		    $endeuhr=$kurs->endeuhr;
		    $dauer=$kurs->dauer;
		    $termine=$kurs->termine->termin;
		    $dozenten=$kurs->dozenten->dozent;
		    $tnmax=$kurs->tnmax;
		    $tnmin=$kurs->tnmin;
		    $tnanmeldungen=$kurs->tnanmeldungen;		        
		    $full=$tnmax-$tnanmeldungen;
	        if($_GET['knr'] == $knr) {
			    $result .= '<h3>'.$titel.'</h3>';
			    $result .= '<div class="block">';
			    $result .= '<table class="kursdetails" border="0">';
			    $result .= '<tr>';
			    $result .= '<td>Kursnummer</td><td>'.$knr.'</td>';
			    $result .= '</tr><tr>';
			    $result .= '<td>Zeitraum</td><td>'.$beginndat.' - '.$endedat.'</td>';
			    $result .= '</tr><tr>';
			    $result .= '<td>Uhrzeit</td><td>'.$beginnuhr.' - '.$endeuhr.' Uhr</td>';
			    $result .= '</tr><tr>';
			    $result .= '<td>Dauer</td><td>'.$dauer.' x</td>';
			    $result .= '</tr><tr>';
			    $result .= '<td>Kursort</td><td>'.$ortgebaeude.'<br>'.$ortstr.', '.$ortplz.' '.$ortname.'</td>';
			    $result .= '</tr>';
			    $result .= '</table>';			    
			    $result .= '<div class="kufer-row kw-table-header"><div class="column">Datum</div><div class="column">Uhrzeit</div></div>';
			    $result .= '<div class="kursterminliste">';
			    foreach ($termine as $termin):
			    	$tag=$termin->tag;
			    	$zeitvon=$termin->zeitvon;
			    	$zeitbis=$termin->zeitbis;
			    	$termin_ortraumname=$termin->termin_ortraumname;
			    	$termin_ortgebaeude=$termin->termin_ortgebaeude;
			    	$termin_ortstr=$termin->termin_ortstr;
			    	$termin_ortplz=$termin->termin_ortplz;
			    	$termin_ortname=$termin->termin_ortname;
			    	$result .= '<div class="kufer-row kw-table-row">';
			    	$result .= '<div class="column kw-table-data">'.$tag.'</div>';
			    	$result .= '<div class="column kw-table-data">'.$zeitvon.' - '.$zeitbis.' Uhr</div>';
			    	$result .= '</div>';
			    endforeach;
			    $result .= '</div>';			    
			    $result .= '</div>';
			    $result .= '<div class="block">';
			    $result .= $inhalt;
			    $result .= '</div>';
			    if($full<3) $ampel = '<div class="block"><br><br>Es sind nur noch wenige Plätze frei!</div>';
		        if($full<1) $ampel = '<div class="block"><br><br>Dieser Kurs ist leider bereits ausgebucht.</div>';
		        $result .= $ampel;
			    if($mitarbeiter_planend=="BN") $result .= '<div class="block"><br><br>Bei Interesse an diesem Kurs senden Sie uns eine Nachricht an <a href="mailto:bildungswerk@ifak-bochum.de?subject=Interesse an Kurs: '.$titel.' ('.$knr.')">bildungswerk@ifak-bochum.de</a> oder rufen Sie uns unter 0234 - 962 10 22 an.</div>';
			    if($mitarbeiter_planend=="IK") $result .= '<div class="block"><br><br>Bei Interesse an diesem Kurs senden Sie uns eine Nachricht an <a href="mailto:integrationskurse@ifak-bochum.de?subject=Interesse an Kurs: '.$titel.' ('.$knr.')">integrationskurse@ifak-bochum.de</a> oder rufen Sie uns unter 0234 - 92 33 62 39 an.</div>';
			    $result .= '<br style="clear:both">';
	        }	        	        
		endforeach;				
	}
	else {
	    if($_GET['fb']) $result .= '<h3>Kurse</h3><ul class="kufer-kursliste">';
	    foreach ($kurse as $kurs):
	    	$fachb=(string) $kurs->fachb;
	    	if($_GET['fb'] == $fachb) {
		        $knr=$kurs->knr;
		        $fachb=(string) $kurs->fachb;
		        $titel=$kurs->haupttitel;
		        $inhalt=$kurs->inhalt;
				$ortaussenstelle=$kurs->ortaussenstelle;
			    $ortstr=$kurs->ortstr;
			    $ortplz=$kurs->ortplz;
			    $ortname=$kurs->ortname;
		        $fachbtext=$kurs->fachbtext;
		        $beginndat=$kurs->beginndat;
		        $endedat=$kurs->endedat;
		        $beginnuhr=$kurs->beginnuhr;
		        $endeuhr=$kurs->endeuhr;
		        $dauer=$kurs->dauer;
		        $tnmax=$kurs->tnmax;
		        $tnmin=$kurs->tnmin;
		        $tnanmeldungen=$kurs->tnanmeldungen;		        
		        $full=$tnmax-$tnanmeldungen;
		        $fachbereiche[] = $fachbtext;
		        $ampel='<div class="kufer-green">&nbsp;</div>';
		        if($full<3) $ampel='<div class="kufer-yellow">&nbsp;</div>';
		        if($full<1) $ampel='<div class="kufer-red">&nbsp;</div>';
		        $result .= '<li><div style="float: left;width: 400px;"><a href="?knr='.$knr.'&fb='.$fachb.'">'.substr($knr, 3,4).' '.$titel.'</a></div><div style="float: left;width: 200px;">'.$beginndat.' - '.$endedat.'</div><div style="float: left;width: 150px;">'.$dauer.' Termine</div><div style="float: left;width: 370px;">'.$ortstr.', '.$ortplz.' '.$ortname.'</div>'.$ampel.'<div style="clear:left"> </div></li>';		    	
	    	}
	    endforeach;
	}
	return $result;
}
add_shortcode('kufer','kuferxml');
?>