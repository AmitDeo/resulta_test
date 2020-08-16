<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Resulta_Test
 * @subpackage Resulta_Test/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="nflTeamList">
<h2><?php _e('NFL Teams', $this->resulta_test ); ?></h2>

<div class="teamList">
	<?php if(!empty($teams)): ?>
		<?php 
			//Do not show filter if shortcode filter is applied.
			if($conference == false || $division == false): 
		?>
			<div class="filterBy">
				<div class="filterByTitle"><?php _e('Filter By: ', $this->resulta_test ); ?></div>
				<?php if(!empty($conferences) && $conference == false): ?>
					<div class="filterByConference">
						<select id="filterKeyConference">
							<option value="">--<?php _e('Conference', $this->resulta_test ); ?>--</option>
							<?php foreach($conferences as $conference): ?>
								<option value="<?php echo $conference; ?>"><?php echo $conference; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				<?php endif; ?>

				<?php if(!empty($divisions) && $division == false): ?>
					<div class="filterByDivision">
						<select id="filterKeyDivision">
							<option value="">--<?php _e('Division', $this->resulta_test ); ?>--</option>
							<?php foreach($divisions as $division): ?>
								<option value="<?php echo $division; ?>"><?php echo $division; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<table id="tblTeamList">
			<thead>
				<tr>
					<th><?php _e('ID', $this->resulta_test ); ?></th>
					<th><?php _e('Name', $this->resulta_test ); ?></th>
					<th><?php _e('Nickname', $this->resulta_test ); ?></th>
					<th><?php _e('Display Name', $this->resulta_test ); ?></th>
					<th><?php _e('Conference', $this->resulta_test ); ?></th>
					<th><?php _e('Division', $this->resulta_test ); ?></th>
				</tr>
			</thead>
			<tfoot>
			    <tr>
					<th><?php _e('ID', $this->resulta_test ); ?></th>
					<th><?php _e('Name', $this->resulta_test ); ?></th>
					<th><?php _e('Nickname', $this->resulta_test ); ?></th>
					<th><?php _e('Display Name', $this->resulta_test ); ?></th>
					<th><?php _e('Conference', $this->resulta_test ); ?></th>
					<th><?php _e('Division', $this->resulta_test ); ?></th>
				</tr>
			    <tr>
			      <td colspan="6">
			        <div class="tblPager">
			          <nav class="right">
			            <span class="prev">
			 				<?php _e('Prev', $this->resulta_test ); ?>&nbsp;
			            </span>
			            <span class="pagecount"></span>
			            &nbsp;<span class="next"><?php _e('Next', $this->resulta_test ); ?></span>
			          </nav>
			        </div>
			      </td>
			    </tr>
			  </tfoot>
			<?php foreach($teams as $team): ?>
				<tr>
					<td><?php echo $team->id; ?></td>
					<td><?php echo $team->name; ?></td>
					<td><?php echo $team->nickname; ?></td>
					<td><?php echo $team->display_name; ?></td>
					<td><?php echo $team->conference; ?></td>
					<td><?php echo $team->division; ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php else: ?>
		<h4><?php _e('Sorry! No team exists now. Check back later!', $this->resulta_test ); ?></h4>
	<?php endif; ?>
</div>

