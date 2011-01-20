<?php
/*
Plugin Name: Poker Rakeback Calculator Widget
Description: If you are running an online poker room and are looking to give your players the incentive of the rakeback option, you would require the help of the rakeback calculator in order to be able to get a good idea as to how much rakeback would be given to each player.
Version: 0.1
Author: maldinii
Author URI: mailto:maldinii@gmail.com
License: GPLv2
*/


class RakebackCalculatorWidget extends WP_Widget {
	
	var $arColors;
	
	function add_plugin_links($links, $file) {		
		if ( $file == plugin_basename(__FILE__) ) {
			$links[] = '<a href="http://donate">' . __('Donate') . '</a>';
		}
		return $links;
	}
	
     function RakebackCalculatorWidget() {
     	$this->arColors = array(
     								'White'	=>'FFFFFF',
     								'Red'	=>'FF0000',
     								'Green' => '00FF00',
     								'Blue' => '0000FF',
     	);
       	add_filter('plugin_row_meta', array(&$this, 'add_plugin_links'), 10, 2);
		$widget_ops = array('classname' => 'RakebackCalculatorWidget', 'description' => 'A simple rakeback calc, for a custom one contact maldinii@gmail.com');
		$control_ops = array('width' => 200, 'height' => 350);
		$this->WP_Widget('RakebackCalculatorWidget', 'Poker Rakeback Calculator', $widget_ops, $control_ops);
     }

     function widget($args, $instance) {
     	extract($args);
     	
		echo $before_widget;
		echo $before_title;
		echo 'Rakeback Calculator';
		echo $after_title;
		
		$content = '
		<form name="CalculatorForm" action="#" id="calcForm">
	
    <table border="0">
		<tr>
			<td><label>Game Type:</label></td>
			<td>

				<select class="select-site" name="select">
                <optgroup label="NL Full Table">
                </optgroup>
                <option value="0.17">$10 / $20</option>
                <option value="0.152">$5 / $10</option>
                <option value="0.127">$3 / $6</option>

                <option value="0.1">$2 / $4</option>

                <option value="0.076">$1 / $2</option>
                <option value="0.046">$0.50 / $1.00</option>
                <option value="0.035">$0.25 / $0.50</option>
                <option value="0.0256">$0.10 / $0.25</option>


                <optgroup label="NL Short Handed">
                </optgroup>

                <option value="0.23">$10 / $20</option>
                <option value="0.21">$5 / $10</option>
                <option value="0.178">$3 / $6</option>
                <option value="0.15">$2 / $4</option>
                <option value="0.11">$1 / $2</option>

                <option value="0.069">$0.50 / $1.00</option>

                <option value="0.055">$0.25 / $0.50</option>
                <option value="0.038">$0.10 / $0.25</option>


                <optgroup label="Limit Full Table">
                </optgroup>
                <option value="0.23">$100 / $200</option>

                <option value="0.212">$50 / $100</option>

                <option value="0.186">$30 / $60</option>
                <option value="0.164">$15 / $30</option>
                <option value="0.152">$10 / $20</option>
                <option value="0.133">$5 / $10</option>
                <option value="0.094">$3 / $6</option>

                <option value="0.07">$2 / $4</option>

                <option value="0.045">$1 / $2</option>
                <option value="0.027">$0.50 / $1.00</option>


                <optgroup label="Limit Short Handed">
                </optgroup>
                <option value="0.29">$100 / $200</option>

                <option value="0.276">$50 / $100</option>

                <option value="0.25">$30 / $60</option>
                <option value="0.23">$15 / $30</option>
                <option value="0.22">$10 / $20</option>
                <option value="0.18">$5 / $10</option>
                <option value="0.13">$3 / $6</option>

                <option value="0.1">$2 / $4</option>

                <option value="0.07">$1 / $2</option>
                <option value="0.045">$0.50 / $1.00</option>
				</select>
				</td>
			<tr>
	
            <tr>
				<td><label>Tables:</label></td>

				<td>
				<select class="select-site" name="tables">

                <option value="1">1 table</option>
                <option value="2">2 tables</option>
                <option value="3">3 tables</option>
                <option value="4">4 tables</option>
                <option value="5">5 tables</option>
                <option value="6">6 tables</option>
                <option value="7">7 tables</option>
                <option value="8">8 tables</option>
                <option value="9">9 tables</option>
                <option value="10">10 tables</option>
                <option value="11">11 tables</option>
                <option value="12">12 tables</option>
                <option value="13">13 tables</option>
                <option value="14">14 tables</option>
                <option value="15">15 tables</option>
                <option value="16">16 tables</option>
                <option value="17">17 tables</option>
                <option value="18">18 tables</option>
                <option value="19">19 tables</option>
                <option value="20">20 tables</option>

				</select>
				</td>
			</tr>
            <tr>
				<td><label>Hours</label></td>
				<td>
				<select class="select-site" name="hours">
                <option value="1">1 hour</option>

                <option value="2">2 hours</option>
                <option value="3">3 hours</option>

                <option value="4">4 hours</option>
                <option value="5">5 hours</option>
                <option value="6">6 hours</option>
                <option value="7">7 hours</option>

                <option value="8">8 hours</option>
                <option value="9">9 hours</option>

                <option value="10">10 hours</option>
                <option value="11">11 hours</option>
                <option value="12">12 hours</option>
				</select>

				</td>
			</tr>
            <tr>
				<td><label>Rakeback:</label></td>
				<td>
				<select class="select-site" name="percent">

                <option value="25">25%</option>

                <option value="26">26%</option>
                <option value="27">27%</option>
                <option value="28">28%</option>
                <option value="29">29%</option>
                <option value="30">30%</option>

                <option value="31">31%</option>

                <option value="32">32%</option>
                <option value="33">33%</option>
                <option value="34">34%</option>
                <option value="35">35%</option>
                <option value="36">36%</option>

                <option value="37">37%</option>

                <option value="38">38%</option>
                <option value="39">39%</option>
                <option value="40">40%</option>
                <option value="41">41%</option>
                <option value="42">42%</option>

                <option value="43">43%</option>

                <option value="44">44%</option>
                <option value="45">45%</option>
                <option value="46">46%</option>
                <option value="47">47%</option>
                <option value="48">48%</option>

                <option value="49">49%</option>

                <option value="50">50%</option>

                </select>
				</td>
				</tr>
				</table>
			<input class="button" value="Calculate" type="submit">
	</form>
	<div id="result">
		<div id="day"></div>
		<div id="week"></div>
	    <div id="month"></div>
  	</div>
	<div >
		<script>
		var df;
		window.onload=function(){
			df=document.getElementById(\'calcForm\');
			df.onsubmit=function() {return calculations();}
		}
		function calculations() {
			gt=parseFloat(df[0].value);
			tb=parseFloat(df[1].value);
			hr=parseFloat(df[2].value);
			rb=parseFloat(df[3].value);
			nm=gt*tb*hr*rb;
			dt=Math.round(nm);
			wt=Math.round(7*nm);
			mt=Math.round(30*nm);
			document.getElementById(\'day\').innerHTML=\'Daily rakeback: <span style="color:#'.$instance['selected_color'].';">$\'+ dt+\'<\/span>\';
			document.getElementById(\'week\').innerHTML=\'Weekly rakeback: <span style="color:#'.$instance['selected_color'].';">$\'+ wt+\'<\/span>\';
			document.getElementById(\'month\').innerHTML=\'Monthly rakeback: <span style="color:#'.$instance['selected_color'].';">$\'+ mt+\'<\/span>\';
			
			document.getElementById(\'result\').style.display = \'block\';
			
			return false;
			}
		</script>
	</div>';
	if($instance['show_link'] == 'checked')
	$content .= '<div><a href="http://rakebackcalculator.biz" target="_blank">Rakeback Calculator</a></div>';
		echo $content;	
		echo $after_widget; 
     }

     function update($new_instance, $old_instance) {
       $instance = $old_instance;
		$instance['show_link'] = $new_instance['show_link'];
		$instance['selected_color'] = $new_instance['selected_color'];
		
		return $instance;
     }

     function form($instance) {
       	$instance = wp_parse_args( (array) $instance, array( 'show_link' => '', 'selected_color'=> '') );
		$show_link = strip_tags($instance['show_link']);
		$selected_color = strip_tags($instance['selected_color']);
?>
		<p><label for="<?php echo $this->get_field_id('show_link'); ?>">Show link?</label>
		<input 	type="checkbox"
				id="<?php echo $this->get_field_id('show_link'); ?>" 
				name="<?php echo $this->get_field_name('show_link'); ?>" 
				<?=$show_link=='checked'?'checked="chesked"':''?> 
				value="checked" /></p>
		
		<p><label >Select color:</label>
		<select 	type="select"
				id="<?php echo $this->get_field_id('selected_color'); ?>" 
				name="<?php echo $this->get_field_name('selected_color'); ?>">
				 <option value="" >-</option>
				<?foreach($this->arColors as $colorKey => $colorValue):?>
				 <option value="<?=$colorValue?>"
				 <?=$selected_color==$colorValue?'selected="selected"':''?> >
				 <?=$colorKey?>
				 </option>
				<?endforeach;?>
		</select>
		</p>
		
<?php
     }
}

function rc_widgets_init() {
	if ( !is_blog_installed() )
		return;

	register_widget('RakebackCalculatorWidget');	
	do_action('widgets_init');
}

add_action('init', 'rc_widgets_init', 1);

?>