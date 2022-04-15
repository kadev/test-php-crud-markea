<script type="text/javascript" src="<?php echo URL; ?>js/reservations.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>plugins/semantic-ui-calendar/calendar.js"></script>
<link rel="stylesheet" href="<?php echo URL; ?>plugins/semantic-ui-calendar/calendar.css" />

<div class="ui basic segment" style="margin: 3rem 0 0 4rem;">
    <div class="ui breadcrumb">
        <a href="<?php echo URL ?>" class="section" style="color: #0d2f77;">Home</a>
        <i class="right chevron icon divider"></i>
        <a href="<?php echo URL ?>reservations" class="section" style="color: #0d2f77;">Registrations</a>
        <i class="right arrow icon divider"></i>
        <div class="active section">Create new</div>
    </div>

    <h2 class="ui header">
        New Reservation
    </h2>

    <div class="ui grid">
        <div class="sixteen column wide">
	        <form id="form-create-reservation" class="ui form segment">
		        <div class="field">
			        <div class="two fields">
				        <div class="field">
					        <label>Name <span style="color:  orangered">*</span></label>
					        <input type="text" name="name-guest" placeholder="Fullname" required>
				        </div>
				        <div class="field">
					        <label>Phone <span style="color:  orangered">*</span></label>
					        <input type="text" name="phone" placeholder="Phone">
				        </div>
			        </div>
		        </div>
		        <div class="two fields">
			        <div class="field">
				        <label>Adults <span style="color:  orangered">*</span></label>
				        <select class="ui fluid dropdown" name="adults">
					        <?php for($i = 1; $i <= 10; $i++): ?>
					            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					        <?php endfor; ?>
				        </select>
			        </div>
			        <div class="field">
				        <label>Children <small> (Age 2 - 12)</small></label>
				        <select class="ui fluid dropdown" name="children">
                            <?php for($i = 0; $i <= 10; $i++): ?>
						        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
				        </select>			        </div>
		        </div>
		        <div class="field">
			        <label>Yacht <span style="color:  orangered">*</span></label>
			        <select class="ui fluid dropdown" name="yacht">
				        <option value="Aquila 44">Aquila 44</option>
				        <option value="Sea Ray 44.5">Sea Ray 44.5</option>
				        <option value="Leopard  45">Leopard  45</option>
				        <option value="Beneteau 46">Beneteau 46</option>
				        <option value="Azimut 48">Azimut 48</option>
				        <option value="Sunseeker Predator 60">Sunseeker Predator 60</option>
				        <option value="Azimut 68">Azimut 68</option>
				        <option value="Sunseeker Predator 82">Sunseeker Predator 82</option>
				        <option value="Azimut 100">Azimut 100</option>
				        <option value="Maiora 100">Maiora 100</option>
				        <option value="Azimut Fly 62">Azimut Fly 62</option>
				        <option value="UNIESSE 70">UNIESSE 70</option>
				        <option value="Azimut Fly">Azimut Fly</option>
				        <option value="Dyna Craft 2009">Dyna Craft 2009</option>
				        <option value="Boston Whaler 23">Boston Whaler 23</option>
			        </select>
		        </div>
		        <div class="two fields">
			        <div class="field">
				        <label>Time onboard <span style="color:  orangered">*</span></label>
				        <select class="ui fluid dropdown" name="time-onboard">
					        <option value="">Select one...</option>
					        <option value="6hrs">6hrs. - $2,020 USD5</option>
					        <option value="8hrs">8hrs. - $2,750 USD</option>
				        </select>
			        </div>
			        <div class="field">
				        <label>Date <span style="color:  orangered">*</span></label>
				        <div class="ui calendar" id="date-reservation">
					        <div class="ui input left icon">
						        <i class="calendar icon"></i>
						        <input name="date" type="text" placeholder="Date">
					        </div>
				        </div>
			        </div>
		        </div>

		        <div class="field" style="display: flow-root;">
			        <div id="add-reservation" class="ui button right floated" tabindex="0" style="background-color: #0d2f77; color: white;">Create</div>
		        </div>

		        <div class="ui error message"><ul class="list"><li>Enter the required fields (<span style="color: orangered">*</span>)</li></ul></div>
	        </form>
        </div>

    </div>
</div>

<div id="success-save-reservation" class="ui basic modal ">
	<div class="ui icon header">
		<i class="check icon"></i>
		Reservation created.
	</div>
	<div class="content" style="text-align: center;">
		<p>Reservation saved successfully. You want to create another or go to the "Reservations" section:</p>
	</div>
	<div class="actions">
		<a href="<?php echo URL; ?>reservations" class="ui basic cancel inverted button">
			<i class="remove icon"></i>
			Go to "Reservations"
		</a>
		<a href="<?php echo URL; ?>reservations/create" class="ui green ok inverted button">
			<i class="checkmark icon"></i>
			Create another
		</a>
	</div>
</div>