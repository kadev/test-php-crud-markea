<script type="text/javascript" src="<?php echo URL; ?>js/reservations.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>plugins/semantic-ui-calendar/calendar.js"></script>
<link rel="stylesheet" href="<?php echo URL; ?>plugins/semantic-ui-calendar/calendar.css" />

<div class="ui basic segment" style="margin: 3rem 0 0 4rem;">
    <div class="ui breadcrumb">
        <a href="<?php echo URL ?>reservations" class="section" style="color: #0d2f77;">Home</a>
        <i class="right chevron icon divider"></i>
        <a href="<?php echo URL ?>reservations" class="section" style="color: #0d2f77;">Registrations</a>
        <i class="right arrow icon divider"></i>
        <div class="active section">Edit #1</div>
    </div>

    <h2 class="ui header">
        Edit Reservation
    </h2>

    <div class="ui grid">
        <div class="sixteen column wide">
	        <form id="form-edit-reservation" class="ui form segment">
		        <div class="field">
			        <div class="two fields">
				        <div class="field">
					        <label>Name <span style="color:  orangered">*</span></label>
					        <input type="text" name="name-guest" placeholder="Fullname" required value="<?php echo $reservation->name; ?>">
				        </div>
				        <div class="field">
					        <label>Phone <span style="color:  orangered">*</span></label>
					        <input type="text" name="phone" placeholder="Phone" value="<?php echo $reservation->phone; ?>">
				        </div>
			        </div>
		        </div>
		        <div class="two fields">
			        <div class="field">
				        <label>Adults <span style="color:  orangered">*</span></label>
				        <select class="ui fluid dropdown" name="adults">
                            <?php for($i = 1; $i <= 10; $i++): ?>
						        <option value="<?php echo $i; ?>" <?php echo ($reservation->adults == $i) ? 'selected':''; ?>><?php echo $i; ?></option>
                            <?php endfor; ?>
				        </select>
			        </div>
			        <div class="field">
				        <label>Children <small> (Age 2 - 12)</small></label>
				        <select class="ui fluid dropdown" name="children">
                            <?php for($i = 0; $i <= 10; $i++): ?>
						        <option value="<?php echo $i; ?>" <?php echo ($reservation->children == $i) ? 'selected':''; ?>><?php echo $i; ?></option>
                            <?php endfor; ?>
				        </select>			        </div>
		        </div>
		        <div class="field">
			        <label>Yacht <span style="color:  orangered">*</span></label>
			        <select class="ui fluid dropdown" name="yacht">
				        <option value="Aquila 44" <?php echo ($reservation->yacht == 'Aquila 44') ? 'selected':''; ?>>Aquila 44</option>
				        <option value="Sea Ray 44.5" <?php echo ($reservation->yacht == 'Sea Ray 44.5') ? 'selected':''; ?>>Sea Ray 44.5</option>
				        <option value="Leopard  45" <?php echo ($reservation->yacht == 'Leopard  45') ? 'selected':''; ?>>Leopard  45</option>
				        <option value="Beneteau 46" <?php echo ($reservation->yacht == 'Beneteau 46') ? 'selected':''; ?>>Beneteau 46</option>
				        <option value="Azimut 48" <?php echo ($reservation->yacht == 'Azimut 48') ? 'selected':''; ?>>Azimut 48</option>
				        <option value="Sunseeker Predator 60" <?php echo ($reservation->yacht == 'Sunseeker Predator 60') ? 'selected':''; ?>>Sunseeker Predator 60</option>
				        <option value="Azimut 68" <?php echo ($reservation->yacht == 'Azimut 68') ? 'selected':''; ?>>Azimut 68</option>
				        <option value="Sunseeker Predator 82" <?php echo ($reservation->yacht == 'Sunseeker Predator 82') ? 'selected':''; ?>>Sunseeker Predator 82</option>
				        <option value="Azimut 100" <?php echo ($reservation->yacht == 'Azimut 100') ? 'selected':''; ?>>Azimut 100</option>
				        <option value="Maiora 100" <?php echo ($reservation->yacht == 'Maiora 100') ? 'selected':''; ?>>Maiora 100</option>
				        <option value="Azimut Fly 62" <?php echo ($reservation->yacht == 'Azimut Fly 62') ? 'selected':''; ?>>Azimut Fly 62</option>
				        <option value="UNIESSE 70" <?php echo ($reservation->yacht == 'UNIESSE 70') ? 'selected':''; ?>>UNIESSE 70</option>
				        <option value="Azimut Fly" <?php echo ($reservation->yacht == 'Azimut Fly') ? 'selected':''; ?>>Azimut Fly</option>
				        <option value="Dyna Craft 2009" <?php echo ($reservation->yacht == 'Dyna Craft 2009') ? 'selected':''; ?>>Dyna Craft 2009</option>
				        <option value="Boston Whaler 23" <?php echo ($reservation->yacht == 'Boston Whaler 23') ? 'selected':''; ?>>Boston Whaler 23</option>
			        </select>
		        </div>
		        <div class="two fields">
			        <div class="field">
				        <label>Time onboard <span style="color:  orangered">*</span></label>
				        <select class="ui fluid dropdown" name="time-onboard">
					        <option value="" <?php echo ($reservation->time_onboard == '') ? 'selected':''; ?>>Select one...</option>
					        <option value="6hrs" <?php echo ($reservation->time_onboard == '6hrs') ? 'selected':''; ?>>6hrs. - $2,020 USD5</option>
					        <option value="8hrs" <?php echo ($reservation->time_onboard == '8hrs') ? 'selected':''; ?>>8hrs. - $2,750 USD</option>
				        </select>
			        </div>
			        <div class="field">
				        <label>Date <span style="color:  orangered">*</span></label>
				        <div class="ui calendar" id="date-reservation">
					        <div class="ui input left icon">
						        <i class="calendar icon"></i>
						        <input name="date" type="text" placeholder="Date" value="<?php echo $reservation->date; ?>">
					        </div>
				        </div>
			        </div>
		        </div>

		        <div class="field" style="display: flow-root;">
			        <div id="update-reservation" data-reservation="<?php echo $reservation->id; ?>" class="ui button right floated" tabindex="0" style="background-color: #0d2f77; color: white;">Update</div>
		        </div>

		        <div class="ui error message"><ul class="list"><li>Enter the required fields (<span style="color: orangered">*</span>)</li></ul></div>
	        </form>
        </div>

    </div>
</div>

<div id="success-update-reservation" class="ui basic modal ">
	<div class="ui icon header">
		<i class="check icon"></i>
		Reservation updated.
	</div>
	<div class="content" style="text-align: center;">
		<p>Reservation updated successfully. You want to continue editing or go to the "Reservations" section:</p>
	</div>
	<div class="actions">
		<a href="<?php echo URL; ?>reservations/edit/<?php echo $reservation->id;?>" class="ui basic cancel inverted button">
			<i class="remove icon"></i>
			Continue editing
		</a>
		<a href="<?php echo URL; ?>reservations" class="ui green ok inverted button">
			<i class="checkmark icon"></i>
			Go to "Reservations"
		</a>
	</div>
</div>