
<div class="item-list-custom">
	<ul>
		<hr/>
		<?php foreach ($nodes[0] as $item): ?>
				<li>
				
					<?php
						
						//We are going to build the custom date format
						$result = "";
						
						//Day
						if (!empty($item->field_ephemeris_day_took_place)) {
							$date=date_create($item->field_ephemeris_year_took_place . "-" . $item->field_ephemeris_month_took_place . "-" . $item->field_ephemeris_day_took_place);
							$datep = date_timestamp_get($date);
							$result = ucfirst(format_date($datep, 'custom', 'l'));
							$result = $result . " " . format_date($datep, 'custom', 'j');
						}
						
						//Month
						if ($item->field_ephemeris_month_took_place != 0) {
							
							//If the first character of the month is a vowel...
							$month_name = format_date(mktime(0, 0, 0, date('n'), 1), 'custom', 'F');
							if (preg_match('/^[aeiou]/i', $month_name)){
										if (empty($result)) {
											$month_name = "L'" . $month_name;
										} else {
											$month_name = "d'" . $month_name;
										}
							} else {
										if (empty($result)) {
											$month_name = "El " . $month_name;
										} else {
											$month_name = "de " . $month_name;
										}
							}
							$result = $result . " " . $month_name;
							
						}
						
						//Year
						if ($item->field_ephemeris_month_took_place == 0) {
							$result = "El " . $item->field_ephemeris_year_took_place;
						} else {
							$result = $result . " de " . $item->field_ephemeris_year_took_place;
						}

						print $result;
						
					?>
				
					<br/>
					<?php
						$url = url('node/' . $item->nid, array('absolute' => TRUE));
						print l($item->title, $url);
					?>
					
					
					<hr/>
				</li>
		<?php endforeach; ?>
	</ul>
</div>
