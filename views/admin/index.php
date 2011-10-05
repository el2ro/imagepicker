<div id="imagepicker-box">
<div id="files_browser">
	<div id="files_left_pane">
		<h3><?php echo lang('file_folders.folders_label'); ?></h3>
		<ul id="files-nav">
		<?php foreach ($folders as $folder): ?>
		<?php if ( ! $folder->parent_id): ?>
			<li id="folder-id-<?php echo $folder->id; ?>" class="<?php echo $current_folder && $current_folder->id == $folder->id ? 'current' : ''; ?>">
				<?php $showAlignButtonsText = $showAlignButtons ? '1' : '0'; ?>
				<?php $showSizeSliderText = $showSizeSlider ? '1' : '0'; ?>
				<?php echo anchor("admin/imagepicker/index/{$folder->id}/{$showSizeSliderText}/{$showAlignButtonsText}", $folder->name, 'title="'.$folder->slug.'"'); ?>
			</li>
		<?php endif; ?>
		<?php endforeach; ?>
		</ul>
	</div>
	<div id="files_right_pane">
		<div id="files-wrapper">
		<?php if ($current_folder): ?>
			<h3><?php echo $current_folder->name; ?></h3>
			<!-- subfolders -->
			<div id="files_toolbar">
				<ul>
					<li>
						<label for="folder"><?php echo lang('file_folders.subfolders_label'); ?>:</label>
						<?php echo form_dropdown('parent_id', $subfolders, $current_folder->id, 'id="parent_id" title="image"'); ?>
					</li>
				</ul>
			</div>

			<?php if ($showAlignButtons): ?>
			<!-- image align -->
			<div id="radio-group">
				<label for="insert_float"><?php echo lang('imagepicker.label.float'); ?></label>
				<div class="set">
					<input id="radio_left" type="radio" name="insert_float" value="left" />
					<label for="radio_left"><?php echo lang('imagepicker.label.left'); ?></label>
					<input id="radio_right" type="radio" name="insert_float" value="right" />
					<label for="radio_right"><?php echo lang('imagepicker.label.right'); ?></label>
					<input id="radio_none" type="radio" name="insert_float" value="none" checked="checked" />
					<label for="radio_none"><?php echo lang('imagepicker.label.none'); ?></label>
				</div>
			</div>
			<?php endif; ?>

			<?php if ($showSizeSlider): ?>
			<!-- image size -->
			<div id="options-bar">
				<label for="insert_width"><?php echo lang('imagepicker.label.insert_width'); ?></label>
				<input id="insert_width" type="text" name="insert_width" value="200" />
			</div>
			<div id="slider"></div>
			<?php endif; ?>

			<!-- folder contents -->
			<?php  if ($current_folder->items): ?>
			<table class="table-list" border="0">
				<thead>
					<tr>
						<th><?php echo lang('files.type_i'); ?></th>
						<th><?php echo lang('files.name_label') . '/' . lang('files.description_label'); ?></th>
						<th><?php echo lang('files.filename_label') . '/' . lang('file_folders.created_label'); ?></th>
						<th><?php echo lang('imagepicker.meta.width'); ?></th>
						<th><?php echo lang('imagepicker.meta.height'); ?></th>
						<th><?php echo lang('imagepicker.meta.size'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($current_folder->items as $image): ?>
					<tr class="<?php echo alternator('', 'alt'); ?>">
						<td class="image">
							<div class="selectable">
								<img class="pyro-image" src="<?php echo base_url(); ?>files/thumb/<?php echo $image->id; ?>/50/50" alt="<?php echo $image->name; ?>" width="50"/>
								<span style="visibility: hidden; display: none;"><?php echo $image->id; ?></span>
							</div>
						</td>
						<td class="name-description">
							<p><?php echo $image->name; ?><p>
							<p><?php echo $image->description; ?></p>
						</td>
						<td class="filename">
							<p><?php echo $image->filename; ?></p>
							<p><?php echo format_date($image->date_added); ?></p>
						</td>
						<td class="meta width"><?php echo $image->width; ?></td>
						<td class="meta height"><?php echo $image->height; ?></td>
						<td class="meta size"><?php echo $image->filesize; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php else: ?>
			<p><?php echo lang('files.no_files'); ?></p>
			<?php endif; ?>
		<?php else: ?>
			<div class="blank-slate file-folders">
				<h2><?php echo lang('file_folders.no_folders');?></h2>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>
</div>
