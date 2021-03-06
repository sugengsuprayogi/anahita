<?php defined('KOOWA') or die; ?>

<h3><?= @text('COM-ACTORS-PROFILE-EDIT-PROFILE-INFORMATION') ?></h3>

<form action="<?= @route($item->getURL()) ?>" method="post" autocomplete="off">
	<div class="control-group">
		<label class="control-label" class="control-label" for="actor-name">
			<?= @text('COM-ACTORS-NAME') ?>
		</label>
		<div class="controls">
			<input type="text" class="input-block-level" id="actor-name" size="50" maxlength="100" name="name" value="<?=$item->name?>" required />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="actor-body">
			<?= @text('COM-ACTORS-BODY') ?>
		</label>
		<div class="controls">
			<textarea class="input-block-level" id="actor-body" name="body" rows="5" cols="5"><?= $item->body?></textarea>
		</div>
	</div>

    <div class="control-group">
        <label class="control-label" for="gender">
            <?= @text('COM-ACTORS-PROFILE-GENDER') ?>
        </label>
        <div class="controls">
            <?php
            $genderOptions = array(
                '' => @text('COM-ACTORS-GENDER-UNDEFINED'),
                'male' => @text('COM-ACTORS-GENDER-MALE'),
                'female' => @text('COM-ACTORS-GENDER-FEMALE'),
                'transgender' => @text('COM-ACTORS-GENDER-TRANSGENDER'),
                'other' => @text('COM-ACTORS-GENDER-OTHER'), );
            ?>
            <?= @html('select', 'gender', array('options' => $genderOptions, 'selected' => $item->gender))->class('input-block-level') ?>
        </div>
    </div>

    <?php if ($item->authorize('changeUserType')): ?>
    <div class="control-group">
        <label class="control-label" for="person-group">
            <?= @text('COM-PEOPLE-USERTYPE'); ?>
        </label>
        <div class="controls">
            <?= @helper('usertypes', array('selected' => $item->userType)) ?>
        </div>
    </div>
    <?php endif; ?>

	<?php foreach ($profile as $header => $fields)  : ?>
	<fieldset>
		<legend><?= @text($header) ?></legend>
		<?php foreach ($fields as $label => $field) : ?>
		<div class="control-group">
			<label><?= @text($label) ?></label>
			<div class="controls">
				<?php if (is_object($field)) : ?>
				<?php $class = (in_array($field->name, array('textarea', 'input'))) ? 'input-block-level' : '' ?>
				<?= $field->class($class)->rows(5)->cols(5) ?>
				<?php else : ?>
				<?= $field ?>
				<?php endif;?>
			</div>
		</div>
		<?php endforeach;?>
	</fieldset>
	<?php endforeach;?>

	<div class="form-actions">
        <button type="submit" class="btn" data-loading-text="<?= @text('LIB-AN-ACTION-SAVING') ?>">
            <?= @text('LIB-AN-ACTION-SAVE'); ?>
        </button>
    </div>
</form>
